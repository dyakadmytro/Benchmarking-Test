<?php

namespace App\Contracts;

interface UserRepositoryInterface
{
    public function getAllUsers();
    public function getUserById($userId);
    public function deleteUser($userId);
    public function createUser(array $userDetails);
    public function updateUser($userId, array $newDetails);
}
