<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    protected $guarded;

    public $timestamps = true;

    public function admin() {
        return $this->belongsTo(Admin::class);
    }
}
