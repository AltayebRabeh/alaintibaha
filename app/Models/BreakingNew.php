<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BreakingNew extends Model
{
    protected $guarded;

    public $timestamps = true;

    public function news() {
        return $this->belongsTo(News::class, 'new_id');
    }
    public function admin() {
        return $this->belongsTo(Admin::class);
    }
}
