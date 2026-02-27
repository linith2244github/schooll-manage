<?php

use App\Http\Controllers\Admin\AdminAuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function () {
    //Admin Auth
    Route::get('/', [AdminAuthController::class, 'loginShow'])->name('login.show');
    Route::post('/login', [AdminAuthController::class, 'loginProcess'])->name('login.process');
    Route::get('/send', [AdminAuthController::class, 'sendEmail'])->name('send.email.show');
    Route::post('/send/process', [AdminAuthController::class, 'sendEmailProcess'])->name('send.email.process');
    Route::post('/code/verify', [AdminAuthController::class, 'showCodeVerify'])->name('code.verify.show');
    Route::post('/reset/password', [AdminAuthController::class, 'showResetPassword'])->name('reset.password.show');
    
});