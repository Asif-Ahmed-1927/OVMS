<?php

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


//for all user


Route::get('/', 'HomeController@index')->name('home');

Route::get('login', 'LoginController@index')->name('login');
Route::get('login/otp', 'LoginController@indexForOtp')->name('otplogin');
Route::post('login/otp', 'LoginController@sendOTP');
Route::post('login/verifyOTP', 'LoginController@verifyOTP');

Route::post('login', 'LoginController@login')->name('login');


Route::get('registration', 'RegistrationController@index')->name('registration');

Route::post('registration', 'RegistrationController@store')->name('registration');

Route::get('User-Review-list', 'HomeController@reviewIndex')->name('allreview');

Route::get('logout', 'LogoutController@index')->name('logout');

//

Route::middleware(['session'])->group(function () {

    Route::middleware(['admin'])->group(function () {
        //userlist 

        Route::get('admin/userlist', 'AdminController@view')->name('admin.userlistview');


        Route::get('admin/edit/{id}', 'AdminController@edit')->name('admin.edit');
        Route::post('admin/edit/update/{id}', 'AdminController@update')->name('admin.update');
        Route::post('admin/delete/{id}', 'AdminController@delete')->name('admin.delete');

        //worklist 

        Route::get('admin/worklist', 'AdminController@worklistview')->name('admin.worklistview');
        Route::post('admin/worklist/delete/{id}', 'AdminController@workdelete')->name('admin.workdelete');

        //reviewlist 
        Route::get('admin/reviewlist', 'AdminController@reviewlistview')->name('admin.reviewlistview');
        Route::post('admin/reviewlist/delete/{id}', 'AdminController@reviewdelete')->name('admin.reviewdelete');

        //paymentlist
        Route::get('admin/paymentlist', 'AdminController@paymentlistview')->name('admin.paymentlistview');
        Route::post('admin/paymentlist/delete/{id}', 'AdminController@paymentdelete')->name('admin.paymentdelete');

        //live search

        //

    });

    Route::middleware(['isWorkOngoing'])->group(function () {

        Route::get('dashboard', 'DashboardController@index')->name('dashboard');
        Route::get('search', 'SearchController@index')->name('search')->middleware('user');


        //Work Request routes

    });


    Route::post('update/image', 'RegistrationController@updateImage')->name('update_image');

    Route::post('change/password', 'UserController@changePassword')->name('change.password');

    Route::get('user/edit', 'UserController@editView')->name('user.edit');
    Route::post('user/edit', 'UserController@update');




    Route::post('volunteer/info/view/update', 'VolunteerController@update')->name('volunteer.update');

    Route::get('volunteer/info/view', 'VolunteerController@view')->name('volunteer.view');



    Route::post('work/request/{id}', 'WorkRequestController@requestWork')->name('work.request');
    Route::post('work/fetchRequest/{v_id}', 'WorkRequestController@fetchWork')->name('work.fetch');

    Route::get('work/isExist/{id}', 'WorkRequestController@isExist')->name('work.isExist');
    Route::get('work/remove/{id}', 'WorkRequestController@removeRequest')->name('work.remove');

    Route::get('work/accept/{id}', 'WorkRequestController@acceptReqeust')->name('work.accept');
    Route::get('work/ongoing/{id}', 'WorkRequestController@ongoingView')->name('work.ongoing');

    Route::get('work/chat/fetch/{workId}/{updatedAt}', 'WorkRequestController@chatFetch')->name('work.chat.fetch');

    Route::post('work/chat/post/{workId}', 'WorkRequestController@chatSend')->name('work.chat.post');

    //work list
    Route::get('worklist/', 'WorkRequestController@worklistview')->name('worklist');

    //payment status
    Route::get('work/paymentlist', 'PaymentController@paymentstatus')->name('paymentstatus');

    //volunteer see review
    Route::get('work/reviewlist', 'ReviewController@userreview')->name('reviewlistuser');

    //volunteer see worklistview
    Route::get('volunteer/worklist/', 'WorkRequestController@volunteerwork')->name('worklistvolunteer');


    //--------------
    Route::get('work/payment/{id}', 'PaymentController@showPayment')->name('payment.payment')->middleware('user');
    Route::post('work/payment/{id}', 'PaymentController@paymentStore')->name('payment.store')->middleware('user');

    Route::get('work/review', 'ReviewController@review')->name('review')->middleware('user');
    Route::post('work/review', 'ReviewController@reviewStore')->name('review.store')->middleware('user');

    //--------------
    Route::post('work/finish', 'WorkRequestController@workFinish')->name('work.finish');
});//session middleware close