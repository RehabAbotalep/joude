<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


/////////////////////User Routes///////////////////
Route::post('user/register','Api\UserController@register');

//Route::post('user/verify','Api\UserController@verify');

Route::post('user/login','Api\UserController@login');

Route::post('user/logout','Api\UserController@logout')->middleware('auth:api');

Route::post('user/forgetPassword','Api\UserController@forgetPassword');

Route::post('user/submitNewPassword','Api\UserController@submitNewPassword');

Route::post('user/resendCode','Api\UserController@resendCode');

Route::get('user/profile','Api\UserController@getProfile')->middleware('auth:api');

Route::post('user/image/upload','Api\UserController@imageUpload')->middleware('auth:api');

Route::get('user/cards', 'Api\CardController@myCards');

Route::put('update/profile','Api\ProfileController@updateProfile');
Route::put('update/profile/password','Api\ProfileController@updatePassword');

Route::post('update/mobile','Api\ProfileController@updateMobile');


/////////////////////Card Routes///////////////////

Route::get('card/types','Api\CardController@cardTypes');

Route::post('card/order','Api\CardController@orderCard');

Route::post('card/active','Api\CardController@activeCard');

Route::post('card/active/confirm','Api\CardController@activeConfirm');

Route::post('card/deactive','Api\CardController@dectiveCard');

Route::post('card/deactive/confirm','Api\CardController@deactiveConfirm');

/////////////////////Mobile Pages///////////////////
Route::get('faqs', 'Api\PagesController@faqs');

Route::get('settings', 'Api\PagesController@settings');

Route::get('about-us', 'Api\PagesController@about');

Route::get('terms/conditions', 'Api\PagesController@termsConditions');

Route::post('contact-us', 'Api\PagesController@contactUs');

/////////////////////Stores///////////////////
Route::get('stores', 'Api\StoreController@getAllStores');

Route::get('categories', 'Api\StoreController@getAllCategories');

Route::get('category/{category_id}/vouchers' ,'Api\StoreController@vouchers');

Route::get('cities/regions', 'Api\CityController@citiesRegions');

Route::get('cities', 'Api\CityController@getCities');

Route::get('city/{city_id}/regions', 'Api\CityController@getRegions');

Route::get('category/stores', 'Api\StoreController@getCategoryStores');

Route::get('category/vouchers', 'Api\StoreController@getCategoryVouchers');

Route::get('store/{id}/branches', 'Api\StoreController@storesBranches');

Route::get('store/branches', 'Api\StoreController@branches');


