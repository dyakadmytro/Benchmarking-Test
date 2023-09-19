<?php

namespace App\Facades;

use App\Models\User;
use Illuminate\Support\Facades\Facade;

/**
 * UserRepositoryFacade - Facade for the UserRepositoryInterface.
 *
 * This facade provides a convenient way to access methods defined in the UserRepositoryInterface
 * without having to resolve the actual implementation from the service container.
 *
 * @method static array getAllUsers()
 * Get all users.
 *
 * @method static mixed getUserById(int $userId)
 * Get a user by their ID.
 *
 * @method static bool deleteUser(int $userId)
 * Delete a user by their ID.
 *
 * @method static User createUser(array $userDetails)
 * Create a new user with the provided details and return their ID.
 *
 * @method static bool updateUser(int $userId, array $newDetails)
 * Update a user's details by their ID.
 *
 * @see \App\Contracts\UserRepositoryInterface
 */
class UserRepositoryFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'user-repository';
    }
}
