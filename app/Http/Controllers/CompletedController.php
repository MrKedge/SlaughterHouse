<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Animal;
use App\Models\Completed;
use App\Models\Mic;
use App\Models\Archive;

class CompletedController extends Controller
{
    public function CompleteRecord(Request $request, $id)
    {

        $animal = Animal::find($id);


        if (!$animal) {
            return redirect()->route('your.error.route')->with('error', 'Animal not found');
        }


        Completed::updateOrCreate(
            ['animal_id' => $animal->id],
            ['complete_status' => 'completed']
        );


        $animal->status = 'processed';
        $animal->save();


        return redirect()->back()->with('success', 'Animal marked as completed');
    }

    public function ShowCompleted()
    {
        $owner = User::whereHas('animals', function ($query) {
            $query->whereHas('completed', function ($subQuery) {
                $subQuery->where('complete_status', 'completed');
            })->whereDoesntHave('archive', function ($subQuery) {
                $subQuery->where('archive_status', 'archived');
            });
        })
            ->with(['animals' => function ($query) {
                $query->whereHas('completed', function ($subQuery) {
                    $subQuery->where('complete_status', 'completed');
                })->whereDoesntHave('archive', function ($subQuery) {
                    $subQuery->where('archive_status', 'archived');
                });
            }])
            ->paginate(5);

        return view('admin.admin-completed', compact('owner'));
    }




    // mic table
    public function ShowUserMic(Request $request, $ownerId)
    {

        $owner = User::findOrFail($ownerId);

        // $owner = User::with(['animals' => function ($query) {
        //     $query->whereHas('completed', function ($subQuery) {
        //         $subQuery->where('complete_status', 'completed');
        //     });
        // }])->find($ownerId);
        $animal = $owner->animals()
            ->where(function ($query) {
                $query->whereHas('completed', function ($subQuery) {
                    $subQuery->where('complete_status', 'completed');
                });
            })->paginate(10);


        return view('admin.admin-mic-table', compact('animal'));
    }


    public function GenerateMic(Request $request)
    {
        $inspector = User::where('role', 'inspector')->get();

        // Decode the selected animals from JSON
        $selectedAnimals = json_decode($request->input('selected_animals'));

        // Ensure $selectedAnimals is an array
        $selectedAnimals = is_array($selectedAnimals) ? $selectedAnimals : [$selectedAnimals];

        // Create a new Mic with issued_at set to the current time
        $newMic = Mic::create([]);

        // Update the mic_id for each selected animal with the newMic's id
        Animal::whereIn('id', $selectedAnimals)->update(['mic_id' => $newMic->id]);

        // Update or create archives for the selected animals
        foreach ($selectedAnimals as $animalId) {
            // Ensure $animalId is a numeric value
            if (is_numeric($animalId)) {
                Archive::updateOrCreate(
                    ['animal_id' => $animalId],
                    ['archive_status' => 'archived']
                );
            }
        }

        // Retrieve the updated animals based on the selected IDs with eager loading of the 'user' relationship
        $animals = Animal::with('user')->whereIn('id', $selectedAnimals)->get();

        // Get the owner of the first animal
        $owner = $animals->first()->user;

        return view('admin.mic', compact('owner', 'newMic', 'animals', 'inspector'));
    }
}
