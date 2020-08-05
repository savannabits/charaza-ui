<?php

namespace App\Models;
/* Imports */
use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;

class User extends \App\User
{
    protected $fillable = [
        'username',
        'email',
        'name',
        'first_name',
        'middle_name',
        'last_name',
        'email_verified_at',
        'password',

    ];

    protected $hidden = [
        'password',
        'remember_token',

    ];


    protected $dates = [
        'email_verified_at',
        'created_at',
        'updated_at',

    ];

    protected $appends = ["api_route"];

    /* ************************ ACCESSOR ************************* */

    public function getApiRouteAttribute() {
        return route("api.users.index");
    }
    protected function serializeDate(DateTimeInterface $date) {
        return $date->format('Y-m-d H:i:s');
    }

    /* ************************ RELATIONS ************************ */
}
