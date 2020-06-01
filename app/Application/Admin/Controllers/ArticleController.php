<?php

namespace App\Application\Admin\Controllers;

use App\Application\Admin\Requests\ArticleStoreRequest;
use App\Domain\CMS\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    protected $repository;

    public function __construct(Article $article)
    {
        $this->repository = $article;
    }

    public function store(ArticleStoreRequest $articleStoreRequest)
    {
        $this->repository->create($articleStoreRequest->all());
        return redirect()->back()->with('success', 'Article has been created.');
    }
}
