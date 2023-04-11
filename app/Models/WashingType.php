<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class WashingType extends Model
{
    use HasFactory;
    protected $attributes = [
        'state' => 0,
    ];
    protected $fillable = [
        'user_id',
        'car_body',
        'interior_leaning',
        'zero_washing',
        'payment',
        'time',
        'state'
    ];
    protected $hidden = [
        'user_id'
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function date_reservation(): BelongsTo
    {
        return $this->belongsTo(DateReservation::class);
    }
}
