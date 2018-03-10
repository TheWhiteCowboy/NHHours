<?php namespace NHHours\Repositories;

use Illuminate\Database\Eloquent\Builder;

abstract class BaseFactory
{
    abstract public function buildQuery(): Builder;

    public function delete($id)
    {
        return $this->buildQuery()->findOrFail($id)->delete();
    }

    public function update($id, $data)
    {
        $model = $this->buildQuery()->findOrFail($id);

        $model->fill($data);

        $model->save();
    }
}