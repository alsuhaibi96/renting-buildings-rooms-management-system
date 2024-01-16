<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RoomsSeason extends Model
{
    protected $fillable = [
        'room_id',
        'season_id',
    ];
    use HasFactory;

    public function room():BelongsTo
    {
       return $this->belongsTo(Room::class,'room_id');
    }
    public function season():BelongsTo
    {
       return $this->belongsTo(Season::class,'season_id');
    }
}
