<?php

namespace App\Http\Controllers\Admin;

use App\Models\Groups;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::where('status','!=','3')->get();
        return view('admin.collection.category.index')
                    ->with('category',$category);
    }

    public function create()
    {
        $group = Groups::where('status','!=','3')->get();//3-deleted data
        return view('admin.collection.category.create')->with('group',$group);
    }

    public function store(Request $request)
    {
        $category = new Category();
        $category->group_id = $request->input('group_id');
        $category->url = $request->input('url');
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        //$category->image = $request->input('category_img');
        if($request->hasfile('category_img'))
        {
           $image_file = $request->file('category_img');
           $img_extension = $image_file->getClientOriginalExtension();//sometimes same name,no will store so time extension will stores with time
           $img_filename = time().'.'.$img_extension;
           $image_file->move('uploads/categoryimage/',$img_filename);//folder uploads
           $category->image = $img_filename;
        }

        //$category->icon = $request->input('category_icon');
        if($request->hasfile('category_icon'))
        {
           $icon_file = $request->file('category_icon');
           $icon_extension = $icon_file->getClientOriginalExtension();//sometimes same name,no will store so time extension will stores with time
           $icon_filename = time().'.'.$icon_extension;
           $icon_file->move('uploads/categoryicon/',$icon_filename);//folder uploads
           $category->icon = $icon_filename;
        }
        $category->status = $request->input('status') == true ? '1':'0';//0-show, 1-hide

        /*echo "<pre>";
        print_r($category);
        echo "</pre>";
        exit();*/
        $category->save();

        return redirect()->back()->with('status','Category added Successfully');
    }

    public function edit($id)
    {
        $group = Groups::where('status','!=','2')->get();//$group for group in foreeach
        $category = Category::find($id);
        return view('admin.collection.category.edit')
        ->with('group',$group)
        ->with('category',$category);
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->group_id = $request->input('group_id');
        $category->url = $request->input('url');
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        //$category->image = $request->input('category_img');
        if($request->hasfile('category_img'))
        {
           $filepath_img = 'uploads/categoryimage/'.$category->image;
           if(File::exists($filepath_img))
           {
                File::delete($filepath_img);
           }

           $image_file = $request->file('category_img');
           $img_extension = $image_file->getClientOriginalExtension();//sometimes same name,no will store so time extension will stores with time
           $img_filename = time().'.'.$img_extension;
           $image_file->move('uploads/categoryimage/',$img_filename);//folder uploads
           $category->image = $img_filename;
        }

        //$category->icon = $request->input('category_icon');
        if($request->hasfile('category_icon'))
        {
           $filepath_icon = 'uploads/categoryicon/'.$category->icon;
           if(File::exists($filepath_icon))
           {
                File::delete($filepath_icon);
           }

           $icon_file = $request->file('category_icon');
           $icon_extension = $icon_file->getClientOriginalExtension();//sometimes same name,no will store so time extension will stores with time
           $icon_filename = time().'.'.$icon_extension;
           $icon_file->move('uploads/categoryicon/',$icon_filename);//folder uploads
           $category->icon = $icon_filename;
        }
        $category->status = $request->input('status') == true ? '1':'0';//0-show, 1-hide

        /*echo "<pre>";
        print_r($category);
        echo "</pre>";
        exit();*/

        $category->update();
        return redirect()->back()->with('status','Category updated Successfully');
    }

    public function delete($id)
    {
        $category = Category::find($id);
        $category->status = '3';//3-Deleted Records
        $category->update();
        return redirect()->back()->with('status','Category Deleted successfully');
    }

    public function deletedrecords()
    {
        $category = Category::where('status','3')->get();
        return view('admin.collection.category.deleted')
                   ->with('category',$category);
    }

    public function deletedrestore($id)
    {
        $category = Category::find($id);
        $category->status = '0';//0-show, 1-hide, 2-delete
        $category->update();
        return redirect('category')->with('status','Data restored');//back() not used as redirected to group
    }
}
