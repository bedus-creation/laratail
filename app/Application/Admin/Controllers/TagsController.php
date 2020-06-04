<?php

namespace App\Application\Admin\Controllers;

use Aammui\LaravelTaggable\Models\Tag;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    protected $repository;

    public function __construct(Tag $data)
    {
        $this->repository = $data;
    }

    /**
     * Index resources for Tags
     *
     * @return void
     */
    public function index()
    {
        $data = $this->repository->all();
        return view('admin.tags.index', compact('data'));
    }

    public function create()
    {
        return view('admin.tags.create');
    }

    public function store(Request $request)
    {
        $this->repository->create($request->all());
        return redirect()->back()->with('success', 'Tags has been created.');
    }

    public function destroy(Request $request, $id)
    {
        $tag = $this->repository->findOrFail($id);
        $tag->delete();
        return redirect()->back()->with('success', 'Tag has been deleted.');
    }
}
