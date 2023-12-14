<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class InspectorController extends Controller
{
    public function ShowInspectorOverview()
    {
        $recent = Animal::join('post_mortems', 'animals.id', '=', 'post_mortems.animal_id')
            ->where('animals.status', 'slaughtered')
            ->where('post_mortems.slaughtered_at', '>=', Carbon::now()->subHours(5))
            ->latest('post_mortems.slaughtered_at')
            ->limit(5)
            ->get();

        $animal = Animal::with('user')
            ->where('status', 'slaughtered')
            ->get();

        return view('inspector.inspector-overview', compact('animal', 'recent'));
    }



    public function ShowInspectAnimal()
    {
        $animal = Animal::with('user')
            ->where('status', 'slaughtered')
            ->get();
        return view('inspector.inspector-animal-list', compact('animal'));
    }



    public function ShowInspectorForm($id)
    {
        $animal = Animal::with('user')->find($id);
        $user = User::findOrFail($animal->user_id);
        return view('inspector.inspector-view-form', compact('animal', 'user'));
    }
}
