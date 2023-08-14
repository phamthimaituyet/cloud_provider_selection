<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'support',
        'vendor_id',
        'category_id',
        'img_url',
        'certificate'
    ];

    protected static function booted()
    {
        static::deleting(function(Product $product) {
            foreach ($product->product_criterias as $product_criteria) {
                $product_criteria->where('product_id', $product->id)->delete();
            }
        });
    }

    // cerificate co dang blob -> customer gia tri, tra ve binh thuong
    public function getCertificateAttribute()
    {
        return json_decode($this->attributes['certificate']);
    }

    // protected $table = "products";

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function vendor(){
        return $this->belongsTo(Vendor::class);
    }

    public function criterias(){
        return $this->belongsToMany(Criteria::class, 'product_criterias', 'product_id', 'criteria_id')->withPivot('value');
    }

    public function product_criterias(){
        return $this->hasMany(ProductCriteria::class);
    }

    public function prices(){
        return $this->hasMany(Price::class);
    }

    public function commnets(){
        return $this->hasMany(Comment::class);
    }

    public function ratings() {
        return $this->hasMany(Rating::class);
    }
}
