<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Animal;
use App\Models\Stabs;
use Carbon\Carbon;

class StabController extends Controller
{
    public function showForStabAnimal(Request $request, $ownerId)
    {
        $owner = User::findOrFail($ownerId);

        // Retrieve animals where 'stab_id' is either empty or null and with a non-null 'arrived_at' field
        $animal = $owner->animals()
            ->where(function ($query) {
                $query->whereNull('stab_id')
                    ->orWhere('stab_id', ''); // Assuming 'stab_id' is a string field; adjust if needed
            })
            ->whereHas('anteMortem', function ($query) {
                $query->whereNotNull('arrived_at');
            })
            ->get();

        return view('admin.stab.admin-generate-stab', compact('animal', 'owner'));
    }


    public function generateStab(Request $request)
    {
        $selectedAnimals = json_decode($request->input('selected_animals'));

        if (!is_array($selectedAnimals)) {
            $selectedAnimals = [$selectedAnimals];
        }

        // Create a new stab with issued_at set to the current time
        $newStab = Stabs::create([
            // Add any other relevant fields for the new stab
            'issued_at' => Carbon::now(),
        ]);

        // Update the stab_id for each selected animal with the same stab_id
        Animal::whereIn('id', $selectedAnimals)->update(['stab_id' => $newStab->id]);

        // Retrieve the updated animals based on the selected IDs
        $animals = Animal::with('user')->whereIn('id', $selectedAnimals)->get();

        $totalAnimal = count($animals);
        $weightTotal = $animals->sum('live_weight');
        $owner = User::find($animals->first()->user_id);

        return view('admin.stab.stab', compact('animals', 'totalAnimal', 'weightTotal', 'owner'));
    }




    public function ShowOwnerStabList()
    {
        $owner = User::whereHas('animals', function ($query) {
            $query->where(function ($subQuery) {
                $subQuery->whereNull('stab_id')
                    ->orWhere('stab_id', ''); // Assuming 'stab_id' is a string field; adjust if needed
            })
                ->whereHas('anteMortem', function ($anteMortemQuery) {
                    $anteMortemQuery->whereNotNull('arrived_at');
                });
        })
            ->with(['animals' => function ($query) {
                $query->where(function ($subQuery) {
                    $subQuery->whereNull('stab_id')
                        ->orWhere('stab_id', ''); // Assuming 'stab_id' is a string field; adjust if needed
                })
                    ->whereHas('anteMortem', function ($anteMortemQuery) {
                        $anteMortemQuery->whereNotNull('arrived_at');
                    });
            }])
            ->get();

        return view('admin.admin-owners-stab', compact('owner'));
    }
}
