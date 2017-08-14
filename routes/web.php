<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Navigation;

Route::get('/', function () {
    return view('admin.home');
});

Route::get('/admin', function () {
    return view('admin.home');
});

Route::get('/admin/login', function () {
    return view('admin.auth.login');
});

Route::get('/charts', function () {
    return View::make('admin.charts');
});

Route::get('/tables', function () {
    return View::make('admin.table');
});


Route::get('/forms', function () {
    return View::make('admin.form');
});

Route::get('/grid', function () {
    return View::make('admin.grid');
});

Route::get('/buttons', function () {
    return View::make('admin.buttons');
});

Route::get('/icons', function () {
    return View::make('admin.icons');
});

Route::get('/panels', function () {
    return View::make('admin.panel');
});

Route::get('/typography', function () {
    return View::make('admin.typography');
});

Route::get('/notifications', function () {
    return View::make('admin.notifications');
});

Route::get('/blank', function () {
    return View::make('admin.blank');
});

Route::get('/documentation', function () {
    return View::make('admin.documentation');
});

Route::get('/stats', function() {
   return View::make('admin.stats');
});

Route::get('/progressbars', function() {
    return View::make('admin.progressbars');
});

Route::get('/collapse', function() {
    return View::make('admin.collapse');
});
Route::get('/category',function(){
    $categories = Navigation::with('children')->where('parent_id','=',0)->get();
    return view('menu',['categories'=>$categories]);
});
Route::get('jquery-tree-view',array('as'=>'jquery.treeview','uses'=>'TreeController@treeView'));
Route::get('sendemail', function () {

    $data = array(
        'name' => "Learning Laravel",
    );

    Mail::send('emails.welcome', $data, function ($message) {

        $message->from('kdhruv28@gmail.com', 'Learning Laravel');

        $message->to('sahil@interactivebees.com')->subject('Learning Laravel test email');

    });

    return "Your email has been sent successfully";

});
Route::get('/payments/excel',
    [
        'as' => 'admin.payments.excel',
        'uses' => 'HomeController@excel'
    ]);
/*
 * Admin Routes Goes Below
 */
Auth::routes();
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function()
{
Route::get('/home', 'HomeController@index');
Route::get('/users', 'AdminController@user');
Route::get('/addcategory', 'AdminController@createCategory');
Route::post('/storeCategory', 'AdminController@storeCategory');
Route::get('/categorylist', 'AdminController@allCategory');
Route::get('category/edit/{id}', ['as' => 'category.edit', 'uses' => 'AdminController@edit']);
Route::post('category/update/{id}', ['as' => 'category.update', 'uses' => 'AdminController@update']);
Route::get('category/delete/{id}', ['as' => 'category.delete', 'uses' => 'AdminController@delete']);
Route::get('/addsubcategory', 'AdminController@createSubCategory');
Route::get('/subcategorylist', 'AdminController@allSubCategory');
Route::get('subcategory/edit/{id}', ['as' => 'subcategory.edit', 'uses' => 'AdminController@SubCatEdit']);
Route::post('subcategory/update/{id}', ['as' => 'sub.category.update', 'uses' => 'AdminController@SubCatUpdate']);
Route::get('subcategory/delete/{id}', ['as' => 'subcategory.delete', 'uses' => 'AdminController@subcategorydelete']);
Route::get('/addproductrange', 'AdminController@createProductRange');
Route::get('/productrangelist', 'AdminController@allProductRange');
Route::get('productrange/edit/{id}', ['as' => 'productrange.edit', 'uses' => 'AdminController@ProductRangeEdit']);
Route::post('productrange/update/{id}', ['as' => 'productrange.update', 'uses' => 'AdminController@ProductRangeUpdate']);
Route::get('productrange/delete/{id}', ['as' => 'productrange.delete', 'uses' => 'AdminController@productrangedelete']);
Route::get('/addproduct', 'AdminController@createProduct');
Route::post('/storeProduct', 'AdminController@storeProduct');
Route::post('ajax-subcat','AdminController@getSubCat');
Route::post('ajax-product-range','AdminController@getProductRange');
Route::get('/productlist', 'AdminController@allProduct');
Route::get('product/edit/{id}', ['as' => 'product.edit', 'uses' => 'AdminController@ProductEdit']);
Route::post('product/update/{id}', ['as' => 'product.update', 'uses' => 'AdminController@ProductUpdate']);
Route::get('product/delete/{id}', ['as' => 'product.delete', 'uses' => 'AdminController@productdelete']);
// show new post form
  Route::get('new-blog','BlogController@create');
    // save new post
    Route::post('storeBlog','BlogController@storeBlog');
    // display user's all posts
    Route::get('bloglist','BlogController@allblog');
    Route::get('blog/edit/{id}', ['as' => 'blog.edit', 'uses' => 'BlogController@blogEdit']);
    Route::post('blog/update/{id}', ['as' => 'blog.update', 'uses' => 'BlogController@updateBlog']);
    Route::get('blog/delete/{id}', ['as' => 'blog.delete', 'uses' => 'BlogController@deleteBlog']);
    // display user's drafts
    Route::get('my-drafts','UserController@user_posts_draft');
    // add comment
    Route::post('comment/add','CommentController@store');
    // delete comment
    Route::post('comment/delete/{id}','CommentController@distroy');
});


