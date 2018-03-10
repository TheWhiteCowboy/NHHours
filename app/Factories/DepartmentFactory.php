<?php namespace NHHours\Repositories;

use Illuminate\Database\Eloquent\Builder;
use NHHours\Models\Department;

class DepartmentFactory extends BaseFactory
{
    public $query;

    public function buildQuery(): Builder
    {
        return $this->query = Department::query();
    }

    public function create($companyId, $data)
    {
        $department = new Department();

        $department->company_id = $companyId;
        $department->name = data_get($data, 'name');

        $department->save();
    }
}