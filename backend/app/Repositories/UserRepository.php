<?php

namespace App\Repositories;

use App\Exceptions\UserNotFoundException;
use App\Models\User;

class UserRepository
{
    /**
     * @throws UserNotFoundException
     */
    public function findUserByEmail(string $email): ?User
    {
        $user = User::where('email', $email)->first();

        if (!$user) {
            throw new UserNotFoundException('Could not find user', 401);
        }

        return $user;
    }

    /**
     * @throws UserNotFoundException
     */
    public function findUserByToken(string $token): ?User
    {
        $user = User::where('remember_token', $token)->first();

        if (!$user) {
            throw new UserNotFoundException('Could not find user', 401);
        }

        return $user;
    }
}
