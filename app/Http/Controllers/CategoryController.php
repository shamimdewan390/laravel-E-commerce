<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use Carbon\Carbon;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('verified');
    }

    function categoryForm()
    {
        $allCategory = Category::orderBy('id', 'desc')->paginate(3)->onEachSide(1);
        $count = Category::count();
        return view('frontend/category_form', compact('allCategory', 'count'));
    }

    function category_add(Request $catch_cat_form_val)
    {

        $catch_cat_form_val->validate([
            'category' => ['required', 'min:3', 'max:20', 'unique:categories,category_name', 'string']
        ], [
            'category.required' => 'khali rakha jabena bro',
            'category.unique' => 'ai name lok ache bro'
        ]);

        Category::insert([
            'category_name' => $catch_cat_form_val->category,
            'created_at' => Carbon::now()
        ]);
        return back()->with('success', 'Insert Successfully');
    }

    function categoryView($catch_view_id)
    {
        $all_cat_view = Category::findOrFail($catch_view_id);

        return $all_cat_view->category_name;
    }

    function categoryEdit($edit_id,Request $r)
    {
        $page = $r->input('page');
        $all_edit_id = Category::findOrFail($edit_id);

        return view('frontend/update_category', compact('all_edit_id','page'));
    }

    function categoryUpdate($catch_up_id, Request $update_id)
    {
        $p=$update_id->input('page');
        $update_id->validate([
            'category' => ['required', 'min:3', 'max:20']
        ], [
            'category.required' => 'khali rakha jabena bro',
        ]);
        Category::findOrFail($catch_up_id)->update([
            'category_name' => $update_id->category
        ]);

        return redirect("category?page=$p");
    }

    function categoryDelete($catch_del_id)
    {
        Category::findOrFail($catch_del_id)->delete();
        return back()->with('delete', 'Delete Successfully');
    }

    function Categorytrush()
    {
        $deleteCategoray = Category::onlyTrashed()->paginate(2);
        return view('frontend.trashCategory', compact('deleteCategoray'));
    }

    function restor_category($catch_restor_id)
    {
        Category::withTrashed()->findOrFail($catch_restor_id)->restore();
        return back();
    }
    
    function force_category($catch_force_id)
    {
        Category::withTrashed()->findOrFail($catch_force_id)->forceDelete();
        return back();
    }
}
