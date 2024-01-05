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
        'cert_ownership',
        'cert_transfer',
        'source',
        'brgy_clearance',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function anteMortem()
    {
        return $this->hasOne(AnteMortem::class);
    }

    public function schedule()
    {
        return $this->hasOne(Schedule::class);
    }

    public function postMortem()
    {
        return $this->hasOne(PostMortem::class);
    }

    public function condemnCarcasses()
    {
        return $this->hasMany(CondemnCarcass::class);
    }

    public function receipt()
    {
        return $this->belongsTo(Receipt::class);
    }

    public function stub()
    {
        return $this->belongsTo(Stubs::class, 'stub_id');
    }
}
