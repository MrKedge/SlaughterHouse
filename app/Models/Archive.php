<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
    use HasFactory;
    protected $fillable = [
        'archive_status',
        'animal_id',

    ];


    public function animal()
    {
        return $this->belongsTo(Animal::class, 'animal_id');
    }
}
