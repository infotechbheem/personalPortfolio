<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ManagingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::post('/send-Message', [ContactController::class, 'sendMessage'])->name('send.Massage');
