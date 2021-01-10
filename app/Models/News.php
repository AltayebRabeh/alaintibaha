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

<<<<<<< HEAD
    public function breakingNews() {
        return $this->hasOne(BreakingNew::class, 'new_id');
=======
    public function comment() {
        return $this->hasMany(Comment::class);
>>>>>>> 8b7377ed014879e91e418f6e7da1899898743bed
    }
}
