<?php

namespace App\Http\Controllers\Api\Auth;

use App\Services\MailService;
use App\Services\User\UserService;
use App\Http\Controllers\Controller;
use App\Http\Responses\SuccessResponse;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Notifications\Slack\UserRegisteredSlackNotification;

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
     * @return SuccessResponse
     *
     * @throws \Exception
     */
    public function login(LoginRequest $request): SuccessResponse
    {
        // Get email and password and see if valid
        if(!auth()->attempt($request->only(['email', 'password']))) {
            throw new \Exception("User not found!");
        }

        return new SuccessResponse('User logged in');
    }

    /**
     * Register new user.
     * Send welcome email.
     * Send notification to Slack.
     *
     * @param RegisterRequest $request
     *
     * @return SuccessResponse
     *
     * @throws \Exception
     */
    public function register(RegisterRequest $request): SuccessResponse
    {
        $user = $this->userService->createUser($request);
        $this->mailService->welcomeNewUser($user);
        $user->notify(new UserRegisteredSlackNotification($user));

        return new SuccessResponse('User created!');
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
