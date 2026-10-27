<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Achievement extends Model
{
    protected $fillable = [
        'gamer_id',
        'title',
    ];

    public function gamer(): BelongsTo
    {
        return $this->belongsTo(Gamer::class);
    }
}
