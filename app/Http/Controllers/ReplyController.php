<?php

namespace App\Http\Controllers;

use App\Reply;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReplyController extends Controller
{
    public function addReply(Request $request){
        
        $validatedData = $request->validate([
            'reply' => 'required'
        ]);

        Reply::insertGetId([
            'user_id' => Auth::id(),
            'comment_id' => $request->comment_id,
            'post_id' => $request->post_id,
            'reply' => $request->reply,
            'role' => 2,
            'created_at' => Carbon::now()
        ]);
        return back();
    }

}
