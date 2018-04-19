<?php

namespace Ingresse\Http\Controllers\Api;

use Illuminate\Http\Request;
use Ingresse\Http\Controllers\Controller;
use Ingresse\Repositories\UserRepository;

class UsersController extends Controller
{

    /**
     *
     * Get all users data
     *
     */
    public function all()
    {
        return 'all';
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
        return "get user -> id: {$id}";
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
        return 'store user';
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
        return "update user -> id: {$id}";
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
        return "delete user -> id: {$id}";
    }

}
