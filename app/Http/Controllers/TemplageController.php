<?php

namespace App\Http\Controllers;

use App\Billing;
use App\Blog;
use App\Cart;
use App\Category;
use App\Comment;
use App\Mail\SendEmail;
use App\Product;
use App\Reply;
use App\Review;
use App\subCategory;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TemplageController extends Controller
{


    public function index($mix = '')
    {

        $new_product = Product::latest()->take(10)->get();

        $all_category = Category::all();

        if ($mix != '') {
            session(['active' => $mix]);
            $all_product = Product::where('category_id', $mix)->get();
            return view('template.content', compact('new_product', 'all_category', 'all_product'));
        } else {
            session(['active' => '']);
            $all_product = Product::all();

            return view('template.content', compact('new_product', 'all_product', 'all_category'));
        }
    }

    function test($id)
    {
        $allsub = subCategory::where('category_id', $id)->get();
        return response($allsub);
    }

    function singleProduct($slug)
    {

        $MAC = exec('getmac');
        $MAC = strtok($MAC, ' ');

        $single_wiew = Product::where('slug', $slug)->first();
        $allcategory = Category::all();
        $relatedProduct = Product::where('category_id', $single_wiew->category_id)->get();

        $product_id = Product::where('slug', $slug)->first()->id;
        $reviews = Review::where('product_id', $product_id)->get();


        $review_count = Review::where('product_id', $product_id)->count();

        $use_rev = Review::where('product_id', $product_id)->where('user_id', Auth::id())->count();
        $review_user_id = Billing::where('user_id', Auth::id())->where('product_id', $product_id)->count();

        $quatiry = 0;
        $price = 0;
        $value = 0;
        $quatiry_review =0;
        $price_review =0;
        $value_review =0;
        $all_review =0;

        foreach ($reviews as $review) {
            $quatiry    += $review->quality;
            $price      += $review->price;
            $value      += $review->value;
        }


        if ($reviews->count() != 0) {
            $quatiry_review = $quatiry  / $review_count;
            $price_review   = $price    / $review_count;
            $value_review   = $value    / $review_count;
        }

        $all_review = ($quatiry_review + $price_review + $value_review) / 3;

        return view('template/singleProduct', compact('single_wiew', 'allcategory', 'relatedProduct','quatiry_review','price_review','value_review','all_review','review_user_id','review_count','use_rev','reviews'));
    }

    function shop($shop = '')
    {

        $all_category = Category::all();
        $lastPost = Product::latest()->take(1)->first();

        if ($shop != '') {
            $all_product = Product::where('category_id', $shop)->paginate(6);
        }else{

            $all_product = Product::paginate(6);
        }
        return view('template/shop', compact('all_category', 'all_product', 'lastPost'));

    }

    function blog()
    {
        $all_blog = Blog::orderBy('id', 'desc')->paginate(5);
        $lastPost = Blog::latest()->take(5)->get();
        $all_category = Category::all();
        return view('template.blog', compact('all_blog', 'all_category', 'lastPost'));
    }

    function blogDetails($slug)
    {
        $lastPost = Blog::latest()->take(5)->get();
        $all_category = Category::all();
        $single_wiew = Blog::where('blog_slug', $slug)->first();
        $post_id = Blog::where('blog_slug', $slug)->first()->id;
        $post_count = Comment::where('post_id', $post_id)->count();
        $post_get = Comment::where('post_id', $post_id)->get();

      
        return view('template.blogDetails', compact('single_wiew', 'lastPost', 'all_category','post_count','post_get'));
    }
    
    public function categoryProduct($id){
        return Product::where('category_id', $id)->get();
    }
}
