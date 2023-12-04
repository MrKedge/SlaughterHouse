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
            ->where('Slaughtered_at', '>=', Carbon::now()->subHours(5))
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
        $animal = Animal::with('user')->find($id);
        $user = User::findOrFail($animal->user_id);
        return view('inspector.inspector-view-form', compact('animal', 'user'));
    }




    public function PostMortemGood($id)
    {
        $animal = Animal::with('user')
            ->where('status', 'slaughtered')
            ->find($id);
        $animal->post_mortem = 'good';
        $animal->inspected_at = now();
        $animal->save();

        return redirect()->back()->with('success', 'Animal is Good for Consumption');
    }



    public function PostMortemCondemn($id)
    {
        $animal = Animal::with('user')
            ->where('status', 'slaughtered')
            ->find($id);
        $animal->post_mortem = 'condemn';
        $animal->inspected_at = now();
        $animal->save();
        return redirect()->back()->with('success', 'Set animal as Condemned');
    }
}
