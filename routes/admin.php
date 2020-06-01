<?php

use App\Application\Admin\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['role:admin']], function () {
    Route::resource('articles', ArticleController::class);
});
