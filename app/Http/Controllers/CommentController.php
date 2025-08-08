<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{
    //
    function store(Request $request,$id)
    {
        // return $request->all();
 


        $request->validate([
            'comment_text'=>'required',
        ]);

        $request['blog_id']=$id;
        // return $request->all();

        Comment::create($request->all());


       Session::flash('message','Comment berhasil di simpan');
        return redirect()->route('view_blog',$id);
    }
    }

