<?php

namespace Ingresse\Http\Controllers\Api;

use Illuminate\Http\Request;
use Ingresse\Http\Controllers\Controller;
use Ingresse\Repositories\UserRepository;

use Ingresse\Traits\ResponsesTrait;

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
        return $this->repository->all();
    }

    /**
     *
     * Get user data by id
     *
     * @param integer $id
     *
     */
    public function getById($id)
    {
        return $this->repository->get($id) ? : $this->recordNotFound();
    }

    /**
     *
     * Store user data
     *
     * @param Illuminate\Http\Request $request
     *
     */
    public function store(\Ingresse\Http\Requests\UserRequest $request)
    {
        return $this->repository->store($request->all());
    }

    /**
     *
     * Update user data by id
     *
     * @param Illuminate\Http\Request $request
     * @param integer|Ingresse\User $user
     *
     */
    public function updateById(Request $request, $user)
    {
        return $this->repository->update($request->all(), $user) ? :
            $this->recordNotFound();
    }

    /**
     *
     * Delete user by id
     *
     * @param integer|Ingresse\User $user
     *
     */
    public function deleteById($user)
    {
        return $this->repository->delete($user) ? $this->recordDeleted() :
            $this->recordNotFound();
    }

}
