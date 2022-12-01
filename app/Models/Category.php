<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = [
        'name',
        'parent_id',
        'active',
        'created_at',
        'updated_at'
    ];

    public function children(){
        return $this->hasMany(Category::class, 'parent_id');
//        return $this->hasMany(Category::class, 'parent_id')->select('id','name','parent_id')->with('_nLevelCat');
    }
}
