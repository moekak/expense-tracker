<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FinancialTransactionController;
use App\Http\Controllers\APIController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MyWallet;


// ログインユーザーのみアクセス可能
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, "index"])->name("dashboard");
    Route::get('/transaction/create', [FinancialTransactionController::class, "create"])->name("transaction.create");
    Route::post("/transaction/create", [FinancialTransactionController::class, "store"])->name("transaction.store");
    // my walletページ
    Route::get("/wallet", [MyWallet::class, "index"])->name("wallet");
    // API
    Route::post('/data', [APIController::class, 'getTotalAmountbySelectedDate']);

});

// 未ログインユーザーのみがアクセス可能
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
    Route::get('/signup', [UserController::class, 'showSignupForm'])->name('signup');
    Route::post('/signup', [UserController::class, 'store'])->name('user.create');
    Route::post('/login', [UserController::class, 'login'])->name('user.login');
    Route::get('/line', [UserController::class, 'redirectToLine'])->name("line.login");
    Route::get('/line/callback', [UserController::class, 'handleLineCallback']);

});




