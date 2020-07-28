<?php

namespace App\Models;
/* Imports */
use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'product_type_id',
        'active',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ["api_route"];

    /* ************************ ACCESSOR ************************* */

    public function getApiRouteAttribute() {
        return route("api.products.index");
    }
    protected function serializeDate(DateTimeInterface $date) {
        return $date->format('Y-m-d H:i:s');
    }

    /* ************************ RELATIONS ************************ */
    /**
    * Many to One Relationship to \App\Models\ProductType::class
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function productType() {
        return $this->belongsTo(\App\Models\ProductType::class,"product_type_id","id");
    }
}
