<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Room extends Model
{
    use HasFactory;

    public function building():BelongsTo
    {
       return $this->belongsTo(Building::class);
    }

    public function additional_services()
    {
       return $this->belongsToMany(AdditionalService::class,'rooms_additional_services')->withTimestamps();
    }

    public function seasons():BelongsToMany
    {
        return $this->belongsToMany(Season::class,'rooms_seasons');
    }



    public function reservations():HasMany
    {
        return $this->hasMany(Reservation::class);
    }

}
