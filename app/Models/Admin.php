<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function news() {
        return $this->hasMany(News::class);
    }
<<<<<<< HEAD
    public function breakingNews() {
        return $this->hasMany(BreakingNew::class);
=======

    public function ad() {
        return $this->hasMany(Ad::class);
>>>>>>> 8b7377ed014879e91e418f6e7da1899898743bed
    }
}
