<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index(){
        
    }
    public function commnetSubmit(Request $request)
    {
        die('dddd');
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'website' => 'required',
            'comment' => 'required',
        ]);

        if ($validator->passes()) {
            $comment = Comment::create($request->all());
            if($comment)
                return response()->json(['success'=>'Added new records.']);
        }
        return response()->json(['error'=>$validator->errors()]);
    }

}
