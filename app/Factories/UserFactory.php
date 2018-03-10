<?php namespace NHHours\Repositories;

use Illuminate\Database\Eloquent\Builder;
use NHHours\Models\User;

class UserFactory extends BaseFactory
{
    public $query;

    public function buildQuery(): Builder
    {
        return $this->query = User::query();
    }

    public function create($companyId, $data)
    {
        $user = new User();

        $user->company_id = $companyId;
        $user->email = data_get($data, 'email');
        $user->password = data_get($data, 'password');
        $user->full_name = data_get($data, 'full_name');
        $user->birth_date = data_get($data, 'birth_date');
        $user->phone = data_get($data, 'phone');
        $user->contract_hours = data_get($data, 'contract_hours');

        $user->save();
    }
}