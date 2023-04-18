<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\TransactionController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//go to the payment page
Route::get('go-payment/{status?}',[PayPalController::class, 'goPayment'])->name('payment.go');
Route::get('payment',[PayPalController::class,'payment'])->name('payment');
// cancelaion payment
Route::get('cancel',[PayPalController::class,'cancel'])->name('payment.cancel');

Route::get('payment/success',[PayPalController::class,'success'])->name('payment.success');
Route::get('showPaymentTransaction',[TransactionController::class, 'index'])->name('showPaymentTransaction');
Route::get('/transactionsData', [TransactionController::class, 'transactions'])->name('transactions.index');
Route::get('/transactions', function () {
    return view('transactions.index');
})->name('return.transactions');

// web.php

use Illuminate\Support\Facades\DB;

Route::get('/autocomplete',[TextController::class, 'autocomplete'] )->name('autocomplete');

// web.php


Route::post('/save-text', [TextController::class, 'saveText'])->name('save-text');

////////////////////////


// Route::get('/', function () {
//     return view('welcome');
// });
//go to the payment page
// Route::get('go-payment/{status?}',[PayPalController::class, 'goPayment'])->name('payment.go');
// Route::get('payment',[PayPalController::class,'payment'])->name('payment');
// cancelaion payment
// Route::get('cancel',[PayPalController::class,'cancel'])->name('payment.cancel');

// Route::get('payment/success',[PayPalController::class,'success'])->name('payment.success');
//
