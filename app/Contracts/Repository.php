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
    public function store();

    /**
     *
     * Get by id
     *
     * @param integer $id
     *
     */
    public function get(integer $id);

    /**
     *
     * Update by id
     *
     * @param integer $id
     *
     */
    public function update(integer $id);

    /**
     *
     * Delete by id
     *
     * @param integer $id
     *
     */
    public function delete(integer $id);

}
