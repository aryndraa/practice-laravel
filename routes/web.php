<?php

use App\Http\Controllers\Web\AdditionalController;
use App\Http\Controllers\Web\MenuController;
use App\Http\Controllers\Web\VariantController;
use Illuminate\Support\Facades\Route;

Route::controller(MenuController::class)
    ->prefix('menu')
    ->name('menu.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{id}', 'show')->name('show');
        Route::post('', 'store')->name('store');
        Route::patch('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');
});

Route::controller(AdditionalController::class)
    ->prefix('additional')
    ->name('additional.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{id}', 'show')->name('show');
        Route::post('', 'store')->name('store');
        Route::patch('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');

    });

Route::controller(VariantController::class)
    ->prefix('variant')
    ->name('variant.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{id}', 'show')->name('show');
        Route::post('', 'store')->name('store');
        Route::patch('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });
