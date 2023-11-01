<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function ShowClientDashboardOverview()
    {
        $user = User::with('animals')->find(Auth::id());
        return view('client.client-overview', compact('user'));
    }


    public function ShowAnimalListReg()
    {

        $user = User::with('animals')->find(Auth::id());
        return view('client.client-animal-list-registration', compact('user'));
    }


    public function ShowAnimalRegForm()
    {
        return view('client.client-animal-register');
    }


    public function ShoRegistrationFormClient($id)
    {
        $animal = Animal::with('user')->find($id);
        $user = User::findOrFail($animal->user_id);
        return view('client.client-view-animal-form', compact('animal', 'user'));
    }


    public function Register(Request $request)      //for registering the animal//-----------------------------------------
    {

        $request->validate([


            'kindOfAnimal' => 'required',
            'butcher' => 'required',
            'ageClassify' => 'required',
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
}
