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
}
