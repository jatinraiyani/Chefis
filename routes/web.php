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

/**
 * User Routes
 */
Route::group(['middleware' => 'UserOnly'], function(){

Route::get('/','Frontend\HomeController@index');
Route::get('/chef-list','Frontend\ChefController@index');
Route::get('/about-us','Frontend\HomeController@aboutUs');
Route::get('cook-with-us','Frontend\HomeController@cookWithUs');
Route::get('faq','Frontend\HomeController@faq');
Route::get('/chef/{id}','Frontend\ChefController@chefDetails');
Route::get('/near-by-dishes','Frontend\HomeController@NearByDishes');
Route::get('/near-by-trending-cuisines','Frontend\HomeController@NearByCuisines');
Route::get('search','Frontend\HomeController@searchData');
Route::get('checkout','Frontend\CartController@checkout');
Route::POST('placeorder','Frontend\CartController@placeorder');
Route::POST('checkDistance','Frontend\CartController@checkDistance');
Route::POST('storeAreaInquiry','Frontend\HomeController@storeAreaInquiry');

/**
 * Find Nearest Dishes, trending items and chef Routes
 */
Route::POST('nearest-items','Frontend\NearestController@nearestItem');
Route::POST('nearest-chefs','Frontend\NearestController@nearestChef');
Route::POST('nearest-trending-item','Frontend\NearestController@nearestTrendingItem');
Route::POST('near-by-dishes','Frontend\NearestController@nearestItems');
Route::POST('near-by-cuisines','Frontend\NearestController@nearestCuisines');
Route::POST('nearest-chef-list','Frontend\NearestController@nearestChefList');
Route::POST('search','Frontend\NearestController@searchList');
Route::POST('search-filter','Frontend\NearestController@searchFilter');
Route::POST('get-adons','Frontend\NearestController@getAdons');
Route::POST('add-to-favrioute','Frontend\NearestController@addtofavrioute');
Route::POST('get-product-timing','Frontend\ChefController@getproducttiming');

});

/**
 * User Login Route
 */
/* check user is logged in not */
Route::get('/auth/check',function(){
    return (Auth::check()) ? 1 : 0;
});
/**/

Route::get('/login','Frontend\AuthController@login');
Route::POST('/login','Frontend\AuthController@doLogin');

Route::POST('/ajax-login','Frontend\AuthController@ajaxLogin');

Route::get('/register','Frontend\AuthController@register');
Route::POST('/register','Frontend\AuthController@doregister');
Route::POST('/ajax-register','Frontend\AuthController@ajaxregister');
Route::get('my-account','Frontend\UserController@index');

Route::get('/logout', 'Frontend\AuthController@logout');
Route::POST('/update-profile','Frontend\AuthController@updateprofile');
Route::POST('/addupdateaddress','Frontend\AuthController@addupdateaddress');
Route::POST('deleteSavedCard','Frontend\AuthController@deleteSavedCard');

/**
 * Admin User Routes
 */
Route::get('admin/login', function () {

    if (!Auth::check()) {
        return Redirect::to("admin/login");
    } else {
        return Redirect::to("admin");
    }
});

