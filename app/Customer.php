<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticate;
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticate
{
    //
    use Notifiable;

    protected $guard = 'customer';

    protected $fillable = [
        'name', 'email', 'password','phone', 'dob', 'image'
    ];

    protected $hidden = [
        'password', 'remember_token'
    ];
}
