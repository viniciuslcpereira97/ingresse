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
     * Update by id
     *
     * @param Array|Collection $data
     * @param int $id
     *
     */
    public function update($data, int $id);

    /**
     *
     * Delete by id
     *
     * @param int $id
     *
     */
    public function delete(int $id);

}
