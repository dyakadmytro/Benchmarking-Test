<?php

namespace App\Repositories;

use App\Contracts\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserEloquentRepository implements UserRepositoryInterface
{
    public function getAllUsers(): Collection
    {
        return User::all();
    }

    public function getUserById($userId): User
    {
        return User::find($userId);
    }

    public function deleteUser($userId): int
    {
        return User::destroy($userId);
    }

    public function createUser(array $userDetails): User
    {
        return User::create($userDetails);
    }

    public function updateUser($userId, array $newDetails)
    {
        return User::where('id', $userId)->update($newDetails);
    }

}
