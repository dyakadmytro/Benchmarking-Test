<?php

namespace Tests\Unit;

use App\Models\User;
use App\Repositories\UserEloquentRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserRepositoryTest extends TestCase
{
    use RefreshDatabase;

    protected UserEloquentRepository $userRepository;

    protected function setUp(): void
    {
        parent::setUp();
        $this->userRepository = new UserEloquentRepository();
    }

    public function testGetAllUsers()
    {
        User::factory()->count(3)->create();
        $users = $this->userRepository->getAllUsers();
        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Collection::class, $users);
        $this->assertCount(3, $users);
    }

    public function testGetUserById()
    {
        $user = User::factory()->create();
        $foundUser = $this->userRepository->getUserById($user->id);
        $this->assertInstanceOf(User::class, $foundUser);
        $this->assertEquals($user->id, $foundUser->id);
    }

    public function testDeleteUser()
    {
        $user = User::factory()->create();
        $deletedCount = $this->userRepository->deleteUser($user->id);
        $this->assertEquals(1, $deletedCount);
        $foundUser = User::find($user->id);
        $this->assertNull($foundUser);
    }

    public function testCreateUser()
    {
        $userData = [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ];
        $createdUser = $this->userRepository->createUser($userData);
        $this->assertInstanceOf(User::class, $createdUser);
        $this->assertDatabaseHas('users', ['email' => 'test@example.com']);
    }

    public function testUpdateUser()
    {
        $user = User::factory()->create();
        $newDetails = ['name' => 'Updated Name'];
        $updatedCount = $this->userRepository->updateUser($user->id, $newDetails);
        $this->assertEquals(1, $updatedCount);
        $updatedUser = User::find($user->id);
        $this->assertEquals('Updated Name', $updatedUser->name);
    }
}
