<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    use HasFactory;

    public function products(){
        return $this->belongsToMany(Product::class,'product_criterias', 'criteria_id', 'product_id')->withPivot('value');
    }

    public function getNameParent($parent_id) {
        $query = $this->where('id', $parent_id)->first();
        return $query->name;
    }

    public function getNameRootParent($parent_id) {
        while($parent_id != null){
            $children = $this->where('id', $parent_id)->first();
            $parent_id = $children->parent_id;
        }
        
        return $children->name;
    }
}
