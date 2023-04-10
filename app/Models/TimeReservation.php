<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TimeReservation extends Model
{
    use HasFactory;

    public function washing_id(): BelongsTo
    {
        return $this->belongsTo(WashingType::class);
    }
}
