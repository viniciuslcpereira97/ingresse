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
    }

    public function testGetAllUsers()
    {
        $users = $this->repository->all();

        $this->assertEquals($users->count(), 0);
    }

    public function testInsertUser()
    {
        $user = factory(\Ingresse\User::class)->make();
        $this->repository->store($user->getAttributes());

        $this->assertDatabaseHas('users', ['email' => $user->email]);
    }
}
