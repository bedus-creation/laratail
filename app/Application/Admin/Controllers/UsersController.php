<?php

namespace App\Application\Admin\Controllers;

use Aammui\RolePermission\Models\Role as ModelsRole;
use App\Application\Admin\Requests\UserStoreRequest;
use App\Http\Controllers\Controller;
use App\Domain\User\Enums\Role;
use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    protected $repository;

    public function __construct(User $user)
    {
        $this->repository = $user;
    }

    public function index()
    {
        $data = $this->repository->all();
        return view('admin.users.index', compact('data'));
    }

    public function create(Request $request)
    {
        $roles = ModelsRole::all();
        return view('admin.users.create', compact('roles'));
    }

    public function store(UserStoreRequest $userStoreRequest)
    {
        $userStoreRequest->merge(['password' => bcrypt($userStoreRequest->password)]);
        $user = $this->repository->create($userStoreRequest->all());
        $user->addRole(Role::ADMIN);
        if ($userStoreRequest->image) {
            $user->toCollection('cover')
                ->toDisk('public')
                ->addMedia(request()->image);
        }
        return redirect()->back()->with('success', 'User has been created.');
    }

    /**
     * Delete users resource
     *
     * @param Request $request
     * @param int $id
     * @return void
     */
    public function destroy(Request $request, $id)
    {
        $article = $this->repository->findOrFail($id);
        $article->delete();
        return redirect()->back()->with('success', 'Users has been deleted.');
    }
}
