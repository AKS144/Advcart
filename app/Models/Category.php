<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = [
        'group_id',
        'url',
        'name',
        'description',
        'image',
        'icon',
        'status'
    ];


    //belong to relation in
    public function group()
    {
        return $this->belongsTo(Groups::class,'group_id','id');//group_id is foreign key from categories and id is from group table
    }
}
