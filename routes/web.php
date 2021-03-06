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
//測試看畫面
Route::get('/test', function () {
    return view('front.loading');
});

//前台 不須登入
Route::get('/index','FrontController@index');
Route::get('/loginpage','FrontController@loginpage');
Route::post('/addtocart', 'FrontController@addtocart');
Route::post('/feedbackstore', 'NewsController@feedbackstore');

//前台會員 需登入
Route::middleware('member')->group(function(){
    Route::get('/shopping01', 'FrontController@shopping_01');
    Route::post('/shopping02', 'FrontController@shopping_02');
    Route::post('/shopping03', 'FrontController@shopping_03');
    Route::post('/deletetocart', 'FrontController@deletetocart');
    Route::get('/trade/{id}', 'FrontController@trade');
});

//後台 需登入
Route::middleware('userlevel')->group(function(){

    Route::get('/', function () {
        return view('welcome');
    });

    //訂單管理
    Route::prefix('/order')->group(function(){
        Route::get('/', 'OrderController@index');
        Route::get('/orderlook/{id}', 'OrderController@orderlook');
        Route::post('/orderupdate/{id}', 'OrderController@orderupdate');
        Route::get('/orderdelete/{id}', 'OrderController@orderdelete');
    });

    //會員管理
    Route::prefix('/user')->group(function () {
        Route::get('/', 'UserController@index');
        Route::get('/userlook/{id}', 'UserController@userlook');
        Route::post('/userupdate/{id}', 'UserController@userupdate');
        Route::get('/userdelete/{id}', 'UserController@userdelete');
    });

    //行銷訊息
    Route::prefix('/news')->group(function(){
        Route::get('/', 'NewsController@index');
        //主頁大圖
        Route::post('/imguploadcover1', 'NewsController@imgUploadcover1');
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
        Route::post('/imgupload', 'ProductController@imgUpload');
        Route::post('/imgDelete', 'ProductController@imgDelete');
    });

    //商品專區
    Route::prefix('/product')->group(function(){
        Route::get('/','ProductController@index');
        //折扣專區
        Route::get('/discountcreate', 'ProductController@discountcreate');
        Route::POST('/discountstore', 'ProductController@discountstore');
        //最新商品
        Route::post('/imguploadcover2', 'ProductController@imgUploadcover2');
        Route::get('/latestcreate', 'ProductController@latestcreate');
        Route::POST('/lateststore', 'ProductController@lateststore');
        //精選商品
        Route::get('/selectcreate', 'ProductController@selectcreate');
        Route::POST('/selectstore', 'ProductController@selectstore');
        //客製專區
        Route::post('/imguploadcover3', 'ProductController@imgUploadcover3');
        Route::get('/customcreate', 'ProductController@customcreate');
        Route::POST('/customstore', 'ProductController@customstore');
        //共用功能
        Route::get('/edit/{id}', 'ProductController@edit');
        Route::POST('/update/{id}', 'ProductController@update');
        Route::get('/delete/{id}', 'ProductController@delete');
        Route::post('/imgUpload', 'ProductController@imgUpload');
        Route::post('/imgDelete', 'ProductController@imgDelete');
    });

    //意見回饋
    Route::prefix('/feedback')->group(function(){
        Route::get('/','NewsController@feedback');
        Route::get('/delete/{id}','NewsController@feedbackdelete');
    });
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
