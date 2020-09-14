<?php

namespace App\Services\User;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserService
{
    /**
     * Create a new user.
     *
     * @param Request $request
     *
     * @return User
     */
    public function createUser(Request $request): User
    {
        $user = new User;

        $user->firstname = $request->get('firstname');
        $user->lastname = $request->get('lastname');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));

        $user->save();

        return $user;
    }
    /**
     * Updated user.
     *
     * @param Request $request
     *
     * @return void
     */
    public function updateUser(Request $request) : void
    {
        $user = auth()->user();

        $user->firstname = $request->get('firstname');
        $user->lastname = $request->get('lastname');

        $user->save();
    }
}
