<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserGroupsController;
use App\Http\Controllers\UserPaymentsController;
use App\Http\Controllers\UserPurchaseController;
use App\Http\Controllers\UserRecieptsController;
use App\Http\Controllers\UserSalesController;
use App\Http\Controllers\UsersController;
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

Route::get('/login', [LoginController::class, 'login'])->name('login');

Route::post('/login', [LoginController::class, 'authenticate'])->name('login.confirm');

Route::group(['middleware' => 'auth'], function () {

    Route::view('/', ('home'));

    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('groups', [UserGroupsController::class, 'index'])->name('groups');
    Route::get('groups/create', [UserGroupsController::class, 'create']);
    Route::post('groups', [UserGroupsController::class, 'store']);
    Route::delete('groups/{id}', [UserGroupsController::class, 'destroy']);

    Route::resource('/users', UsersController::class);
    Route::get('users/{id}/sales', [UserSalesController::class, 'index'])->name('user.sales');

    Route::post('users/{id}/invoices', [UserSalesController::class, 'createInvoice'])->name('user.sales.store');
    Route::get('users/{id}/invoice/{invoices_id}', [UserSalesController::class, 'invoice'])->name('user.sales.invoice_details');
    Route::delete('users/{id}/invoice/{invoice_id}', [UserSalesController::class, 'destroy'])->name('user.sales.destroy');

    Route::post('users/{id}/invoice/{invoice_id}', [UserSalesController::class, 'addItem'])->name('user.sales.invoices.add_item');
    Route::delete('users/{id}/invoice/{invoice_id}/{item_id}', [UserSalesController::class, 'destroyItem'])->name('user.sales.invoices.delete_item');

    Route::get('users/{id}/purchase', [UserPurchaseController::class, 'index'])->name('user.purchase');

    Route::get('users/{id}/payments', [UserPaymentsController::class, 'index'])->name('user.payments');
    Route::post('users/{id}/payments', [UserPaymentsController::class, 'store'])->name('user.payments.store');
    Route::delete('users/{id}/payments/{payment_id}', [UserPaymentsController::class, 'destroy'])->name('user.payments.destroy');

    Route::get('users/{id}/receipts', [UserRecieptsController::class, 'index'])->name('user.receipt');
    Route::post('users/{id}/receipts/{invoice_id?}', [UserRecieptsController::class, 'store'])->name('user.receipt.store');
    Route::delete('users/{id}/receipts/{receipt_id}', [UserRecieptsController::class, 'destroy'])->name('user.receipt.destroy');

    Route::resource('/products', ProductsController::class);

    Route::resource('/categories', CategoriesController::class, ['except' => ['show']]);

});
