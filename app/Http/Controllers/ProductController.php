<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;
use App\Billing;

class ProductController extends Controller
{

    public function productForm(){

       $allCategory = Category::all();
        return view('admin.product.addproductForm', compact('allCategory'));
    }

    public function productInsert(Request $req){

        $req->validate([
            'alart_quantity'=> 'required'
        ]);

        if($req->hasFile('product_image')){

            $get_img = $req->file('product_image');
            $img = time().Str::random(10).'.'.$get_img->getClientOriginalName();
            Image::make($get_img)->resize(300, 200)->save(public_path('images/product/'.$img));

        }else{
            $img = 'df.png';
        }

        Product::insert([
            'product_name'          => $req->product_name,
            'slug'                  => $req->slug,
            'category_id'           => $req->category_id,
            'sub_category_id'       => $req->subcategory_id,
            'product_summary'       => $req->product_summary,
            'product_description'   => $req->product_description,
            'product_price'         =>$req->product_price,
            'product_quantity'      => $req->product_quantity,
            'alart_quantity'        => $req->alart_quantity,
            'product_image'         => 'images/product/'.$img,
            'created_at'            => Carbon::now(),
        ]);

        return back()->with('success', 'Product Insert Successful');
    }

    public function productView(){

        $allProduct = Product::orderBy('id', 'desc')->paginate(5);

        return view('admin.product.viewProduct', compact('allProduct'));
    }

    function productEdit($catch_id){
        $allCategory = Category::all();
        $oldProdect = Product::findOrFail($catch_id);

        session(['edit_id' => $catch_id]);

        return view('admin.product.editProduct', compact('oldProdect', 'allCategory'));
    }

    public function productUpdate(Request $req){

        $update_id = $req->session()->get('edit_id');

        $product_img = Product::findOrFail($update_id)->product_image;


        $img = 'df.png';



        if($req->hasFile('product_image')){

            if ($img) {
            $get_img = $req->file('product_image');
            $img = time().Str::random(10).'.'.$get_img->getClientOriginalName();
            Image::make($get_img)->resize(300, 200)->save(public_path('images/product/'.$img));
            }
            else if (file_exists($product_img)) {

                unlink($product_img);
            }

            Product::findOrFail($update_id)->update([
                'product_name'          => $req->product_name,
                'slug'                  => $req->slug,
                'category_id'           => $req->category_id,
                'product_summary'       => $req->product_summary,
                'product_description'   => $req->product_description,
                'product_price'         => $req->product_price,
                'product_quantity'      => $req->product_quantity,
                'alart_quantity'        => $req->alart_quantity,
                'product_image'         => 'images/product/'.$img,
                'updated_at'            => Carbon::now()
            ]);

        }else{
            Product::findOrFail($update_id)->update([
                'product_name'          => $req->product_name,
                'slug'                  => $req->slug,
                'category_id'           => $req->category_id,
                'product_summary'       => $req->product_summary,
                'product_description'   => $req->product_description,
                'product_price'         =>$req->product_price,
                'product_quantity'      => $req->product_quantity,
                'alart_quantity'        => $req->alart_quantity,
                'updated_at'            => Carbon::now()
            ]);
        }

        return redirect('view-product')->with('update_success', 'Update successful');
        
    }
}
