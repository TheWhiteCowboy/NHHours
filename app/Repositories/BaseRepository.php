<?php namespace NHHours\Repositories;

use NHHours\Models\User;

abstract class BaseRepository
{
    abstract public function buildQuery();

    public function read($id)
    {
        return $this->buildQuery()->find($id);
    }
}