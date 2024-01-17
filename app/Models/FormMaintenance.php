<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormMaintenance extends Model
{
    use HasFactory;
    protected $fillable = [
        'animal_type',
        'animal_destination',
        'animal_butcher',
        'animal_ageclassify',
        'animal_source',
    ];
}
