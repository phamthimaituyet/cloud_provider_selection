<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // protected $table = "products";

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function vendor(){
        return $this->belongsTo(Vendor::class);
    }

    public function criterias(){
        return $this->belongsToMany(Criteria::class, 'product_criterias', 'product_id', 'criteria_id')->withPivot('value');;
    }

    public function prices(){
        return $this->hasMany(Price::class);
    }
}
