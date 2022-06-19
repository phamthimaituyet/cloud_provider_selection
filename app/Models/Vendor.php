<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    protected $table = "vendors";

    protected $fillable = [
        'name',
        'address',
    ];

    public function product(){
        return $this->hasMany('App\Models\Product');
    }
}
