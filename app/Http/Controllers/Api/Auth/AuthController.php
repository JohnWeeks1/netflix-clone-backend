<?php

namespace App\Http\Controllers\Api\Auth;

use App\Services\MailService;
use Illuminate\Http\JsonResponse;
use App\Services\User\UserService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\User\RegisterRequest;

class AuthController extends Controller
{
    /**
     * User service instance.
     *
     * @var UserService
     */
    protected $userService;

    /**
     * Auth service instance.
     *
     * @var MailService
     */
    protected $mailService;

    /**
     * AuthController constructor.
     *
     * @param UserService $userService
     * @param MailService $mailService
     *
     * @return void
     */
    public function __construct(UserService $userService, MailService $mailService)
    {
        $this->userService = $userService;
        $this->mailService = $mailService;
    }

    /**
     * Login user.
     *
     * @param LoginRequest $request
     *
     * @return JsonResponse
     */
    public function login(LoginRequest $request): JsonResponse
    {
        // Get email and password and see if valid
        if(!auth()->attempt($request->only(['email', 'password']))) {
            return response()->json(['message' => 'Unauthorized'], 500);
        }

        return response()->json(['message' => 'Success'], 200);
    }

    /**
     * Register new user.
     *
     * @param RegisterRequest $request
     *
     * @return JsonResponse
     */
    public function register(RegisterRequest $request): JsonResponse
    {
        // Create new user
        $user = $this->userService->createUser($request);
        // Send email to new registered user.
        $this->mailService->welcomeNewUser($user);

        return response()->json(['message' => 'User created'], 200);
    }

    /**
     * Logout user.
     *
     * @return void
     */
    public function logout(): void
    {
        auth()->logout();
    }
}
