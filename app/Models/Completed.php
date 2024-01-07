<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Completed extends Model
{
    use HasFactory;

    protected $fillable = ['animal_id', 'complete_status'];



    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }
}
