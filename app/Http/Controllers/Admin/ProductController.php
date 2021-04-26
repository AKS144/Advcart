<?php

namespace App\Http\Controllers\Admin;


use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::where('status','!=','3')->get();
        return view('admin.collection.product.index')
                    ->with('products',$products);
    }

    public function create()
    {
        $subcategory = Subcategory::where('status','!=','3')->get();//only for subcategory
        return view('admin.collection.product.create')
                    ->with('subcategory',$subcategory);
    }

    public function store(Request $request)
    {
        $products = new Product();
        $products->name = $request->input('name');
        $products->sub_category_id = $request->input('sub_category_id');
        $products->url = $request->input('url');
        $products->small_description = $request->input('small_description');

        if($request->hasfile('prod_image'))
        {
            $image_file = $request->file('prod_image');
            $img_extension = $image_file->getClientOriginalExtension(); // getting image extension
            $img_filename = time() . '.' . $img_extension;
            $image_file->move('uploads/products/', $img_filename);
            $products->image = $img_filename;
        }

        $products->sale_tag = $request->input('saletag');
        $products->original_price = $request->input('original_price');
        $products->offer_price = $request->input('offer_price');
        $products->quantity = $request->input('quantity');
        $products->priority = $request->input('priority');

        $products->p_highlight_heading = $request->input('p_highlight_heading');
        $products->p_highlights = $request->input('p_highlights');
        $products->p_description_heading = $request->input('p_description_heading');
        $products->p_description = $request->input('p_description');
        $products->p_details_heading = $request->input('p_details_heading');
        $products->p_details = $request->input('p_details');

        $products->meta_title = $request->input('meta_title');
        $products->meta_description = $request->input('meta_description');
        $products->meta_keyword = $request->input('meta_keyword');

        $products->new_arrival_products = $request->input('new_arrival') == true ?'1':'0';
        $products->featured_products = $request->input('featured_products') == true ?'1':'0';
        $products->popular_products = $request->input('popular_products') == true ?'1':'0';
        $products->offers_products = $request->input('offers_products') == true ?'1':'0';
        $products->status = $request->input('status') == true ?'1':'0';

        $products->save();
        return redirect()->back()->with('status','Product Successfully Added.!');
    }

    public function edit($id)
    {
        $products = Product::find($id);
        $subcategory = Subcategory::where('status','!=','3')->get();
        return view('admin.collection.product.edit')
        ->with('products',$products)
        ->with('subcategory',$subcategory);
    }

    public function update(Request $request, $id)
    {
        $products = Product::find($id);
        $products->name = $request->input('name');
        $products->sub_category_id = $request->input('sub_category_id');
        $products->url = $request->input('url');
        $products->small_description = $request->input('small_description');

        if($request->hasfile('prod_image'))
        {
            $filepath_img = 'uploads/products/'.$products->image;
            if(File::exists($filepath_img))
            {
                 File::delete($filepath_img);
            }
            $image_file = $request->file('prod_image');
            $img_extension = $image_file->getClientOriginalExtension(); // getting image extension
            $img_filename = time() . '.' . $img_extension;
            $image_file->move('uploads/products/', $img_filename);
            $products->image = $img_filename;
        }

        $products->sale_tag = $request->input('saletag');
        $products->original_price = $request->input('original_price');
        $products->offer_price = $request->input('offer_price');
        $products->quantity = $request->input('quantity');
        $products->priority = $request->input('priority');

        $products->p_highlight_heading = $request->input('p_highlight_heading');
        $products->p_highlights = $request->input('p_highlights');
        $products->p_description_heading = $request->input('p_description_heading');
        $products->p_description = $request->input('p_description');
        $products->p_details_heading = $request->input('p_details_heading');
        $products->p_details = $request->input('p_details');

        $products->meta_title = $request->input('meta_title');
        $products->meta_description = $request->input('meta_description');
        $products->meta_keyword = $request->input('meta_keyword');

        $products->new_arrival_products = $request->input('new_arrival') == true ?'1':'0';
        $products->featured_products = $request->input('featured_products') == true ?'1':'0';
        $products->popular_products = $request->input('popular_products') == true ?'1':'0';
        $products->offers_products = $request->input('offers_products') == true ?'1':'0';
        $products->status = $request->input('status') == true ?'1':'0';

        $products->save();
        return redirect()->back()->with('status','Product Successfully Added.!');
    }

    public function delete($id)
    {
        $products = Product::find($id);
        $products->status = '3';//0-show, 1-hide, 2-delete
        $products->update();
        return redirect()->back()->with('status','Data Deleted');
    }
}
