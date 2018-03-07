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

    public function forDate($year = null, $month = null)
    {
        $from = Carbon::now();
        $to = Carbon::now();

        if ($month != null && $year != null){
            $from = $from->year($year)->month($month)->firstOfMonth();
            $to = $to->year($year)->month($month)->lastOfMonth();
        }
        elseif ($year != null) {
            $from = $from->year($year)->firstOfYear();
            $to = $to->year($year)->lastOfYear();
        } elseif ($month != null) {
            $from = $from->year(Carbon::now()->year)->month($month)->firstOfMonth();
            $to = $to->year(Carbon::now()->year)->month($month)->lastOfMonth();
        }

        $this->currentQuery()->whereBetween('date', [$from->toDateString(), $to->toDateString()]);

        return $this;
    }
}