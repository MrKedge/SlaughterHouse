<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostMortem extends Model
{
    use HasFactory;

    protected $fillable = ['animal_id', 'slaughtered_at', 'slaughtered_by', 'checked_at', 'postmortem_status', 'post_weight', 'inspected_by',];

    // Define the relationship to the Animal model
    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }
}
