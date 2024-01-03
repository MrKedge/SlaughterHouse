<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stabs extends Model
{
    use HasFactory;

    protected $fillable = ['issued_at'];


    public function animals()
    {
        return $this->hasMany(Animal::class, 'stab_id');
    }
}
