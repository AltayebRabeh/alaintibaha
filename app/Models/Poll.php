<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    protected $guarded;

    public $timestamps = true;

    public function admin() {
        return $this->belongsTo(Admin::class);
    }
        public function details() {
        return $this->hasMany(DetailsPoll::class);
    }
}
