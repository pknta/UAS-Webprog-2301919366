<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

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

Route::group(['middleware' => ['auth', 'sudahlogin'], 'prefix' => 'all'], function () {
	Route::get('/home', [PageController::class, 'user_home'])->name('home');
	Route::get('/ebook/{ebook_id}', [PageController::class, 'user_ebook'])->name('ebook');
	Route::post('/ebook/{ebook_id}', [PageController::class, 'user_ebook_add'])->name('ebook_addcart');
	Route::get('/cart', [PageController::class, 'user_view_cart'])->name('cart');
	Route::post('/cart', [PageController::class, 'user_cart_checkout'])->name('cart._checkout');
	Route::delete('/cart/{ebook_id}', [PageController::class, 'user_cart_delete'])->name('cart_delete');
	Route::get('/profile', [PageController::class, 'user_profile_page'])->name('profile');
	Route::post('/profile', [PageController::class, 'user_profile_update'])->name('profile_update');
	Route::get('/success', [PageController::class, 'user_success'])->name('success');
});

Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'adminonly'], function () {
	Route::get('/acc_maintenance', [PageController::class, 'admin_acc_maintenance'])->name('acc_maintenance');
	Route::get('/role_update/{account_id}', [PageController::class, 'admin_update_role'])->name('role_update');
	Route::post('/role_update/{account_id}', [PageController::class, 'admin_update_role_request'])->name('role_update.request');
	Route::post('/delete_account/{account_id}', [PageController::class, 'admin_delete_account'])->name('delete_account');
});

Route::get('/register', [PageController::class, 'register_page'])->name('register');
Route::post('/register', [PageController::class, 'register'])->name('register_request');
Route::get('/login', [PageController::class, 'login_page'])->name('login');
Route::post('/login', [PageController::class, 'login'])->name('login_request');
Route::get('/logout', [PageController::class, 'logout'])->name('logout');

Route::get('/setlocale', function () {
	$locale = Config::get('app.locale');
	if ($locale == 'id'){
    	app()->setLocale('en');
    		session()->put('locale', 'en');
	}
    else{
    	app()->setLocale('id');
    	session()->put('locale', 'id');
    }
    return redirect()->back();
})->name('locale.toggle');

Route::get('/', function () {
    return view('index');
})->name('index');