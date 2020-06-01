<?php

use App\Application\Admin\Controllers\ArticleController;
use App\Domain\User\Enums\Role;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'middleware' => ['role:' . Role::ADMIN]], function () {
    Route::resource('articles', ArticleController::class);
});
