<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\playlistController;

Route::get('/', function () {
    return view('home');
});
Route::get('/home', function () {
    return view('home');
});
Route::get('/admin', function () {
    return view('admin');
});

Route::get('/login', function () {
    return view('login');
});
Route::get('/register', function () {
    return view('register');
});

Route::get('/admin.playlists', [playlistController::class, 'showPlaylists'])->name('playlist.list');
Route::get('/admin.addPlaylist', [playlistController::class, 'addPlaylistShow'])->name('playlist.add');
Route::get('/admin.viewPlaylist/{playlistName}', [playlistController::class, 'playlistView'])->name('playlist.view');

Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login.register', [LoginController::class, 'register'])->name('register');
Route::post('/admin.add', [playlistController::class, 'addPlaylist'])->name('playlist.addPlaylist');
