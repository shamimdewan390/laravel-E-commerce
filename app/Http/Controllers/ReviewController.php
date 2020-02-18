<?php

namespace App\Http\Controllers;

use App\Product;
use App\Review;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function addReview(Request $request){

        $validatedData = $request->validate([

            'review' => 'required',
            'quality' => 'required',
            'price' => 'required',
            'value' => 'required'
        ]);

        $stor = Review::insertGetId([
            'user_id' => Auth::id(),
            'product_id' => $request->product_id,
            'review' => $request->review,
            'quality' => $request->quality,
            'price' => $request->price,
            'value' => $request->value,
            'approve' => 1,
            'created_at' =>Carbon::now()
        ]);
        
        return back();
    }
}
