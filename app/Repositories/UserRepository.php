<?php

namespace Ingresse\Repositories;

use Ingresse\Contracts\Repository;

class UserRepository implements Repository
{

    public function all()
    {
        return 'all';
    }

    public function store($data)
    {
        dd($data);
    }

    public function get(int $id)
    {
        dd($id);
    }

    public function update($data, int $id)
    {
        dd($data);
    }

    public function delete(int $id)
    {
        dd($id);
    }

}
