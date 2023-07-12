<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSuggestLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'body'
    ];

    public function getBodyAttribute()
    {
        return json_decode($this->attributes['body']);
    }

    public function getProductById($product_id)
    {
        return Product::find($product_id);
    }
}
