<?php

namespace Ingresse\Repositories;

use Ingresse\Contracts\Repository;
use Ingresse\Events\UserEvent;
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
     * Retrieves all users from Redis cache
     *
     * @return
     *
     */
    public function allFromCache()
    {
        return json_decode(\Redis::get('users'));
    }

    /**
     *
     * Stores new user
     *
     */
    public function store($data)
    {
        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);

        event(new UserEvent());
        return $user;
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

        event(new UserEvent());
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

        $isDeleted = $user->delete();
        event(new UserEvent());
        return $isDeleted;
    }

}
