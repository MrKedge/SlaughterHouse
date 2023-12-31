<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnteMortem extends Model
{
    use HasFactory;

    protected $fillable = ['animal_id', 'arrived_at', 'inspected_at', 'examined_by', 'inspection_status', 'causes', 'dispose_weight',];

    // Define the relationship to the Animal model
    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }
}
