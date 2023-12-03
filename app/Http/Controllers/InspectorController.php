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
        $recent = Animal::where('status', 'slaughtered')
            ->where('Slaughtered_at', '>=', Carbon::now()->subHours(12))
            ->latest('slaughtered_at')
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
        $animal = Animal::with('user')->where('status', 'slaughtered')->find($id);
        $user = User::findOrFail($animal->user_id);
        return view('inspector.inspector-view-form', compact('animal', 'user'));
    }




    public function PostMortemGood($id)
    {
        $animal = Animal::with('user')
            ->where('status', 'slaughtered')
            ->find($id);
        $animal->post_mortem = 'Good';
        $animal->inspected_at = now();
        $animal->save();

        return redirect()->route('inspector.animal.list')->with('success', 'Animal has been moved to monitoring facility');
    }



    public function PostMortemCondemn()
    {
    }
}
