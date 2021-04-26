<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


/*Route::get('/', function () {
    return view('welcome');
});*/


Route::get('/', function () {
    return view('frontend.index');
});
Route::get('/dashboard', function () {
    return view('admin.dashboard');
});


Auth::routes();

Route::get('collections','Frontend\CollectionController@index');
//Frontend
Route::get('collection/{group_url}','Frontend\CollectionController@groupview');

Route::group(['middleware' => ['auth','isUser']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/my-profile','Frontend\UserController@profile');
    Route::post('/my-profile-update','Frontend\UserController@profile_update');
});



Route::group(['middleware' => ['auth','isAdmin']], function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });
    //Route::get('/check', 'Admin\RegisteredController@userOnlineStatus');
    Route::get('/registered-user', 'Admin\RegisteredController@index');
    Route::get('/role-edit/{id}', 'Admin\RegisteredController@edit');
    //Route::post('/role-update/{id}','Admin\RegisteredController@update');
});
Route::post('/role-update/{id}','Admin\RegisteredController@update');

   //Groups
    Route::get('group','Admin\GroupController@index');
    Route::get('group-add','Admin\GroupController@viewpage');
    Route::post('group-store','Admin\GroupController@store');
    Route::get('group-edit/{id}','Admin\GroupController@edit');
    Route::put('group-update/{id}','Admin\GroupController@update');
    Route::get('group-delete/{id}','Admin\GroupController@delete');
    Route::get('group-deleted-records','Admin\GroupController@deletedrecords');
    Route::get('group-re-store/{id}','Admin\GroupController@deletedrestore');

    //Category
    Route::get('/category','Admin\CategoryController@index');
    Route::get('/category-add','Admin\CategoryController@create');
    Route::post('/category-store','Admin\CategoryController@store');
    Route::get('/category-edit/{id}','Admin\CategoryController@edit');
    Route::put('/category-update/{id}','Admin\CategoryController@update');
    Route::get('/category-delete/{id}','Admin\CategoryController@delete');
    Route::get('/category-deleted-records','Admin\CategoryController@deletedrecords');
    Route::get('category-re-store/{id}','Admin\CategoryController@deletedrestore');

    //SubCategory
    /*Route::group(['prefix' => ''], function(){

    });*/
    Route::get('/sub-category','Admin\SubcategoryController@index');
    Route::get('/sub-category-view','Admin\SubcategoryController@view');
    Route::post('/sub-category-store','Admin\SubcategoryController@store');
    Route::get('/sub-category-edit/{id}','Admin\SubcategoryController@edit');
    Route::put('/sub-category-update/{id}','Admin\SubcategoryController@update');
    Route::get('/sub-category-delete/{id}','Admin\SubcategoryController@delete');

    //product
    Route::get('/products','Admin\ProductController@index');
    Route::get('/add-products','Admin\ProductController@create');
    Route::post('/store-products','Admin\ProductController@store');
    Route::get('/edit-products/{id}','Admin\ProductController@edit');
    Route::put('/update-products/{id}','Admin\ProductController@update');
    Route::get('/delete-products/{id}','Admin\ProductController@delete');

    Route::group(['middleware' => ['auth','isVendor']], function () {
        Route::get('/vendor-dashboard', function () {
            return view('vendor.dashboard');
        });
    });

