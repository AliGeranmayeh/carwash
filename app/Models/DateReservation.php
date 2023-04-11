<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DateReservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'date'
    ];
    public function washing_id(): HasMany
    {
        return $this->hasMany(WashingType::class);
    }

}
