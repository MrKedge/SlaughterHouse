<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = ['scheduled_at', 'animal_id'];


    public function animals()
    {
        return $this->belongsTo(Animal::class);
    }
}
