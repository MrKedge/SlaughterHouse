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



    public function ShowPostMortemAnimal()
    {
        $animal = Animal::with('user')
            ->where('status', 'slaughtered')
            ->whereDoesntHave('archive')
            ->whereDoesntHave('completed')
            ->get();
        return view('inspector.inspector-postmortem', compact('animal'));
    }



    public function ShowAnteMortemAnimal()
    {

        return view('inspector.inspector-antemortem');
    }



    public function ShowInspectorForm($id)
    {
        $animal = Animal::with('user')->find($id);
        $user = User::findOrFail($animal->user_id);
        return view('inspector.inspector-view-form', compact('animal', 'user'));
    }
}
