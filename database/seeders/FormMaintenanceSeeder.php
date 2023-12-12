<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FormMaintenance;

class FormMaintenanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        FormMaintenance::create([
            'animal_type' => 'Cow',
            'animal_destination' => 'Market',
            'animal_butcher' => 'John Doe',
            'animal_ageclassify' => 'Adult',
        ]);

        FormMaintenance::create([
            'animal_type' => 'Pig',
            'animal_destination' => 'Slaughterhouse',
            'animal_butcher' => 'Jane Smith',
            'animal_ageclassify' => 'Young',
        ]);

        FormMaintenance::create([
            'animal_type' => 'Chicken',
            'animal_destination' => 'Farm',
            'animal_butcher' => 'Alice Johnson',
            'animal_ageclassify' => 'Young',
        ]);

        FormMaintenance::create([
            'animal_type' => 'Sheep',
            'animal_destination' => 'Slaughterhouse',
            'animal_butcher' => 'Bob Williams',
            'animal_ageclassify' => 'Adult',
        ]);

        FormMaintenance::create([
            'animal_type' => 'Goat',
            'animal_destination' => 'Market',
            'animal_butcher' => 'Charlie Davis',
            'animal_ageclassify' => 'Young',
        ]);

        // Add Dinosaur record
        FormMaintenance::create([
            'animal_type' => 'Dinosaur',
            'animal_destination' => 'Jurassic Park',
            'animal_butcher' => 'Paleontologist',
            'animal_ageclassify' => 'Ancient',
        ]);

        // Add more seed data as needed
    }
}
