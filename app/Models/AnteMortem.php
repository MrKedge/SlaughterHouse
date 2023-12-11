<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnteMortem extends Model
{
    use HasFactory;

    protected $fillable = ['animal_id', 'arrived_at', 'inspected_at', 'inspection_status'];

    // Define the relationship to the Animal model
    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }
}
