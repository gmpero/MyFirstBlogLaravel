<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main\IndexController;

use App\Http\Controllers\Admin\Main\IndexController as IndexControllerAlias;


Route::group(['App\Http\Controllers\Main'], function () {
    Route::get('/', IndexController::class);
});

Route::group(['namespace' => 'App\Http\Controllers\Admin\Main', 'prefix' => 'admin'], function () {

    Route::get('/', IndexControllerAlias::class);

});

Auth::routes();
