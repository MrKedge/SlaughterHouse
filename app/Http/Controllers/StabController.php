<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Animal;

class StabController extends Controller
{
    public function ShowForStabAnimal(Request $request, $ownerId)
    {
        $owner = User::findOrFail($ownerId);

        // Retrieve only approved animals with a non-null 'arrived_at' field
        $animal = $owner->animals()
            ->where('status', 'approved')
            ->whereHas('anteMortem', function ($query) {
                $query->whereNotNull('arrived_at');
            })
            ->get();



        return view('admin.stab.admin-generate-stab', compact('animal', 'owner'));
    }


    public function GenerateStab(Request $request)
    {

        $selectedAnimals = json_decode($request->input('selected_animals'));


        if (!is_array($selectedAnimals)) {

            $selectedAnimals = [$selectedAnimals];
        }



        $animal = Animal::with('user')->whereIn('id', $selectedAnimals)->get();
        $totalAnimal = count($animal);
        $weightTotal = $animal->sum('live_weight');
        $owner = User::find($animal->first()->user_id);

        return view('admin.stab.stab', compact('animal', 'totalAnimal', 'weightTotal', 'owner'));
    }
}
