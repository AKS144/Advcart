<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class SubcategoryController extends Controller
{
    public function index()
    {
        $category = Category::where('status','!=','3')->get();
        $subcategory = Subcategory::where('status','!=','3')->get();//3-deleted
        return view('admin.collection.subcategory.index')
                ->with('subcategory',$subcategory)
                ->with('category',$category);
    }

    public function view()
    {
        $subcategory = Category::where('status','!=','3')->get();
        return view('admin.collection.subcategory.create')->with('subcategory',$subcategory);
        //for modal this is not used 1st line in store() video 29
    }

    public function store(Request $request)
    {
        $subcategory = new Subcategory();//new Category to be used as if above modal is used
        $subcategory->category_id = $request->input('category_id');
        $subcategory->name = $request->input('name');
        $subcategory->url = $request->input('url');
        $subcategory->description = $request->input('description');
        //$category->image = $request->input('category_img');
        if($request->hasfile('image'))
        {
           $image_file = $request->file('image');
           $img_extension = $image_file->getClientOriginalExtension();//sometimes same name,no will store so time extension will stores with time
           $img_filename = time().'.'.$img_extension;
           $image_file->move('uploads/subcategoryimage/',$img_filename);//folder uploads
           $subcategory->image = $img_filename;
        }
        $subcategory->priority = $request->input('priority');//0-show, 1-hide
        $subcategory->status = $request->input('status') == true ? '1':'0';//0-show, 1-hide
        $subcategory->save();
        return redirect()->back()->with('status','Added Successfully');
    }

    public function edit($id)
    {
        $category = Category::where('status','!=','3')->get();
        $subcategory = Subcategory::find($id);
        return view('admin.collection.subcategory.edit')
            ->with('subcategory',$subcategory)
            ->with('category',$category);
    }


    public function update(Request $request, $id)
    {
        $subcategory = Subcategory::find($id);//new Category to be used as if above modal is used
        $subcategory->category_id = $request->input('category_id');
        $subcategory->name = $request->input('name');
        $subcategory->url = $request->input('url');
        $subcategory->description = $request->input('description');
        //$category->image = $request->input('category_img');
        if($request->hasfile('image'))
        {
            $filepath_img = 'uploads/subcategoryimage/'.$subcategory->image;
            if(File::exists($filepath_img))
            {
                 File::delete($filepath_img);
            }
           $image_file = $request->file('image');
           $img_extension = $image_file->getClientOriginalExtension();//sometimes same name,no will store so time extension will stores with time
           $img_filename = time().'.'.$img_extension;
           $image_file->move('uploads/subcategoryimage/',$img_filename);//folder uploads
           $subcategory->image = $img_filename;
        }
        $subcategory->priority = $request->input('priority');//0-show, 1-hide
        $subcategory->status = $request->input('status') == true ? '1':'0';//0-show, 1-hide
        $subcategory->update();
        return redirect('sub-category')->back()->with('status','Added Successfully');
    }

    public function delete($id)
    {
        $subcategory = Subcategory::find($id);
        $subcategory->status = '3';//3-Deleted Records
        $subcategory->update();
        return redirect()->back()->with('status','Subcategory Deleted successfully');
    }
}
