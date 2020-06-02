<?php

namespace App\Application\Front\Controllers;

use App\Domain\CMS\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SitemapController extends Controller
{
    public function index()
    {
        $article = Article::latest()->first();

        $content =  view('front.sitemap.index', compact('article'));

        return response($content, 200)
            ->header('content-Type', 'text/xml');
    }

    public function article()
    {
        $articles = Article::where('status', 'Published')->get();

        $content =  view('front.sitemap.article', compact('articles'));
        return response($content, 200)
            ->header('content-Type', 'text/xml');
    }
}
