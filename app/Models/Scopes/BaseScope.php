<?php namespace NHHours\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;

abstract class BaseScope
{
    protected $query;

    abstract protected function buildQuery();

    public static function init()
    {
        return new static();
    }

    public function clear()
    {
        $this->query = null;

        return $this;
    }

    protected function currentQuery(): Builder
    {
        if ($this->query === null) {
            $this->query = $this->buildQuery();
        }

        return $this->query;
    }

    public function query()
    {
        return $this->currentQuery();
    }
}
