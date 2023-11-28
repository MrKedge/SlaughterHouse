<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\User;
use App\Models\FormMaintenance;
use Illuminate\Http\Request;

class FormMaintenanceController extends Controller
{
    public function FormMaintenance(Request $request)
    {
        $request->validate([
            'animalType' => '',
            'animalDestination' => '',
            'animalButcher' => '',
            'animalAgeClassify' => '',
        ]);

        $newFill = new FormMaintenance();

        $newFill->animal_type = strtolower($request->animalType);
        $newFill->animal_destination = strtolower($request->animalDestination);
        $newFill->animal_butcher = strtolower($request->animalButcher);
        $newFill->animal_ageclassify = strtolower($request->animalAgeClassify);
        $newFill->save();

        return redirect()->route('admin.form.maintenance');
    }


    public function DeleteOnForm(Request $request)
    {
        $request->validate([
            'deleteAnimal' => '',
            'deleteDestination' => '',
            'deleteButcher' => '',
            'deleteAgeClassify' => '',
        ]);

        $animalType = $request->input('deleteAnimal');
        $animalDestination = $request->input('deleteDestination');
        $animalButcher = $request->input('deleteButcher');
        $animalAgeClassify = $request->input('deleteAgeClassify');
        // Find and delete the animal from the database
        FormMaintenance::where('animal_type', $animalType)->delete();
        FormMaintenance::where('animal_destination', $animalDestination)->delete();
        FormMaintenance::where('animal_butcher', $animalButcher)->delete();
        FormMaintenance::where('animal_ageclassify', $animalAgeClassify)->delete();
        return redirect()->back()->with('success');
    }
}
