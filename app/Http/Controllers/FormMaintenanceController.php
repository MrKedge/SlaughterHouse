<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\User;
use App\Models\FormMaintenance;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class FormMaintenanceController extends Controller
{
    public function ShowMaintenanceForm()
    {
        $animal = FormMaintenance::all();
        return view('admin.admin-maintenance-form', compact('animal'));
    }




    public function FormMaintenance(Request $request)
    {
        try {
            $request->validate([
                'animalType' => 'nullable|unique:form_maintenances,animal_type',
                'animalDestination' => 'nullable|unique:form_maintenances,animal_destination',
                'animalButcher' => 'nullable|unique:form_maintenances,animal_butcher',
                'animalAgeClassify' => 'nullable|unique:form_maintenances,animal_ageclassify',
                'animalSource' => 'nullable|unique:form_maintenances,animal_source',
            ]);

            $newFill = new FormMaintenance();

            $newFill->animal_type = strtolower($request->animalType);
            $newFill->animal_destination = strtolower($request->animalDestination);
            $newFill->animal_butcher = strtolower($request->animalButcher);
            $newFill->animal_ageclassify = strtolower($request->animalAgeClassify);
            $newFill->animal_source = strtolower($request->animalSource);
            $newFill->save();

            return redirect()->back()->with('success', 'Record added successfully');
        } catch (QueryException $e) {
            // Check if the exception is related to a unique constraint violation
            if ($e->errorInfo[1] === 1062) {
                // Handle the duplicate entry error here
                return redirect()->back()->withErrors(['error' => 'Duplicate entry. Please provide unique values.']);
            } else {
                // Handle other types of database errors
                return redirect()->back()->withErrors(['error' => 'Database error.']);
            }
        }
    }


    public function deleteOnForm(Request $request)
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

        // Find and update the specific fields to null
        FormMaintenance::where('animal_type', $animalType)->update(['animal_type' => null]);
        FormMaintenance::where('animal_destination', $animalDestination)->update(['animal_destination' => null]);
        FormMaintenance::where('animal_butcher', $animalButcher)->update(['animal_butcher' => null]);
        FormMaintenance::where('animal_ageclassify', $animalAgeClassify)->update(['animal_ageclassify' => null]);

        return redirect()->back()->with('success', 'Data deleted successfully');
    }
}
