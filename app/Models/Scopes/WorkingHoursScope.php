<?php namespace NHHours\Models\Scopes;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use NHHours\Models\WorkingHour;

class WorkingHoursScope extends BaseScope
{
    protected function buildQuery(): Builder
    {
        return WorkingHour::query();
    }

    public function forUser($userId): WorkingHoursScope
    {
        $this->currentQuery()->where('user_id', $userId);

        return $this;
    }

    public function forMonth($month)
    {
        $from = Carbon::now()->month($month)->firstOfMonth();
        $to = Carbon::now()->month($month)->lastOfMonth();

        $this->currentQuery()->whereBetween('date', [$from, $to]);

        return $this;
    }
}
