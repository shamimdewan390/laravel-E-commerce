<?php

namespace App\Http\Controllers;

use App\Blog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;

class BlogController extends Controller
{
    function BlogForm(){

        $all_blog_post = Blog::all();
        return view('admin.blog.addBlog',compact('all_blog_post'));
    }

    function StorBlog(Request $request){

        if($request->hasFile('blog_image')){

            $get_img = $request->file('blog_image');
            $img = time().Str::random(10).'.'.$get_img->getClientOriginalName();
            Image::make($get_img)->resize(300, 200)->save(public_path('images/blog/'.$img));

        }else{

            $img = 'df.png';
        }

        Blog::insert([
            'blog_title'         => $request->blog_title,
            'blog_slug'         => $request->blog_slug.'-'.time(),
            'blog_details'       => $request->blog_details,
            'blog_image'         => 'images/blog/'.$img,
            'created_at'         => Carbon::now(),
        ]);

        return back()->with('success', 'Post insert successfull!!');
    }

    function BlogDelete($id){

        Blog::findOrFail($id)->delete();
        return back()->with('delete','delete successfull!!');
    }

    function Blogedit($id){

        $oldValue = Blog::findOrFail($id);
        session(['blog_id'=> $id]);
        return view('admin.blog.editBlog',compact('oldValue'));

    }

    function BlogUpdate(Request $request){

        $update_id = $request->session()->get('blog_id');

        $product_img = Blog::findOrFail($update_id)->blog_image;

        $img = 'df.png';

        if($request->hasFile('blog_image')){

            if ($img) {
            $get_img = $request->file('blog_image');
            $img = time().Str::random(10).'.'.$get_img->getClientOriginalName();
            Image::make($get_img)->resize(300, 200)->save(public_path('images/blog/'.$img));
            }
            else if (file_exists($product_img)) {

                unlink($product_img);
            }

            Blog::findOrFail($update_id)->update([
                'blog_title'          => $request->blog_title,
                'blog_slug'           => $request->blog_slug.'-'.time(),
                'blog_details'        => $request->blog_details,
                'blog_image'          => 'images/blog/'.$img,
                'updated_at'          => Carbon::now()
            ]);

        }else{
            Blog::findOrFail($update_id)->update([
                'blog_title'          => $request->blog_title,
                'blog_slug'           => $request->blog_slug.'-'.time(),
                'blog_details'        => $request->blog_details,
                'updated_at'          => Carbon::now()
            ]);
        }
        return redirect('add-blog')->with('update_success', 'Update successful');
    }
}
