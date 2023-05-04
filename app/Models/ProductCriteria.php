<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCriteria extends Model
{
    use HasFactory;
    protected $table = "product_criterias";

    protected $fillable = [
        'user_id',
        'product_id',
        'value',
        'criteria_id'
    ];
}
