<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $guarded;

    public $timestamps = true;

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function detailsPoll() {
        return $this->belongsTo(DetailsPoll::class);
    }
}
