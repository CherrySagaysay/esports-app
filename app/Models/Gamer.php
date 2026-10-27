<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Gamer extends Model
{
    protected $fillable = [
        'name',
        'gamer_tag',
    ];

    public function gamingRig(): HasOne
    {
        return $this->hasOne(GamingRig::class); //one gamer has one GamingRig
    }

    public function achievements(): HasMany
    {
        return $this->hasMany(Achievement::class);
    }

    public function games(): BelongsToMany
    {
        return $this->belongsToMany(Game::class);
    }

}


