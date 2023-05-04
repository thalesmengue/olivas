<?php

use App\Http\Livewire\ClientsCreate;
use App\Http\Livewire\ClientsEdit;
use App\Http\Livewire\ClientsIndex;
use App\Http\Livewire\ClientsShow;
use App\Http\Livewire\ClientsUpdate;
use App\Http\Livewire\UserLogin;
use App\Http\Livewire\UserRegister;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', UserRegister::class)->name('user.register');
    Route::get('/', UserLogin::class)->name('user.login');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/clients', ClientsIndex::class)->name('clients.index');
    Route::get('/clients/create', ClientsCreate::class)->name('clients.create');
    Route::get('/clients/edit/{id}', ClientsUpdate::class)->name('clients.update');
    Route::get('/clients/{id}', ClientsShow::class)->name('clients.show');
});
