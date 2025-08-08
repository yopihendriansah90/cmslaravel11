<?php

namespace App\Http\Controllers;

// use Illuminate\Contracts\Session\Session;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller
{
    //
    function index(Request $request )
    {
    //     $title= $request->title;
    //    $blogs = DB::table('blogs')->where('title', 'like', '%' . $title . '%')->orderBy('id', 'desc')->paginate(10);
    //    return view('blog',['data'=>$blogs,'title'=>$title]);


        $title= $request->title;
        $blogs = Blog::where('title', 'like', '%' . $title . '%')->orderBy('id', 'desc')->paginate(10);
        return view('blog',['data' => $blogs,'title' => $title]);
    }


    function add()
    {
       
        return view('blog-add');
    }
    function store(Request $request)
    {

        $request->validate([
            'title'=>'required|max:255|unique:blogs,title',
            // create title uniquer with ignoer this title for update         
            
            'description'=>'required',
        ]);
        // DB::table('blogs')->insert([
        //     'title' => $request->title,
        //     'description' => $request->description,
        //     'created_at' => now(),
        //     'updated_at' => now(),
            
        // ]);

        Blog::create($request->all());


       Session::flash('message','Data berhasil di simpan');
        return redirect('/blog');   
    }
    function edit(Request $request)
    {
        // $id = $request->id;
        // $blog = DB::table('blogs')->where('id', $id)->first();
        //return view ke blog-edit dan membawa hasil dari $blog

         $blog=Blog::findOrFail($request->id);
        return view('blog-edit',['data' => $blog]);

    }

    function view(Request $request)
    {
        // $id=$request->id;
        // $blog=DB::table('blogs')->where('id',$id)->first();
        // if(!$blog){
        //     abort(404);
        // }

        // create ralationshiop for 2 tables

        $blog=Blog::with(['comments.user','tags'])->findOrFail($request->id);
        //  return $blog;
        return view('blog-view',['data' => $blog]);

    }
    
    function update(Request $request)
    {



          $request->validate([
             'title'=>'required|max:255|unique:blogs,title,'.$request->id,
            'description'=>'required',
        ]);
        // $id=$request->id;
        // DB::table('blogs')->where('id',$id)->update([
        //     'title' => $request->title,
        //     'description' => $request->description,
        //     'updated_at' => now(),
        // ]); 
         $blog=Blog::findOrFail($request->id);
         $blog->update($request->all());
        Session::flash('message','Data berhasil di update');
        return redirect('/blog');

    }
    function delete(Request $request)
    {
        
        // $id=$request->id;
        // DB::table('blogs')->where('id',$id)->delete();

        Blog::findOrFail($request->id)->delete();
        Session::flash('message',"Data ID {$request->id} berhasil di hapus");
        return redirect('/blog');
    }
    function restore(Request $request)
    {
        Blog::withTrashed()->findOrFail($request->id)->restore();

    }

}
