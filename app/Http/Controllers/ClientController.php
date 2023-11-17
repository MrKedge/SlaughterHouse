<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class ClientController extends Controller
{
    public function ShowClientDashboardOverview()
    {
        $animals = Animal::where('user_id', Auth::id())->get();

        $recent = Animal::where('user_id', Auth::id())
            ->where('status', '!=', 'archived')
            ->where('created_at', '>=', Carbon::now()->subHours(8))
            ->latest('created_at')
            ->limit(5)
            ->get();


        return view('client.client-overview', compact('recent', 'animals'));
    }

    public function TotalPending()
    {
        $user = User::with('animals')->find(Auth::id());
        $totalPending = $user->animals->where('status', 'pending')->count();
        return view('client.client-overview', compact('TotalPending'));
    }

    public function ShowAnimalListReg()
    {
        $user = User::with('animals')->find(Auth::id());

        // Retrieve only non-archived animals
        $animals = $user->animals->where('status', '!=', 'archived');

        return view('client.client-animal-list-registration', compact('user', 'animals'));
    }

    public function ShowAnimalRegForm()
    {
        return view('client.client-animal-register');
    }



    public function ShowRegistrationFormClient($id)
    {
        $animal = Animal::with('user')->find($id);
        $user = User::findOrFail($animal->user_id);
        return view('client.client-view-animal-form', compact('animal', 'user'));
    }


    public function ShowArchiveList()
    {
        $user = User::with('animals')->find(Auth::id());
        $animal = $user->animals->where('status', 'archived');
        return view('client.client-animal-archive', compact('animal', 'user'));
    }

    public function ArchiveForm($id)
    {
        $animal = Animal::where('status', 'pending')->find($id);
        // Update the status to 'archive' or perform any other necessary actions
        $animal->status = 'archived';
        $animal->save();
        return redirect()->route('client.archive.list', ['id' => $id]);
    }

    public function Register(Request $request)      //for registering the animal//-----------------------------------------
    {

        $request->validate([


            'kindOfAnimal' => 'required',
            'butcher' => 'required',
            'destination' => 'required',
            'gender' => 'required',
            'age' => 'required',
            'liveWeight' => 'required'
        ]);

        $animal = new Animal();

        $animal->type = $request->kindOfAnimal;
        $animal->user_id = Auth::user()->id;
        $animal->butcher = $request->butcher;
        $animal->age_classify = $request->ageClassify;
        $animal->destination = $request->destination;
        $animal->gender = $request->gender;
        $animal->age = $request->age;
        $animal->live_weight = $request->liveWeight;
        $animal->save();

        return redirect()->route('client.animal.list.register');
    }

    public function ShowEditFormClient($id)
    {
        $animal = Animal::with('user')->find($id);
        return view('client.client-edit-form', compact('animal'));
    }

    public function updateAnimalForm(Request $request, $id)
    {
        $request->validate([
            'kindOfAnimal' => 'required',
            'butcher' => 'required',
            'destination' => 'required',
            'gender' => 'required',
            'age' => 'required',
            'liveWeight' => 'required'
        ]);

        $animal = Animal::findOrFail($id);

        $animal->type = $request->kindOfAnimal; // Corrected the field name
        $animal->gender = $request->gender;
        $animal->age = $request->age;
        $animal->live_weight = $request->liveWeight; // Adjusted the field name
        $animal->butcher = $request->butcher;
        $animal->age_classify = $request->age_classify;
        $animal->save();

        return redirect()->route('client.animal.list.register');
    }

    public function ArchiveAnimalForm($id)
    {
        $animal = Animal::where('status', 'pending')->find($id);
        $animal->status = "archived";
        $animal->save();
        return redirect()->route('admin.view.animal.reg.list', ['id' => $id]);
    }
}
