<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Vote extends Model
{
    protected $guarded;

    public $timestamps = true;

    public function user() {
        return $this->belongsTo(User::class);
    }

    public static function sumVote($id) {
        return DB::select('select count(id) from votes where details_poll_id = ?', $id);
    }

    public function detailsPoll() {
        return $this->belongsTo(DetailsPoll::class);
    }
}
