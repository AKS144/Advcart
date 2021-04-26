<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
                           'sub_category_id',
                           'name',
                           'url',
                           'small_description',
                           'image',
                           'p_highlight_heading',
                           'p_highlights',
                           'p_description',
                           'p_description_heading',
                           'p_details_heading',
                           'p_details',
                           'sale_tag',
                           'original_price','offer_price',
                           'quantity',
                           'priority',
                           'new_arrival_products',
                           'featured_products',
                           'popular_products',
                           'offers_products',
                           'status',
                           'meta_title',
                           'meta_description',
                           'meta_keyboard'
    ];

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class,'sub_category_id','id');
    }

}
