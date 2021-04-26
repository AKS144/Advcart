<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Groups;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CollectionController extends Controller
{
    public function index()
    {
        $groups = Groups::where('status','0')->get();
        return view('frontend.collection.index')
        ->with('groups',$groups);
    }

    public function groupview($group_url)
    {
        $group = Groups::where('url',$group_url)->first();//first is used when only one data is required
        $group_id = $group->id;

        $category = Category::where('group_id',$group_id)->where('status','!=','2')->where('status','0')->get();
        return view('frontend.collection.category')
        ->with('category',$category)
        ->with('group',$group);
    }
}
