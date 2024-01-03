<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory;

    protected $fillable = ['receipt_no', 'animal_id', 'payment', 'receipt_name', ''];


    public function animals()
    {
        return $this->hasMany(Animal::class);
    }
}
