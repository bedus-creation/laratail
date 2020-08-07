<?php

namespace App\Application\Admin\Controllers;

use Aammui\LaravelTaggable\Models\Category;
use App\Application\Admin\Requests\ArticleStoreRequest;
use App\Domain\CMS\Models\Article;
use Illuminate\Http\Request;
use Aammui\LaravelTaggable\Models\Tag;
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
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.articles.create', compact('categories', 'tags'));
    }

    public function store(ArticleStoreRequest $articleStoreRequest)
    {
        $article = $this->repository->create($articleStoreRequest->all());
        $article->addCategory($articleStoreRequest->categories);
        $article->addTag($articleStoreRequest->tags);
        if ($articleStoreRequest->image) {
            $article->toCollection('cover')
                ->toDisk('public')
                ->addMedia(request()->image);
        }
        return redirect()->back()->with('success', 'Article has been created.');
    }
    public function show(Article $article)
    {
        return view('admin.articles.show', compact('article'));
    }

    public function edit(Request $request, $id)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $data = $this->repository->with(['media', 'tag', 'category'])->findOrFail($id);
        return view('admin.articles.edit', compact('data', 'categories', 'tags'));
    }

    public function update(Request $request, $id)
    {
        $article = $this->repository->findOrFail($id);
        $article->update($request->all());
        $article->addCategory($request->categories);
        $article->addTag($request->tags);
        if ($request->image) {
            optional($article->fromCollection('cover')->getMedia()->first())->delete();
            $article->toCollection('cover')
                ->toDisk('public')
                ->addMedia(request()->image);
        }
        return redirect()->back()->with('success', 'Article has been Updated.');
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
