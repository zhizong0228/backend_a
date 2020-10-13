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

// Route::get('/index', function () {
//     return view('welcome');
// });

Route::get('/', 'FrontController@index'); //首頁
//               某控制器名稱內的函式名稱

Route::get('/news', 'FrontController@news'); //新聞頁
Route::get('/news_info/{news_id}', 'FrontController@news_info'); //新聞內頁
Route::get('/contact_us', 'FrontController@contact_us'); //聯絡我們

Route::post('/store_contact','FrontController@store_contact');

Auth::routes(['register' => true,'reset' => false]);

Route::get('/admin', 'HomeController@index')->name('home');

//後台最新消息管理
// Route::get('/admin/news','HomeController@index')->middleware('auth');
// Route::get('/admin/news/create','HomeController@create')->middleware('auth');
// Route::post('/admin/news/store','HomeController@store')->middleware('auth');
// Route::get('/admin/news/edit/{news_id}','HomeController@edit')->middleware('auth');
// Route::post('/admin/news/update/{news_id}','HomeController@update')->middleware('auth');
// Route::get('/admin/news/delete/{news_id}','HomeController@delete')->middleware('auth');

Route::prefix('admin')->middleware(['auth'])->group(function () {

    //後台最新消息管理
    Route::get('news','NewsController@index');
    Route::get('news/create','NewsController@create');
    Route::post('news/store','NewsController@store');
    Route::get('news/edit/{news_id}','NewsController@edit');
    Route::post('news/update/{news_id}','NewsController@update');
    Route::get('news/destroy/{news_id}','NewsController@destroy');

    //後台商品管理
    Route::get('product','productController@index');
    Route::get('product/create','productController@create');
    Route::post('product/store','productController@store');
    Route::get('product/edit/{product_id}','productController@edit');
    Route::post('product/update/{product_id}','productController@update');
    Route::get('product/destroy/{product_id}','productController@destroy');
});
