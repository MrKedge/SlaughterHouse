<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\PostMortem;
use App\Models\CondemnCarcass;
use Illuminate\Support\Str;

class PostMortemController extends Controller
{
    public function SlaughteredAnimal(Request $request, $id)
    {
        $request->validate([
            'butcheredBy' => 'nullable',
        ]);
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
                'slaughtered_by' => $request->butcheredBy,
            ]);

            // Save the new PostMortem record and associate it with the animal
            $animal->postMortem()->save($postMortem);
        } else {
            // If it exists, update the existing PostMortem record
            $animal->postMortem->slaughtered_at = now();
            $animal->postMortem->slaughtered_by = $request->butcheredBy;
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

        $animal->load('postMortem');

        // Update the inspected_by field
        $animal->postMortem->inspected_by = $request->inspectorName;
        $animal->postMortem->save();

        return redirect()->back()->with('success', 'Condemn record saved successfully.');
    }


    public function EditCondemn(Request $request, $id)
    {
        $request->validate([
            'category' => 'nullable',
            'condemnWeights' => 'nullable',
            'part' => 'nullable',
            'inspectorName' => 'nullable',
            'cause' => 'nullable',
        ]);

        $condemn = CondemnCarcass::updateOrCreate(
            ['id' => $id], // Condition to find the record based on its primary key
            [
                'category' => Str::lower($request->category),
                'carcass_weight' => $request->condemnWeights,
                'part' => Str::lower($request->part),
                'cause' => Str::lower($request->cause),
                // Add other fields as needed
            ]
        );
        // You can pass $condemn to your edit view or perform any other logic here

        return redirect()->back()->with('success', 'Condemn updated');
    }


    public function ShowAdminPostMortem(Request $request)
    {
        $sortColumn = $request->input('sort_column', 'animals.id');
        $sortOrder = $request->input('sort_order', 'asc');

        // Adjust the sorting column if necessary
        if ($sortColumn === 'date') {
            $sortColumn = 'animals.created_at';
        } elseif ($sortColumn === 'arrived_at') {
            // If sorting by 'arrived_at', assume it's from the 'ante_mortems' table
            $sortColumn = 'ante_mortems.arrived_at';
        } elseif ($sortColumn === 'slaughtered_at') {
            // If sorting by 'slaughtered_at', assume it's from the 'post_mortems' table
            $sortColumn = 'post_mortems.slaughtered_at';
        }

        // Fetch animals with the specified status, post-mortem status, and no completed records
        $animal = Animal::where('status', 'slaughtered')
            ->whereHas('postMortem', function ($query) {
                $query->where('postmortem_status', 'good');
            })
            ->whereDoesntHave('completed') // Ensure there is no related completed record
            ->leftJoin('ante_mortems', 'animals.id', '=', 'ante_mortems.animal_id') // Join with ante_mortems table for sorting
            ->leftJoin('users', 'animals.user_id', '=', 'users.id') // Join with users table
            ->leftJoin('post_mortems', 'animals.id', '=', 'post_mortems.animal_id') // Join with post_mortems table
            ->orderBy($sortColumn, $sortOrder) // Apply sorting
            ->select('animals.*', 'users.first_name as first_name') // Select necessary columns
            ->paginate(5);

        return view('admin.admin-post-mortem', [
            'animal' => $animal,
            'sortColumn' => $sortColumn,
            'sortOrder' => $sortOrder,
            'request' => $request,
        ]);
    }



    public function PrivateButcher(Request $request, $id)
    {
        $request->validate([
            'privateButcher' => 'nullable',
        ]);
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
                'slaughtered_by' => $request->privateButcher,
            ]);

            // Save the new PostMortem record and associate it with the animal
            $animal->postMortem()->save($postMortem);
        } else {
            // If it exists, update the existing PostMortem record
            $animal->postMortem->slaughtered_at = now();
            $animal->postMortem->slaughtered_by = $request->privateButcher;
            $animal->postMortem->save();
        }

        // Save the changes to the animal
        $animal->save();

        return redirect()->back()->with('success', 'Animal successfully slaughtered');
    }
}
