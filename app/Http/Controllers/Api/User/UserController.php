<?php

namespace App\Http\Controllers\Api\User;

use App\Services\User\UserService;
use App\Http\Controllers\Controller;
use App\Http\Responses\SuccessResponse;
use App\Http\Resources\User\UserResource;
use App\Http\Requests\User\UpdateUserRequest;

class UserController extends Controller
{
    /**
     * @var UserService
     */
    protected $userService;

    /**
     * UserController constructor.
     *
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Get user.
     *
     * @return UserResource
     */
    public function index(): UserResource
    {
        return new UserResource(auth()->user());
    }

    /**
     * Update user.
     *
     * @param UpdateUserRequest $request
     *
     * @return SuccessResponse
     */
    public function update(UpdateUserRequest $request): SuccessResponse
    {
        $this->userService->updateUser($request);

        return new SuccessResponse('Details updated!');
    }
}
