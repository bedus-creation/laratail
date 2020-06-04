<?php

namespace App\Application\Admin\Controllers;

use Aammui\LaravelTaggable\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    protected $repository;

    public function __construct(Category $data)
    {
        $this->repository = $data;
    }

    /**
     * Index resources for categories
     *
     * @return void
     */
    public function index()
    {
        $data = $this->repository->all();
        return view('admin.categories.index', compact('data'));
    }


    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->merge(['slug' => $request->name]);
        $this->repository->create($request->all());
        return redirect()->back()->with('success', 'Category has been created.');
    }

    public function destroy(Request $request, $id)
    {
        $category = $this->repository->findOrFail($id);
        $category->delete();
        return redirect()->back()->with('success', 'Category has been deleted.');
    }
}
