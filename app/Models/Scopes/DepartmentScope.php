<?php namespace NHHours\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use NHHours\Models\Department;

class DepartmentScope extends BaseScope
{
    protected function buildQuery(): Builder
    {
        return Department::query();
    }

    public function forCompany($companyId): DepartmentScope
    {
        $this->currentQuery()->where('company_id', $companyId);

        return $this;
    }
}