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

use App\Http\Controllers\CategoryController;

// admin Route

Route::get('admin-register', 'AdminController@showRegistreForm')->name('admin-register');
Route::post('admin-register', 'AdminController@proccessAdminRegister');

Route::get('admin-login', 'AdminController@showAdminForm')->name('admin-login');
Route::post('admin-login', 'AdminController@proccessAdminLogin');

Route::get('/admin2', 'AdminController@adminPanel')->name('home');
Route::get('/logout', 'AdminController@adminlogout')->name('admin/logout');


// Tamplate Routes ===========================================
Route::get('/', 'TemplageController@index');
Route::get('/mix/{id}', 'TemplageController@index');

Route::get('/ajax/category/{id}', 'TemplageController@test');
Route::get('/single/product/{slug}', 'TemplageController@singleProduct');

Route::get('/shop', 'TemplageController@shop');
Route::get('/shop/{id}', 'TemplageController@shop');

Route::get('blog', 'TemplageController@blog');
Route::get('blog-details/{slug}', 'TemplageController@blogDetails');

Route::get('category/product/{id}', 'TemplageController@categoryProduct');

// Authentication Route
Auth::routes(['verify' => true]);

// Admin Route===============================================

// Route::get('/admin2', 'HomeController@index');


// Category Routes ======================================
Route::get('category', 'CategoryController@categoryForm');
Route::post('add-category', 'CategoryController@category_add');
Route::get('view/{view_id}', 'CategoryController@categoryView');
Route::get('edit/{edit_id}', 'CategoryController@categoryEdit');
Route::post('update-category/{update_id}', 'CategoryController@categoryUpdate');
Route::get('delete/{delete_id}', 'CategoryController@categoryDelete');
Route::get('category-trush', 'CategoryController@Categorytrush');
Route::get('restor_category/{restor_id}', 'CategoryController@restor_category');
Route::get('force_delete_category/{force_id}', 'CategoryController@force_category');

// Sub-category Routes ============================
Route::get('sub-category', 'SubCategoryController@subCategoryForm');
Route::post('add-sub-category', 'SubCategoryController@subCategoryAdd');



// Product Routes=======================
Route::get('/add-product', 'ProductController@productForm');
Route::post('/insert-product', 'ProductController@productInsert');
Route::get('/view-product', 'ProductController@productView');
Route::get('/edit-product/{edit_prdct_id}', 'ProductController@productEdit');
Route::post('/update-product', 'ProductController@productUpdate');

// cart route===============
Route::get('/cart/{cart}', 'CartController@cart');
Route::get('/delete/cart/{cart}', 'CartController@cartDelete');
Route::get('/shopping-cart', 'CartController@shoppingCart');
Route::get('/shopping-cart/{id}', 'CartController@shoppingCart');
Route::post('/shamim', 'CartController@updateCart')->name('updateCart');

//checkout Route
Route::get('checkout', 'HomeController@checkout');


// Coupon Route
Route::get('/add-coupon', 'CouponController@addCoupon');
Route::post('/store-coupon', 'CouponController@storeCoupon');
Route::get('/edit-coupon/{id}', 'CouponController@editCoupon');
Route::post('/update-coupon/{update_id}', 'CouponController@updateCoupon');

// Blog Route
Route::get('/add-blog', 'BlogController@BlogForm');
Route::post('/store-blog', 'BlogController@StorBlog');
Route::get('/delete-blog/{id}', 'BlogController@BlogDelete');
Route::get('/edit-blog/{id}', 'BlogController@Blogedit');
Route::post('/update-blog', 'BlogController@BlogUpdate');


// dependancy Route
Route::get('/ajax/state/{state_id}', 'HomeController@ajaxState');
Route::get('/ajax/city/{city_id}', 'HomeController@ajaxCity');

// stripe

Route::get('stripe', 'HomeController@stripe');
Route::post('stripe/post', 'HomeController@stripePost');

// mail
Route::get('mail', 'HomeController@email');
Route::get('excel/download', 'HomeController@excelDownload');
Route::get('pdf/download', 'HomeController@pdfDownload');


// review Route

Route::post('add/review', 'ReviewController@addReview');

//comment route

Route::post('add/comment', 'CommentController@addComment')->middleware('auth');
Route::post('add/reply', 'ReplyController@addReply')->middleware('auth');


























// Biography(3)
// Business(4)
// Cookbooks(6)
// Health & Fitness(7)
// History(8)
// Mystery(9)
// Inspiration(13)
// Romance(20)
// Fiction/Fantasy(22)
// Self-Improvement(13)
// Humor Books(17)
// Harry Potter(20)
// Land Of Stories(34)
// Kids' Music(60)
// Toys & Games(3)
// Hoodies
