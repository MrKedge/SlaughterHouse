<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Animal extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        'gender',
        'age',
        'live_weight',
        'destination',
        'butcher',
        'age_classify',
        'remarks',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
