<?php

namespace Ingresse\Http\Controllers\Api;

use Illuminate\Http\Request;
use Ingresse\Traits\ResponsesTrait;
use Ingresse\Http\Controllers\Controller;
use Ingresse\Repositories\UserRepository;
use Ingresse\Http\Requests\CreateUserRequest as CreateRequest;
use Ingresse\Http\Requests\UpdateUserRequest as UpdateRequest;

class UsersController extends Controller
{

    use ResponsesTrait;

    private $repository;

    /**
     *
     * Class constructor
     *
     * @param Ingresse\Repositories\UserRepository $repository
     *
     * Injects UserRepository at class
     *
     */
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     *
     * Get all users data
     *
     */
    public function all()
    {
        $users = $this->repository->allFromCache();

        if(!$users)
            return $this->recordNotFound();

        return $users;
    }

    /**
     *
     * Get user data by id
     *
     * @param int $id
     *
     */
    public function getById($id)
    {
        $user = $this->repository->get($id);

        if(!$user)
            return $this->recordNotFound();

        return $user;
    }

    /**
     *
     * Store user data
     *
     * @param Illuminate\Http\Request $request
     *
     */
    public function store(CreateRequest $request)
    {
        return $this->repository->store($request->all());
    }

    /**
     *
     * Update user data by id
     *
     * @param Illuminate\Http\Request $request
     * @param int $id
     *
     */
    public function updateById(UpdateRequest $request, $id)
    {
        $updated = $this->repository->update($request->all(), $id);

        if(!$updated)
            return $this->recordNotFound();

        return $this->recordUpdated();
    }

    /**
     *
     * Delete user by id
     *
     * @param int $id
     *
     */
    public function deleteById($id)
    {
        $deleted = $this->repository->delete($id);

        if(!$deleted)
            return $this->recordNotFound();

        return $this->recordDeleted();
    }

}
