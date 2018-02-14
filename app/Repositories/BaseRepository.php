<?php namespace NHHours\Repositories;

use NHHours\Models\User;

class BaseRepository
{
    public function read($id)
    {
        return $this->buildQuery()->find($id);
    }


}