<?php

use App\Application\Admin\Controllers\ArticleController;
use App\Application\Admin\Controllers\DashboardController;
use App\Domain\User\Enums\Role;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'middleware' => ['role:' . Role::ADMIN . '|' . Role::SYSTEM_ADMIN]], function () {
    Route::resource('/', DashboardController::class);
    Route::resource('articles', ArticleController::class);
});
