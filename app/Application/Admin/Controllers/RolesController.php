<?php

namespace App\Application\Admin\Controllers;

use Aammui\RolePermission\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RolesController extends Controller
{
    protected $repository;

    public function __construct(Role $user)
    {
        $this->repository = $user;
    }

    public function index()
    {
        $data = $this->repository->all();
        return view('admin.roles.index', compact('data'));
    }

    /**
     * Create a new resource
     *
     * @return void
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Add a new Role resource
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $user = $this->repository->create($request->all());
        return redirect()->back()->with('success', 'Role has been created.');
    }

    /**
     * Delete Role resource
     *
     * @param Request $request
     * @param int $id
     * @return void
     */
    public function destroy(Request $request, $id)
    {
        $this->repository->findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Role has been deleted.');
    }
}
