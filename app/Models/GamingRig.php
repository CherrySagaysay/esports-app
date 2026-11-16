<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GamingRig extends Model
{
    protected $fillable = [
        'gamer_id',   //foreign key nga nag identify sa gamer
        'pc_name',
        'specs',
    ];

    public function gamer(): BelongsTo  //return type sa relationship
    {
        return $this->belongsTo(Gamer::class);      //one gaming rig sa isa ka gamer 
    }
}
