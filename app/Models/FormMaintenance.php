<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormMaintenance extends Model
{
    use HasFactory;
    protected $fillable = [
        'animalType',
        'animalDestination',
        'animalButcher',
        'animalAgeClassify',
    ];
}
