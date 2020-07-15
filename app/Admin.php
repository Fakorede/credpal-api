<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
