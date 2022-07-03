<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\packageController;
use App\Models\packeges;
use Illuminate\Support\Facades\Auth;

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
    $packages = packeges::all();
    return view('index', compact('packages'));
});

// Pages Routes

Route::prefix('plans-pricing')->group(function () {
    // pages Packages
    Route::get('/', [packageController::class, 'index']);
    Route::get('package/{id}', [packageController::class, 'show'])->name('package.id');
    Route::post('package/store', [packageController::class, 'store'])->name('package.store');
});

Route::prefix('Page')->group(function () {
    // Page question
    Route::get('/questions', function(){
        return view('Pages.question');
    })->name('Pages.question');
    // Page about
    Route::get('/about', function(){
        return view('Pages.about');
    })->name('Pages.about');
    // Page Terms & Policy
    Route::get('/Terms', function(){
        return view('Pages.Terms');
    })->name('Pages.Terms');
});


Auth::routes();

// user Routes
Route::prefix('user')->middleware('auth')->group(function(){
    Route::get('/home', [HomeController::class, 'Home'])->name('home');

    Route::get('/calcEarn', [HomeController::class, 'calcEarn'])->name('calcEarn');

    Route::get('/packeges', [HomeController::class, 'package'])->name('user.packeges');

    Route::get('changePackage/{id}', [HomeController::class, 'changePackage'])->name('package.changePackage');

    Route::post('storePackage', [HomeController::class, 'storePackage'])->name('package.storePackage');

    Route::get('/profile', [HomeController::class, 'profile'])->name('user.profile');

    Route::post('/profile/update', [HomeController::class, 'Updateprofile'])->name('user.Updateprofile');

    Route::get('/profile/payment', [HomeController::class, 'payment'])->name('user.payment');

    Route::get('/profile/withdraw', [HomeController::class, 'withdraw'])->name('user.withdraw');

    Route::post('/profile/withdraw/store', [HomeController::class, 'sendwithdraw'])->name('user.request');

    Route::get('/profile/Refrael', [HomeController::class, 'Refreal'])->name('user.Refreal');

});

// admin Routes
Route::prefix('admin')->middleware('auth', 'is_admin')->group(function(){
    Route::get('/home', [AdminController::class,'index'])->name('admin.home');
    Route::get('/packeges', [AdminController::class,'create'])->name('admin.packeges');
    Route::post('/packeges/store', [AdminController::class,'store'])->name('admin.add');

    Route::get('/invoices', [AdminController::class,'invoices'])->name('admin.invoices');
    Route::post('/invoices/update/payed/{id}', [AdminController::class,'payed'])->name('admin.payed');
    Route::get('/invoices/update/finished/{id}', [AdminController::class,'finished'])->name('admin.finished');
    Route::get('/invoices/update/ban/{id}', [AdminController::class,'ban'])->name('admin.ban');
    Route::get('/invoices/delete/{id}', [AdminController::class,'destory'])->name('admin.delete');

    Route::get('/profile', [AdminController::class,'profile'])->name('admin.profile');
    Route::post('/profile/update', [AdminController::class,'Updateprofile'])->name('admin.Updateprofile');

    Route::get('/profile/withdraw', [AdminController::class, 'withdraw'])->name('admin.withdraw');
    Route::get('/profile/withdraw/Accepted/{id}', [AdminController::class, 'Acceptdwithdraw'])->name('admin.withdraw.accepted');
    Route::get('/profile/withdraw/rejeted/{id}', [AdminController::class, 'rejeteddwithdraw'])->name('admin.withdraw.rejeted');
    Route::get('/profile/withdraw/payed/{id}', [AdminController::class, 'confirmdwithdraw'])->name('admin.withdraw.payed');

    Route::get('Subscribers', [AccountController::class, 'subgroup'])->name('admin.subgroup');
    Route::get('Subscriber/{id}', [AccountController::class, 'usersshow'])->name('admin.usersshow');
    Route::post('Subscriber/update/{id}', [AccountController::class, 'updateaccounts'])->name('admin.updateaccounts');

    Route::get('All/Refrael/', [AdminController::class, 'getRefrals'])->name('admin.getRefrals');
    Route::get('Refrael/target/{id}', [AdminController::class, 'showReferals'])->name('admin.showReferals');
    Route::post('Refrael/{id}', [AdminController::class, 'storeRefrals'])->name('admin.storeRefrals');

});
