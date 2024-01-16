<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    use HasFactory;

    public function rooms()
    {
        return $this->belongsToMany(Room::class,'rooms_seasons');
    }
}
