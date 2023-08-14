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

    // lay thuoc tinh value trong bang n - n -> dung trong show product, lay value
    public function products(){
        return $this->belongsToMany(Product::class,'product_criterias', 'criteria_id', 'product_id')->withPivot('value');
    }

    // Lay cac tieu chi cha
    public function getNameParent($parent_id = null) {
        if (is_null($parent_id)) {
            return '';
        }
        $query = $this->where('id', $parent_id)->first();
        return $query->name;
    }

    // Lay ten cha goc 
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

    // Lay ra nhung tieu chi con cua tung tieu chi cha
    public function children() {
        return $this->hasMany(static::class, 'parent_id')->orderBy('id', 'asc'); // join chinh bang do
    }
}
