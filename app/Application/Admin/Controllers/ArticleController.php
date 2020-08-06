<?php

namespace App\Application\Admin\Controllers;

use Aammui\LaravelTaggable\Models\Category;
use App\Application\Admin\Requests\ArticleStoreRequest;
use App\Domain\CMS\Models\Article;
use Illuminate\Http\Request;
use Aammui\LaravelTaggable\Models\Tag;
use App\Http\Controllers\Controller;
use GitDown;

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
        $description = GitDown::parseAndCache($articleStoreRequest->description);
        // dd($description);
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
        $article->description = GitDown::parseAndCache($article->description);
        // dd($description);
        // dd($article);
        return view('admin.articles.show', compact('article'));
    }

    public function edit(Request $request, $id)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $data = $this->repository->with(['media', 'tag', 'category'])->findOrFail($id);
        // dd($data);
        return view('admin.articles.edit', compact('data', 'categories', 'tags'));
    }

    public function update(Request $request, $id)
    {

        $model = $this->repository->findOrFail($id);
        $model->update($request->all());
        $model->addCategory($request->categories);
        $model->addTag($request->tags);
        if ($request->image) {
            optional($model->fromCollection('cover')->getMedia()->first())->delete();
            $model->toCollection('cover')
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
