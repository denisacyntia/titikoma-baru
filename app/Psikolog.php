<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticate;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class Psikolog extends Authenticate
{
    //
    use Notifiable;

    protected $guard = 'psikolog';

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
    }

    public function getStatusLabelAttribute()
    {
        //ADAPUN VALUENYA AKAN MENCETAK HTML BERDASARKAN VALUE DARI FIELD STATUS
        if ($this->status == 0) {
            return '<span class="badge badge-secondary">Draft</span>';
        }
        return '<span class="badge badge-success">Publish</span>';
    }

    protected $fillable = [
        'name', 'slug', 'email', 'password','phone', 'dob', 'location', 'image'
    ];

    protected $hidden = [
        'password', 'remember_token'
    ];
}
