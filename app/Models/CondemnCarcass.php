<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CondemnCarcass extends Model
{
    use HasFactory;

    protected $fillable = ['category', 'carcass_weight', 'part', 'cause', 'animal_id'];

    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }
}
