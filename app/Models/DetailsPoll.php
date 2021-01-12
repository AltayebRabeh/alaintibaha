<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailsPoll extends Model
{
    protected $guarded;

    public $timestamps = true;

    public function pull() {
        return $this->belongsTo(Poll::class);
    }

    public function vote() {
        return $this->hasMany(Vote::class);
    }
}
