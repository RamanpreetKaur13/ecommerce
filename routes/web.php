<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::match(['get', 'post'],'admin/login' ,[AdminController::class , 'login']);
// Route::match(['get', 'post'],'admin/dashboard' ,[AdminController::class , 'dashboard']);
require __DIR__.'/auth.php';


//Admin route group
Route::prefix('/admin')->namespace('App\Http\Controllers\Admin')->group(function(){
    Route::match(['get', 'post'],'login' ,'AdminController@login');
     Route::group(['middleware' =>['admin']] , function(){
        Route::get('dashboard' , 'AdminController@dashboard')->name('admin/dashboard');
        Route::match(['get' , 'post'] , 'update-admin-password' , 'AdminController@updateAdminPassword')->name('admin/update-admin-password');
        Route::match(['get' , 'post'] , 'update-admin-details' , 'AdminController@updateAdminDetails')->name('admin/update-admin-details');
        Route::post('/current-admin-password' , 'AdminController@currentAdminPassword');

        // update vendor details
        Route::match(['get' , 'post'] , 'update-details/{slug}' , 'AdminController@updateVendorDetails');

        //view admins , subadmins and vendors 
        Route::get('admins/{type?}' , 'AdminController@viewAdmins' );
        Route::get('/view-vendor-details/{id}' , 'AdminController@viewVendorDetails' );

        Route::post('update-admin-status' , 'AdminController@updateAdminStatus');


        Route::get('logout' , 'AdminController@logout')->name('admin/logout');
   });
  
});
