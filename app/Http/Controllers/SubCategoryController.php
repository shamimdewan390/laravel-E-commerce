<?php

namespace App\Http\Controllers;
use App\Category;
use App\subCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    function subCategoryForm(){

        $allCategory = Category::all();
        $allSubCategory = subCategory::paginate(3);
        return view('frontend.sub-category.sub_categoryform', compact('allSubCategory','allCategory'));
    }

    function subCategoryAdd(Request $catch_sub_val){

        $catch_sub_val->validate([

            'category_id' => ['required']
        ],[
            'sub_category.unique' => 'ai mane porduct ache bro!!'
        ]);

        subCategory::insert([
            'subcategory_name' => $catch_sub_val->sub_category,
            'category_id' => $catch_sub_val->category_id,
            'created_at' => Carbon::now()
        ]);
        
        return redirect('sub-category')->with('success', 'sub_category Insert successfully');
    }
}
