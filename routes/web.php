<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('home');
});

Route::get('/ItemRift/home', function () {
    return view('home');
});

Route::get('/ItemRift/browse', function () {
    return view('browse');
});

Route::get('/ItemRift/help', function () {
    return view('help');
});

Route::get('/ItemRift/sell', function () {
    return view('sell');
});

Route::get('/ItemRift/forum', function () {
    return view('forum');
});

Route::get('/ItemRift/messages', function () {
    return view('messages');
});

Route::get('/ItemRift/profile', function () {
    return view('profile');
});

Route::get('/ItemRift/login', function () {
    return view('login');
});

Route::get('/ItemRift/register', [RegisterController::class, 'show'])->name('register.show');
// Route::post('/ItemRift/register', [RegisterController::class, 'register'])->name('register.submit');

Route::get('/ItemRift/item/{id}', function ($id) {
    $item = \App\Models\Item::with('user')->findOrFail($id);
    return view('item-details', ['item' => $item]);
});

