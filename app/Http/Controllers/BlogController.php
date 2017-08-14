<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostFormRequest;
use App\Blog;
Use Session;

class BlogController extends Controller
{
    public function create(Request $request)
    {
        // if user can post i.e. user is admin or author

            return view('admin.createblog');

    }
    public function storeBlog(Request $request)
    {
        $input = $request->all();
        Blog::create($input);

        Session::flash('flash_message', 'Blog successfully added!');

        return redirect()->back();
    }
    public function allBlog()
    {
        $blogs=Blog::where('status','=','1')->get();
        return view('admin.blog',compact('blogs'));
    }
    public function blogEdit(Request $request,$id)
    {
        $categoryByid = Blog::findOrFail($id);
        //dd($categoryByid);

        //return view('tasks.edit')->withTask($task);
        return view('admin.createblog',compact('categoryByid'));
    }
    public function updateBlog(Request $request,$id)
    {
        //
        $blog = Blog::findOrFail($id);

        $this->validate($request, [
            'name' => 'required'
        ]);

        $input = $request->all();

        $blog->fill($input)->save();

        Session::flash('flash_message', 'Blog successfully Updated!');

        return redirect()->back();
    }

    public function deleteBlog(Request $request, $id)
    {
        $blog = Blog::find($id);
        $blog->destroy($id);
        Session::flash('flash_message', 'Blog Deleted Successfully!');
        return redirect()->back();
    }
}
