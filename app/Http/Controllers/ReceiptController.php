<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\Stabs;

class ReceiptController extends Controller
{
    public function ShowClientStab()
    {
        // Assuming you have the authenticated user, retrieve the user's ID
        $userId = auth()->id();

        // Retrieve the stabs related to the user's animals
        $stabs = Stabs::whereHas('animals.user', function ($query) use ($userId) {
            $query->where('id', $userId)->whereNotNull('stab_id');
        })->with('animals')->get();

        return view('client.client-stab', compact('stabs'));
    }


    public function ShowReceiptTable($id)
    {
        // Retrieve the stab and its associated animals
        $stab = Stabs::with('animals')->findOrFail($id);

        // Access the related animals
        $animal = $stab->animals;

        return view('client.client-receipt-table', compact('stab', 'animal'));
    }
}
