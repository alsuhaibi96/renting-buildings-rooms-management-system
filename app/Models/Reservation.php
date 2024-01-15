<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Reservation extends Model
{
    use HasFactory;

    public function room():BelongsTo
    {
     return $this->belongsTo(Room::class);
    }
    public function status(): BelongsTo
    {
        return $this->BelongsTo(Status::class);
    }
}
