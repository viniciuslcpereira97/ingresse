<?php

namespace Ingresse\Repositories;

use Ingresse\Contracts\Repository;

use Ingresse\User;

class UserRepository implements Repository
{


    /**
     *
     * Retrieves all users
     *
     * @return Illuminate\Database\Eloquent\Collection
     *
     */
    public function all()
    {
        return User::all();
    }

    /**
     *
     * Stores new user
     *
     */
    public function store($data)
    {
        User::create($data);
    }

    /**
     *
     * Retrieves user by id
     *
     * @return Ingresse\User
     *
     */
    public function get(int $id)
    {
        return User::find($id);
    }

    /**
     *
     * Updates user by id
     * Retrieves updated user
     *
     * @return Ingresse\User
     *
     */
    public function update($data, int $id)
    {
        $user = User::find($id);
        $user->update($data);
        return $user;
    }

    /**
     *
     * Deletes user by id
     *
     */
    public function delete(int $id)
    {
        User::find($id)->delete();
    }

}
