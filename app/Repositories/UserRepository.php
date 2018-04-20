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
        $data['password'] = bcrypt($data['password']);
        return User::create($data);
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
     * Updates user
     * Retrieves updated user
     *
     * @return Ingresse\User
     *
     */
    public function update($data, $id)
    {
        $user = $this->get($id); // Find by id

        if(!$user) // Is null
            return false;

        $user->update($data);

        return $user;
    }

    /**
     *
     * Deletes user
     *
     */
    public function delete($id)
    {
        $user = $this->get($id); // Find by id

        if(!$user)
            return false;

        return $user->delete();
    }

}
