<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $guarded;

    public $timestamps = true;

    public function user() {
        return $this->belongsTo(User::class);
    }
    public function news() {
        return $this->belongsTo(News::class, 'new_id');
    }
}
