<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\User;
use App\Task;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Session;
use Excel;


class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Auth::user();
        dd($data);
        //return view('home');
        return view('admin.home',compact('data'));
    }
    public function user()
    {
        $data = User::where('id', '!=', Auth::id())->get();
        return view('admin.user',compact('data'));
    }
    public function createCategory()
    {
        return view('admin.createcategory');
    }
    public function storeCategory(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $input = $request->all();

        Category::create($input);

        Session::flash('flash_message', 'Category successfully added!');

        return redirect()->back();
    }

    public function allCategory()
    {
        $category = Category::where('parent_id','=','0')->get();

        return view('admin.category',compact('category'));
    }
    public function edit($id)
    {
        $categoryByid = Category::findOrFail($id);
        //dd($categoryByid);

        //return view('tasks.edit')->withTask($task);
        return view('admin.createcategory',compact('categoryByid'));
    }
    public function update($id, Request $request)
    {
        $category = Category::findOrFail($id);

        $this->validate($request, [
            'name' => 'required'
        ]);

        $input = $request->all();

        $category->fill($input)->save();

        Session::flash('flash_message', 'Category successfully Updated!');

        return redirect()->back();
    }
    public function delete($id, Request $request)
    {
        $category = Category::find($id);
        $category->destroy($id);
        Session::flash('flash_message', 'Category Deleted Successfully!');
        return redirect()->back();
    }
    public function createSubCategory()
    {

        $category=Category::where('status', '=','1')->where('parent_id', '=','0')->get();
        return view('admin.createsubcategory',compact('category'));
    }
    public function allSubCategory()
    {
        $subcategory = Category::where('type','=','2')->get();

        return view('admin.subcategory',compact('subcategory'));
    }

    public function SubCatEdit($id)
    {
        $category=Category::where('status', '=','1')->where('parent_id', '=','0')->get();
        $categoryByid = Category::findOrFail($id);
        //dd($categoryByid);

        //return view('tasks.edit')->withTask($task);
        return view('admin.createsubcategory',compact('categoryByid','category'));
    }

    public function SubCatUpdate($id, Request $request)
    {
        $category = Category::findOrFail($id);

        $this->validate($request, [
            'name' => 'required'
        ]);

        $input = $request->all();

        $category->fill($input)->save();

        Session::flash('flash_message', 'Category successfully Updated!');

        return redirect()->back();
    }
    public function subcatdelete($id, Request $request)
    {
        $category = Category::find($id);
        $category->destroy($id);
        Session::flash('flash_message', 'Sub Category Deleted Successfully!');
        return redirect()->back();
    }
    public function createProductRange()
    {

        $category=Category::where('status', '=','1')->where('type', '=','2')->get();
        return view('admin.createproductrange',compact('category'));
    }
    public function allProductRange()
    {
        $productrange = Category::where('type','=','3')->get();

        return view('admin.productrange',compact('productrange'));
    }

    public function ProductRangeEdit($id)
    {
        $category=Category::where('status', '=','1')->where('type', '=','2')->get();
        $categoryByid = Category::findOrFail($id);
        //dd($categoryByid);

        //return view('tasks.edit')->withTask($task);
        return view('admin.createproductrange',compact('categoryByid','category'));
    }
    public function ProductRangeUpdate($id, Request $request)
    {
        $category = Category::findOrFail($id);

        $this->validate($request, [
            'name' => 'required'
        ]);

        $input = $request->all();

        $category->fill($input)->save();

        Session::flash('flash_message', 'Product Range successfully Updated!');

        return redirect()->back();
    }

    public function productrangedelete($id, Request $request)
    {
        $category = Category::find($id);
        $category->destroy($id);
        Session::flash('flash_message', 'Product Range Deleted Successfully!');
        return redirect()->back();
    }

    public function createProduct()
    {
        $category=Category::where('status', '=','1')->where('type', '=','1')->get();
        return view('admin.createproduct',compact('category'));
    }

    public function getSubCat(Request $request)
    {
        $catid=$request->catid;
        $subcategory=Category::where('status','=','1')->where('type','=','2')->get();
        $html='<option value="">--Please Select Sub Category---</option>option>';
        foreach($subcategory as $cat)
        {
            $html.= '<option value="'.$cat->id.'">'.$cat->name.'</option>';
        }
        return $html;
    }
    public function getProductRange(Request $request)
    {
        $catid=$request->catid;
        $subcategory=Category::where('status','=','1')->where('type','=','3')->get();
        $html='<option value="">--Please Select Range---</option>option>';
        foreach($subcategory as $cat)
        {
            $html.= '<option value="'.$cat->id.'">'.$cat->name.'</option>';
        }
        return $html;
    }
    public function storeProduct(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
        ]);

        $input = $request->all();

        Product::create($input);

        Session::flash('flash_message', 'Category successfully added!');

        return redirect()->back();
    }

}
