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
            'animal_type' => 'cow',
            'meat_type' => 'beef',
            'animal_destination' => 'wet market',
            'animal_butcher' => 'public',
            'animal_ageclassify' => 'culled sow/boar',
            'animal_source' => 'within the province',
        ]);

        FormMaintenance::create([
            'animal_type' => 'carabao',
            'meat_type' => 'carabeef',
            'animal_destination' => 'meat shops',
            'animal_butcher' => 'private',
            'animal_ageclassify' => 'fattener',
            'animal_source' => 'outside the province',
        ]);

        FormMaintenance::create([
            'animal_type' => 'horse',
            'meat_type' => 'chevaline',
            'animal_destination' => 'meat cutting',
            'animal_butcher' => null,
            'animal_ageclassify' => 'grower',
            'animal_source' => null,
        ]);

        FormMaintenance::create([
            'animal_type' => 'swine',
            'meat_type' => 'pork',
            'animal_destination' => 'hotel & restaurants',
            'animal_butcher' => null,
            'animal_ageclassify' => null,
            'animal_source' => null,
        ]);

        FormMaintenance::create([
            'animal_type' => null,
            'animal_destination' => 'supermarket',
            'animal_butcher' => null,
            'animal_ageclassify' => null,
            'animal_source' => null,
        ]);

        FormMaintenance::create([
            'animal_type' => null,
            'animal_destination' => 'meat processing plant',
            'animal_butcher' => null,
            'animal_ageclassify' => null,
            'animal_source' => null,
        ]);

        FormMaintenance::create([
            'animal_type' => null,
            'animal_destination' => 'cold storage',
            'animal_butcher' => null,
            'animal_ageclassify' => null,
            'animal_source' => null,
        ]);
    }
}
