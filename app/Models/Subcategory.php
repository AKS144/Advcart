<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $table = 'subcategorys';
    protected $fillable = [
        'category_id',
        'url',
        'name',
        'description',
        'image'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','id');//foreign key category_id of subcategory and id is of Category
    }//access all table attributes
}
