<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatGptController;
use App\Http\Controllers\ChatbotController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/chat', [ChatGptController::class, 'index'])->name('chat_gpt-index');
Route::post('/chat', [ChatGptController::class, 'chat'])->name('chat_gpt-chat');