<?php

use App\Application\Admin\Controllers\ArticleController;
use App\Application\Admin\Controllers\CategoriesController;
use App\Application\Admin\Controllers\DashboardController;
use App\Application\Admin\Controllers\TagsController;
use App\Domain\User\Enums\Role;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'middleware' => ['role:' . Role::ADMIN . '|' . Role::SYSTEM_ADMIN]], function () {
    Route::resource('/', DashboardController::class);
    Route::resource('articles', ArticleController::class);
    Route::resource('categories', CategoriesController::class);
    Route::resource('tags', TagsController::class);
});
