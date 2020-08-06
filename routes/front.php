<?php

use Illuminate\Support\Facades\Route;
use App\Application\Front\Controllers\SitemapController;

Route::get('/sitemap.xml', [SitemapController::class, 'index']);
Route::get('/article-sitemap.xml', [SitemapController::class, 'article']);

Route::get('/', function () {
    return view('home');
});
