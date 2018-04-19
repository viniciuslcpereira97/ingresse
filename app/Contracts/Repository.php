<?php

namespace Ingresse\Contracts;

interface Repository
{

    /**
     *
     * Get all
     *
     */
    public function all();

    /**
     *
     * Store at database
     *
     */
    public function store($data);

    /**
     *
     * Get by id
     *
     * @param int $id
     *
     */
    public function get(int $id);

    /**
     *
     * Update data
     *
     * @param Array|Collection $data
     * @param $user
     *
     */
    public function update($data, $user);

    /**
     *
     * Delete data
     *
     * @param $user
     *
     */
    public function delete($user);

}
