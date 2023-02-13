<?php

use App\Http\Controllers\Wmt_Login_Controller;
use App\Http\Controllers\Wmt_Report_Penjualan_Controller;
use App\Http\Controllers\Wmt_Transactions_Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [Wmt_Login_Controller::class, 'index'])->middleware('guest');
Route::post('login', [Wmt_Login_Controller::class, 'authenticate'])->name('login');
Route::get('logout', function(){
    Auth::logout();
    return redirect()->to('login');
})->name('logout');

Route::middleware('auth')->group(function(){
    Route::get('report_penjualan', [Wmt_Report_Penjualan_Controller::class, 'index']);
    Route::post('transactions/submitcheckout', [Wmt_Transactions_Controller::class, 'submitcheckout']);
    Route::post('transactions/checkoutdetail', [Wmt_Transactions_Controller::class, 'checkoutdetail']);
    Route::post('transactions/addTransactions', [Wmt_Transactions_Controller::class, 'addTransactions']);
    Route::get('transactions/showProductDetail', [Wmt_Transactions_Controller::class, 'showProductDetail']);
    Route::resource('transactions', Wmt_Transactions_Controller::class);
});

// Auth::routes();
// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