Route::get('admin', function () {

    if (!Auth::check()) {
        return Redirect::to("admin/login");
    } else {
        return Redirect::to("admin");
    }
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('/login', 'AuthController@login');
    Route::POST('/login', 'AuthController@doLogin');
    Route::get('/register', 'AuthController@register');
    Route::POST('/register', 'AuthController@doRegister');
    Route::get('/recover', 'AuthController@recover');
    Route::get('/lock', 'LockAccountController@index');
    Route::POST('/lock', 'LockAccountController@unlock');
    Route::get('/logout', 'AuthController@logout');

    Route::group(['middleware' => ['AdminAuth','Lock']], function () {
        Route::get('/', 'DashboardController@index');

        Route::group(['namespace' => 'User'], function () {
            Route::get('user-admin','UserController@index');
            Route::get('user-chef','UserController@ChefUsers');
            Route::get('user','UserController@Users');
            Route::get('user-driver','UserController@Driver');
            Route::get('user/create/{type}','UserController@create');
            Route::POST('user/store','UserController@store');
            Route::get('user/{id}','UserController@show');
            Route::get('user/{id}/edit','UserController@edit');
            Route::PUT('user/{id}/update','UserController@update');
            Route::get('user/{id}/destroy','UserController@destroy');
            Route::get('user/{id}/status','UserController@changeStatus');
        });

        //        Route::resource('role','RoleController');
        //        Route::get('role/{id}/destroy','RoleController@destroy');

//        Route::resource('category','Category\CategoryController');
//        Route::get('category/{id}/destroy','Category\CategoryController@destroy');
//        Route::get('category/{id}/status','Category\CategoryController@changeStatus');

        Route::resource('cuisine','Cuisine\CuisineController');
        Route::get('cuisine/{id}/destroy','Cuisine\CuisineController@destroy');
        Route::get('cuisine/{id}/status','Cuisine\CuisineController@changeStatus');

        Route::resource('area','Area\AreaController');
        Route::get('area/{id}/destroy','Area\AreaController@destroy');
        Route::get('area/{id}/status','Area\AreaController@changeStatus');

        Route::resource('promo','Promo\PromoController');
        Route::get('promo/{id}/destroy','Promo\PromoController@destroy');
        Route::get('promo/{id}/status','Promo\PromoController@changeStatus');

        Route::resource('item','Item\ItemController');
        Route::get('item/{id}/destroy','Item\ItemController@destroy');
        Route::get('item/{id}/status','Item\ItemController@changeStatus');
        Route::POST('item/get-category','Item\ItemController@GetCategoryData');

        /**
         * Item adons Routes
         */
        Route::get('item/{id}/adons','Item\ItemAdonsController@index');
        Route::get('item/{id}/adons/create','Item\ItemAdonsController@create');
        Route::POST('item/{id}/adons/store','Item\ItemAdonsController@store');
        Route::get('item/{item}/adons/{id}/edit','Item\ItemAdonsController@edit');
        Route::PUT('item/{item}/adons/{id}/update','Item\ItemAdonsController@update');
        Route::get('item/{item}/adons/{id}/destroy','Item\ItemAdonsController@destroy');

        Route::resource('order','Order\OrderController');
        Route::get('order/{id}/destroy','Order\OrderController@destroy');
        Route::post('order/status','Order\OrderController@changeStatus');

        Route::get('payment','Payment\PaymentController@index');
        Route::get('payment/{id}/edit','Payment\PaymentController@edit');
        Route::PUT('payment/{id}','Payment\PaymentController@update');
        Route::get('payment/{id}/destroy','Payment\PaymentController@destroy');

        Route::get('feedback','Feedback\FeedbackController@index');
        Route::get('feedback/{id}/destroy','Feedback\FeedbackController@destroy');


        Route::get('rating-review','Feedback\FeedbackController@Rating');
        Route::get('rating-review/{id}/destroy','Feedback\FeedbackController@RatingDestroy');

        Route::get('cms','Cms\CmsController@index');
        Route::get('cms/{id}/edit','Cms\CmsController@edit');
        Route::PUT('cms/{id}','Cms\CmsController@update');

    });
});

/**
 * Chef User Routes
 */
Route::group(['prefix' => 'chef-admin', 'namespace' => 'Chef'], function () {
    Route::get('/login', 'AuthController@login');
    Route::POST('/login', 'AuthController@doLogin');
    Route::get('/register', 'AuthController@register');
    Route::POST('/register', 'AuthController@doRegister');
    Route::get('/recover', 'AuthController@recover');
    Route::get('/lock', 'LockAccountController@index');
    Route::POST('/lock', 'LockAccountController@unlock');
    Route::get('/logout', 'AuthController@logout');

    Route::group(['middleware' => ['ChefAuth','Lock']], function () {

        Route::get('/', 'DashboardController@index');

        Route::get('user/{id}/edit','User\UserController@edit');
        Route::PUT('user/{id}/update','User\UserController@update');

//        Route::resource('category','Category\CategoryController');
//        Route::get('category/{id}/destroy','Category\CategoryController@destroy');
//        Route::get('category/{id}/status','Category\CategoryController@changeStatus');

        Route::resource('item','Item\ItemController');
        Route::get('item/{id}/destroy','Item\ItemController@destroy');
        Route::get('item/{id}/status','Item\ItemController@changeStatus');

        /**
         * Item adons Routes
         */
        Route::get('item/{id}/adons','Item\ItemAdonsController@index');
        Route::get('item/{id}/adons/create','Item\ItemAdonsController@create');
        Route::POST('item/{id}/adons/store','Item\ItemAdonsController@store');
        Route::get('item/{item}/adons/{id}/edit','Item\ItemAdonsController@edit');
        Route::PUT('item/{item}/adons/{id}/update','Item\ItemAdonsController@update');
        Route::get('item/{item}/adons/{id}/destroy','Item\ItemAdonsController@destroy');


        Route::resource('order','Order\OrderController');
        Route::get('order/{id}/destroy','Order\OrderController@destroy');
        Route::post('order/status','Order\OrderController@changeStatus');

        Route::get('payment','Payment\PaymentController@index');
        Route::get('payment/{id}/edit','Payment\PaymentController@edit');
        Route::PUT('payment/{id}','Payment\PaymentController@update');
        Route::get('payment/{id}/destroy','Payment\PaymentController@destroy');

    });
});
