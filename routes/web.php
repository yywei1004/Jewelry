<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

//前台 不須登入
Route::get('/', function () {
    return view('welcome');
});
Route::get('/index','FrontController@index');
Route::post('/addtocart', 'FrontController@addtocart');

//需登入
Route::middleware('userlevel')->group(function(){
    Route::get('/shopping01', 'FrontController@shopping_01');
    Route::post('/shopping02', 'FrontController@shopping_02');
    Route::post('/shopping03', 'FrontController@shopping_03');
    Route::post('/store', 'FrontController@store');
    Route::get('/shopping04/{id}', 'FrontController@shopping_04');
    Route::post('/deletetocart', 'FrontController@deletetocart');
    Route::get('/trade/{id}', 'FrontController@trade');
});


//後台 需登入
Route::middleware('userlevel')->group(function(){

    //會員
    Route::prefix('/user')->group(function () {
        Route::get('/', 'UserController@index');
        Route::get('/look/{id}', 'UserController@look');
        Route::post('/update/{id}', 'UserController@update');
    });

    //最新消息
    Route::prefix('/news')->group(function(){
        Route::get('/', 'NewsController@index');
        //最新消息
        Route::get('/newscreate', 'NewsController@newscreate');
        Route::POST('/newsstore', 'NewsController@newsstore');
        Route::get('/newsedit/{id}', 'NewsController@newsedit');
        Route::POST('/newsupdate/{id}', 'NewsController@newsupdate');
        Route::get('/newsdelete/{id}', 'NewsController@newsdelete');
        //系列主題
        Route::get('/themecreate', 'NewsController@themecreate');
        Route::POST('/themestore', 'NewsController@themestore');
        Route::get('/themeedit/{id}', 'NewsController@themeedit');
        Route::POST('/themeupdate/{id}', 'NewsController@themeupdate');
        Route::get('/themedelete/{id}', 'NewsController@themedelete');
        Route::post('/imgupload', 'NewsController@imgUpload');
        Route::post('/imgDelete', 'ProductController@imgDelete');
    });

    //商品專區
    Route::prefix('/product')->group(function(){
        Route::get('/','ProductController@index');
        //折扣專區
        Route::get('/discountcreate', 'NewsController@discountcreate');
        Route::POST('/discountstore', 'NewsController@discountstore');
        Route::get('/discountedit/{id}', 'NewsController@discountedit');
        Route::POST('/discountupdate/{id}', 'NewsController@discountupdate');
        Route::get('/discountdelete/{id}', 'NewsController@discountdelete');
        Route::post('/imgupload', 'NewsController@imgUpload');
        Route::post('/imgDelete', 'ProductController@imgDelete');


        Route::get('/create', 'ProductController@create');
        Route::post('/store', 'ProductController@store');
        Route::get('/edit/{id}', 'ProductController@edit');
        Route::post('/update/{id}', 'ProductController@update');
        Route::get('/delete/{id}', 'ProductController@delete');
        Route::post('/imgUpload', 'ProductController@imgUpload');
        Route::post('/imgDelete', 'ProductController@imgDelete');
    });

    //訂單
    Route::prefix('/order')->group(function(){
        Route::get('/', 'OrderController@index');
        Route::get('/look/{id}', 'OrderController@look');
        Route::post('/update/{id}', 'OrderController@update');
    });

    //意見回饋
    Route::prefix('/feedback')->group(function(){
        Route::get('/','NewsController@feedback');
        Route::get('/delete/{id}','NewsController@feedbackdelete');
    });
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
