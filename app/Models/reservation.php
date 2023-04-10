<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $attributes = [
        'car_body' => false,
        'interior_leaning' => false,
        'zero_washing' => false
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'car_body',
        'interior_leaning',
        'zero_washing'
    ];
    protected $hidden = [
        'user_id'
    ];
}
