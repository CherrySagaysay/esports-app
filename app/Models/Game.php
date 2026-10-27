<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Game extends Model
{
    protected $fillable = [
        'title',
        'genre',
    ];

    public function gamers(): BelongsToMany
    {
        return $this->belongsToMany(Gamer::class);
    }
}
