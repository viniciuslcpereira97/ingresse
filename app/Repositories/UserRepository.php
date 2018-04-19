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
    public function update($data, $user)
    {
        if($user instanceof \Ingresse\User) // Is instance of \Ingresse\User
            return $user->update($data);

        $user = User::find($user); // Find by id

        if(!$user) // Is null
            return $user;

        $user->update($data);

        return $user;
    }

    /**
     *
     * Deletes user
     *
     */
    public function delete($user)
    {
        if($user instanceof \Ingresse\User) // Is instance of \Ingresse\User
            return $user->delete();

        $user = User::find($user); // Find by id

        if(!$user)
            return $user;

        return $user->delete();
    }

}
