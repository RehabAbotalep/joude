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

Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
});

Route::get('/admin/login','Front\Admin\AdminController@showLoginForm')->name('login.form');

Route::post('/admin/login','Front\Admin\AdminController@login')->name('admin.login');

Route::get('/admin/logout','Front\Admin\AdminController@adminLogout')->name('admin.logout');

Route::get( '/get/regions', 'Front\Admin\BranchController@regions' )->name( 'loadRegions' );

Route::group(['middleware' => 'isAdmin','namespace' =>'Front\Admin'], function () {

    Route::get('dashboard', 'AdminController@adminDashboard')->name('dashboard');
    Route::resource('category','CategoryController');
    Route::resource('store','StoreController');
    Route::get('voucher','VoucherController@create')->name('voucher');
    Route::post('voucher','VoucherController@store')->name('voucher.add');
    Route::get('voucher/{store_id}','VoucherController@getVoucher')->name('voucher.get');
    Route::delete('voucher/delete/{id}','VoucherController@delete')->name('voucher.destroy');
    Route::resource('city','CityController');
    Route::resource('region','RegionController');
    Route::resource('user','UserController');
    Route::get('user/{id}/active','UserController@active')->name('user.active');
    Route::get('user/{id}/deactive','UserController@deactive')->name('user.deactive');
    Route::resource('card','CardController');
    Route::get('card/{id}/active','CardController@active')->name('card.active');
    Route::get('card/{id}/deactive','CardController@deactive')->name('card.deactive');
    Route::resource('type','TypeController');
    Route::get('aboutUs','PagesController@aboutUs')->name('aboutUs');
    Route::post('aboutUs/update','PagesController@updateAbout')->name('aboutus.update');
    Route::get('terms','PagesController@terms')->name('terms');
    Route::post('terms/update','PagesController@updateTerms')->name('terms.update');
    Route::get('setting','PagesController@setting')->name('setting');
    Route::post('setting/update','PagesController@updateSetting')->name('setting.update');
    Route::resource('faq','FaqController');
    Route::get('contactUs','ContactUsController@getContact')->name('contact');
    Route::DELETE('contact/destroy/{id}','ContactUsController@destroy')->name('contact.destroy');
    Route::get('branch','BranchController@viewBranch')->name('branch.view');
    Route::get( '/get/cities', 'BranchController@cities' )->name( 'loadCities' );
    Route::post( 'branch/add', 'BranchController@addBranch' )->name('branch.add');
    Route::get( 'store/{id}/branches', 'BranchController@getBranches' )->name('store.branches');
    Route::get( 'branch/{id}/edit', 'BranchController@edit' )->name('branch.edit');
    Route::put( 'branch/{id}/update', 'BranchController@update' )->name('branch.update');
    Route::DELETE( 'branch/destroy/{id}', 'BranchController@destroy' )->name('branch.destroy');
});

///////////////////////////////User Routes/////////////////////////////////
Route::group(['namespace' =>'Front\User'], function () {

    Route::get('register', 'UserController@getRegister')->name('user.register');

    Route::post('register', 'UserController@postRegister')->name('register.post');

    Route::get('login', 'UserController@getLogin')->name('user.login');

    Route::post('login', 'UserController@postLogin')->name('login.post');

    Route::get('logout', 'UserController@logout')->name('user.logout');

    Route::get('myAccount', 'UserController@getAccount')->name('user.account');

    ////////////////////////////////////Update User Account/////////////////////
    Route::get('update/user', 'UserController@getUpdate')->name('update.get');

    Route::post('update/user', 'UserController@postUpdate')->name('update.post');

    Route::get('mobile/update/view', 'UserController@codeView')->name('mobile.update.view');

    Route::post('mobile/update', 'UserController@updateMobile')->name('mobile.update');
    ////////////////////////////////////Forget Password/////////////////////
    Route::post('forgetPassword', 'ProfileController@forgetPassword')->name('forget.pass');

    Route::get('code/view', 'ProfileController@codeView')->name('code.view');

    Route::post('code/verify', 'ProfileController@verifyCode')->name('code.verify');

    Route::get('submit/NewPassword', 'ProfileController@submitNewPasswordView')->name('pass.new.view');

    Route::post('submit/NewPassword', 'ProfileController@submitNewPassword')->name('pass.new');
    ////////////////////////////////////Card Requests/////////////////////
    Route::get('user/card/order','CardController@orderCardView')->name('orderCard.view');

    Route::post('user/card/order','CardController@orderCard')->name('orderCard.post');

    Route::post('user/card/activate','CardController@activeCard')->name('card.activate');

    Route::get('activate/card','CardController@activateCardView')->name('activate.card.view');

    Route::post('activate/card/confirm','CardController@activeConfirm')->name('activate.card.confirm');

    Route::get('dactivate/card','CardController@dactivateCardView')->name('dactivate.card.view');

    Route::post('user/card/deactivate','CardController@dectiveCard')->name('card.deactivate');

    Route::post('deactivate/card/confirm','CardController@deactiveConfirm')->name('deactivate.card.confirm');

    Route::get('my/cards','CardController@myCards')->name('my.cards');
    
    ////////////////////////////////////Pages/////////////////////
    Route::get('faqs', 'PagesController@faqs')->name('faqs.index');

    Route::get('terms-condition', 'PagesController@termsCondition')->name('terms.condition');

    Route::get('about-us', 'PagesController@aboutUs')->name('about.us');

    Route::get('contact-us','PagesController@contactUsView')->name('contact.get');

    Route::post('contact-us','PagesController@contactUs')->name('contact.post');

    Route::get('/', 'HomeController@index')->name('home');

    ////////////////////////////////////Stores/////////////////////
    Route::get('vouchers', 'StoreController@vouchers')->name('vouchers');

    Route::get('categories/vouchers', 'StoreController@categoryVouchers')->name('category.vouchers');

    Route::get('outlets', 'HomeController@outletsIndex')->name('outlets.index');

    Route::get('categories/{id}/outlets', 'HomeController@categoryStore')->name('category.store');

    Route::get('store/{id}/details', 'StoreController@storeDetails')->name('store.details');




});