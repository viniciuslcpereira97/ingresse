<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use Ingresse\Repositories\UserRepository;

class UserRepositoryTest extends TestCase
{

    use RefreshDatabase;

    public function setUp()
    {
        parent::setUp();
        $this->repository = new UserRepository;
        $this->user = factory(\Ingresse\User::class)->make();
    }

    // All users was stored and retrieved
    public function testGetAllUsers()
    {
        $fakeUsers = factory(\Ingresse\User::class, 5)->create();
        $users = $this->repository->all();

        $this->assertEquals($users->count(), $fakeUsers->count());
    }

    // Is retrieving user
    public function testGetUser()
    {
        $user = $this->repository->store($this->user->getAttributes());

        $this->assertEquals(
            $this->repository->get($user->id)->email,
            $this->user->email
        );
    }

    // User was stored
    public function testInsertUser()
    {
        $this->repository->store($this->user->getAttributes());

        $this->assertDatabaseHas('users', ['email' => $this->user->email]);
    }

    // User was deleted
    public function testDeleteUser()
    {
        $user = $this->repository->store($this->user->getAttributes());
        $this->repository->delete($user->id);

        $this->assertDatabaseMissing('users', ['email' => $this->user->email]);
    }

    // User was updated
    public function testUpdateUser()
    {
        $user = $this->repository->store($this->user->getAttributes());
        $newEmail = factory(\Ingresse\User::class)->make()->email;
        $this->repository->update(['email' => $newEmail], $user->id);

        $this->assertDatabaseMissing('users', ['email' => $this->user->email]);
    }

}
