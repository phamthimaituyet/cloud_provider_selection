<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    use HasFactory;

    protected $fillable = [
        'weight',
        'description',
        'name',
    ];

    public function products(){
        return $this->belongsToMany(Product::class,'product_criterias', 'criteria_id', 'product_id')->withPivot('value');
    }

    public function getNameParent($parent_id = null) {
        if (is_null($parent_id)) {
            return '';
        }
        $query = $this->where('id', $parent_id)->first();
        return $query->name;
    }

    public function getNameRootParent($parent_id) {
        if ($parent_id === null) {
            return ;
        }

        while($parent_id != null){
            $children = $this->where('id', $parent_id)->first();
            $parent_id = $children->parent_id;
        }
        
        return $children->name;
    }

    public function children() {
        return $this->hasMany(static::class, 'parent_id')->orderBy('id', 'asc');
    }
}
