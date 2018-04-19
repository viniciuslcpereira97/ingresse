<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
    public function getUser($id)
    {
        return 'get user';
    }

    /**
     *
     * Update user data by id
     *
     * @param Request $request
     * @param integer $id
     *
     */
    public function udpateUser(Request $request, $id)
    {
        return 'update user';
    }

    /**
     *
     * Delete user by id
     *
     * @param integer $id
     *
     */
    public function deleteUser($id)
    {
        return 'delete user';
    }

}
