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

    public function breakingNews() {
        return $this->hasOne(BreakingNew::class, 'new_id');
    }
    public function comment() {
        return $this->hasMany(Comment::class);
    }
    public function like() {
        return $this->hasMany(Like::class);
    }
}
