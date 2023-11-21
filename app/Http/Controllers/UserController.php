<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Services\User\Factory;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Response;

class UserController extends Controller
{
    public function __construct(
        private User $model,
        private Factory $factory
    ) {
    }

    public function index(): Response
    {
        return inertia('Users/Index', [
            'items' => $this->model->getAllUsers(),
        ]);
    }

    public function create(): Response
    {
        return inertia('Users/Create');
    }

    public function store(CreateUserRequest $request): Response
    {
        $this->factory->save($request->validated());

        return inertia('Users/Index', [
            'items' => $this->model->getAllUsers(),
        ]);
    }

    public function destroy(User $user): RedirectResponse
    {
        $this->factory->deleteUser($user);

        return to_route('users.index');
    }
}
