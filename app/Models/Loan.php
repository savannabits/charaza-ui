<?php

namespace App\Models;
/* Imports */
use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $fillable = [
        'lender_id',
        'borrower_id',
        'borrowed_at',
        'product_id',
        'amount',
    
    ];
    
    
    
    protected $dates = [
        'borrowed_at',
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ["api_route"];

    /* ************************ ACCESSOR ************************* */

    public function getApiRouteAttribute() {
        return route("api.loans.index");
    }
    protected function serializeDate(DateTimeInterface $date) {
        return $date->format('Y-m-d H:i:s');
    }

    /* ************************ RELATIONS ************************ */
    /**
    * Many to One Relationship to \App\Models\User::class
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function borrower() {
        return $this->belongsTo(\App\Models\User::class,"borrower_id","id");
    }
    /**
    * Many to One Relationship to \App\Models\User::class
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function lender() {
        return $this->belongsTo(\App\Models\User::class,"lender_id","id");
    }
    /**
    * Many to One Relationship to \App\Models\Product::class
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function product() {
        return $this->belongsTo(\App\Models\Product::class,"product_id","id");
    }
}
