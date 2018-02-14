<?php namespace NHHours\Repositories;

use NHHours\Models\User;

class UserRepository extends BaseRepository
{
    public $query;

    public function buildQuery()
    {
        return $this->query = User::query();
    }
}