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

    public function index()
    {
        $articles = $this->repository->all();
        return view('admin.articles.index', compact('articles'));
    }

    public function create(Request $request)
    {
        return view('admin.articles.create');
    }

    public function store(ArticleStoreRequest $articleStoreRequest)
    {
        $article = $this->repository->create($articleStoreRequest->all());
        $article->toCollection('cover')
            ->toDisk('public')
            ->addMedia(request()->image);
        return redirect()->back()->with('success', 'Article has been created.');
    }

    /**
     * Delete article resource
     *
     * @param Request $request
     * @param int $id
     * @return void
     */
    public function destroy(Request $request, $id)
    {
        $article = $this->repository->findOrFail($id);
        $article->delete();
        return redirect()->back()->with('success', 'Article has been deleted.');
    }
}
