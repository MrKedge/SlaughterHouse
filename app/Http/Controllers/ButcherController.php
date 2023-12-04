<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;


class ButcherController extends Controller
{
    public function ShowButcherOverview()
    {
        $animal = Animal::with('user')
            ->where('status', 'for slaughter')
            ->get();
        $recent = Animal::where('status', 'slaughtered')
            ->where('slaughtered_at', '>=', Carbon::now()->subHours(5))
            ->latest('slaughtered_at')
            ->limit(5)
            ->get();
        return view('butcher.butcher-overview', compact('animal', 'recent'));
    }

    public function ShowButcherAnimal()
    {
        $animal = Animal::where('status', 'for slaughter')
            ->where('butcher', 'public')
            ->get();
        return view('butcher.butcher-animals', compact('animal'));
    }

    public function ShowButcherForm($id)       //for viewing the animal form in reg table//----------------------------
    {
        $animal = Animal::with('user')->find($id);
        $user = User::findOrFail($animal->user_id);
        return view('butcher.butcher-view-form', compact('animal', 'user'));
    }

    public function SlaughteredAnimal($id)      //for slaughtered the animal registration form//----------------------
    {

        $animal = Animal::where('status', 'for slaughter')->find($id);
        $animal->status = 'slaughtered';
        $animal->slaughtered_at = now();
        $animal->save();
        return redirect()->route('butcher.animal')->with('success', ['id' => $id]);
    }
}
