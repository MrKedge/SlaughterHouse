<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\PostMortem;
use App\Models\CondemnCarcass;

class PostMortemController extends Controller
{
    public function SlaughteredAnimal($id)
    {
        // Find the animal with the 'for slaughter' status
        $animal = Animal::where('status', 'for slaughter')->find($id);

        // Check if the animal is found
        if (!$animal) {
            return redirect()->route('butcher.animal')->with('error', 'Animal not found.');
        }

        // Load the postMortem relationship
        $animal->load('postMortem');

        // Update the status and set the slaughtered_at timestamp
        $animal->status = 'slaughtered';

        // Check if the postMortem relationship exists
        if (!$animal->postMortem) {
            // If it doesn't exist, create a new PostMortem record
            $postMortem = new PostMortem([
                'slaughtered_at' => now(),
                // Other PostMortem fields
            ]);

            // Save the new PostMortem record and associate it with the animal
            $animal->postMortem()->save($postMortem);
        } else {
            // If it exists, update the existing PostMortem record
            $animal->postMortem->slaughtered_at = now();
            $animal->postMortem->save();
        }

        // Save the changes to the animal
        $animal->save();

        return redirect()->route('butcher.animal')->with('success', 'Animal successfully slaughtered');
    }



    public function PostMortemGood(Request $request, $id)
    {
        $request->validate([
            'postWeight' => 'nullable',
            'inspectedBy' => 'nullable',
        ]);

        $animal = Animal::with('user')
            ->where('status', 'slaughtered')
            ->find($id);

        $animal->load('postMortem');
        $animal->postMortem->postmortem_status = 'good';
        $animal->postMortem->checked_at = now();
        $animal->postMortem->post_weight = $request->postWeight;
        $animal->postMortem->inspected_by = $request->inspectedBy;
        $animal->postMortem->save();

        return redirect()->back()->with('success', 'Animal is Good for Consumption');
    }



    public function CondemnCarcass(Request $request, $id)
    {
        $request->validate([
            'category' => 'nullable',
            'condemnWeights' => 'nullable',
            'part' => 'nullable',
            'inspectorName' => 'nullable',
            'cause' => 'nullable',
        ]);

        // Find the animal by ID
        $animal = Animal::findOrFail($id);

        // Create a new CondemnCarcass instance
        $condemnCarcass = new CondemnCarcass([
            'category' => $request->category,
            'carcass_weight' => $request->condemnWeights,
            'part' => $request->part,
            'cause' => $request->cause,
        ]);

        // Associate the condemn_carcass record with the corresponding animal_id
        $animal->condemnCarcasses()->save($condemnCarcass);

        return redirect()->back()->with('success', 'Condemn record saved successfully.');
    }
}
