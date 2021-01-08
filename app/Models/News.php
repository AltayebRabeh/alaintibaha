<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = "news";

    protected $guarded;

    public $timestamps = true;

    public function admin() {
        return $this->belongsTo(Admin::class);
    }
}
