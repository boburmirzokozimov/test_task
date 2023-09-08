<?php

namespace App\Services;

use App\Exceptions\InvalidCredentialsException;
use App\Exceptions\UserNotFoundException;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Fluent;

class UserService
{
    public function __construct(private UserRepository $repository)
    {
    }

    /**
     * @throws UserNotFoundException
     * @throws InvalidCredentialsException
     */
    public function login(Fluent $credentials): string
    {
        $user = $this->repository->findUserByEmail($credentials->email);

        if (!Hash::check($credentials->password, $user->getAuthPassword())) {
            throw new InvalidCredentialsException('Given password is incorrect', 401);
        }

        return $user->createToken($credentials->email)->plainTextToken;
    }
}
