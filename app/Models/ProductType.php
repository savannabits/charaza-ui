<?php

namespace App\Models;
/* Imports */
use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    protected $fillable = [
        'name',
        'description',
        'active',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ["api_route"];

    /* ************************ ACCESSOR ************************* */

    public function getApiRouteAttribute() {
        return route("api.product-types.index");
    }
    protected function serializeDate(DateTimeInterface $date) {
        return $date->format('Y-m-d H:i:s');
    }

    /* ************************ RELATIONS ************************ */
}
