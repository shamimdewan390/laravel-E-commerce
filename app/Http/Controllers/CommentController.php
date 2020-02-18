<?php

namespace App\Http\Controllers;

use App\Comment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function addComment(Request $request){

        $validatedData = $request->validate([
            'comment' => 'required'
        ]);

        Comment::insertGetId([
            'user_id' => Auth::id(),
            'comment' => $request->comment,
            'post_id' => $request->post_id,
            'role' => 1,
            'created_at' => Carbon::now()
        ]);
        
        return back();
    }

}
