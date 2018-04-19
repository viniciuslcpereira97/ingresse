<?php

namespace Ingresse\Http\Controllers\Api;

use Illuminate\Http\Request;
use Ingresse\Http\Controllers\Controller;
use Ingresse\Repositories\UserRepository;

class UsersController extends Controller
{

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
        return $this->repository->get($id);
    }

    /**
     *
     * Store user data
     *
     * @param Illuminate\Http\Request $request
     *
     */
    public function store(Request $request)
    {
        return $this->repository->store($request->all());
    }

    /**
     *
     * Update user data by id
     *
     * @param Illuminate\Http\Request $request
     * @param integer $id
     *
     */
    public function udpateById(Request $request, $id)
    {
        return $this->repository->update($request->all(), $id);
    }

    /**
     *
     * Delete user by id
     *
     * @param integer $id
     *
     */
    public function deleteById($id)
    {
        return $this->repository->delete($id);
    }

}
