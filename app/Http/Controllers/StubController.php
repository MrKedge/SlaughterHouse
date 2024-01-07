<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Animal;
use App\Models\Stubs;
use Carbon\Carbon;

class StubController extends Controller
{
    public function showForStubAnimal(Request $request, $ownerId)
    {
        $owner = User::findOrFail($ownerId);

        // Retrieve animals where 'stub_id' is either empty or null and with a non-null 'arrived_at' field
        $animal = $owner->animals()
            ->where(function ($query) {
                $query->whereNull('stub_id')
                    ->orWhere('stub_id', ''); // Assuming 'stub_id' is a string field; adjust if needed
            })
            ->whereHas('anteMortem', function ($query) {
                $query->whereNotNull('arrived_at');
            })
            ->get();

        return view('admin.stub.admin-generate-stub', compact('animal', 'owner'));
    }


    public function generateStub(Request $request)
    {
        $selectedAnimals = json_decode($request->input('selected_animals'));

        if (!is_array($selectedAnimals)) {
            $selectedAnimals = [$selectedAnimals];
        }

        // Create a new stub with issued_at set to the current time
        $newStub = Stubs::create([
            // Add any other relevant fields for the new stub
            'issued_at' => Carbon::now(),
        ]);

        // Update the stub_id for each selected animal with the same stub_id
        Animal::whereIn('id', $selectedAnimals)->update(['stub_id' => $newStub->id]);

        // Retrieve the updated animals based on the selected IDs
        $animals = Animal::with('user')->whereIn('id', $selectedAnimals)->get();

        $totalAnimal = count($animals);
        $weightTotal = $animals->sum('live_weight');
        $owner = User::find($animals->first()->user_id);

        return view('admin.stub.stub', compact('animals', 'totalAnimal', 'weightTotal', 'owner', 'newStub'));
    }




    public function ShowOwnerStubList()
    {
        $owner = User::whereHas('animals', function ($query) {
            $query->where(function ($subQuery) {
                $subQuery->whereNull('stub_id')
                    ->orWhere('stub_id', ''); // Assuming 'stub_id' is a string field; adjust if needed
            })
                ->whereHas('anteMortem', function ($anteMortemQuery) {
                    $anteMortemQuery->whereNotNull('arrived_at');
                });
        })
            ->with(['animals' => function ($query) {
                $query->where(function ($subQuery) {
                    $subQuery->whereNull('stub_id')
                        ->orWhere('stub_id', ''); // Assuming 'stub_id' is a string field; adjust if needed
                })
                    ->whereHas('anteMortem', function ($anteMortemQuery) {
                        $anteMortemQuery->whereNotNull('arrived_at');
                    });
            }])
            ->get();

        return view('admin.admin-owners-stub', compact('owner'));
    }
}
