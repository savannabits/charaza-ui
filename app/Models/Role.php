<?php

namespace App\Models;
/* Imports */
use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;

class Role extends \Spatie\Permission\Models\Role
{
    protected $fillable = [
        'display_name',
        'guard_name',
        'enabled',

    ];


    protected $casts = [
        'enabled' => 'boolean',

    ];

    protected $dates = [
        'created_at',
        'updated_at',

    ];

    protected $appends = ["api_route"];

    /* ************************ ACCESSOR ************************* */

    public function getApiRouteAttribute() {
        return route("api.roles.index");
    }
    protected function serializeDate(DateTimeInterface $date) {
        return $date->format('Y-m-d H:i:s');
    }

    /* ************************ RELATIONS ************************ */
}
