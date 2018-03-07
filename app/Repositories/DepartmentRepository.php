<?php namespace NHHours\Repositories;

use NHHours\Models\Department;

class DepartmentRepository extends BaseRepository
{
    public $query;

    public function buildQuery()
    {
        return $this->query = Department::query();
    }
}