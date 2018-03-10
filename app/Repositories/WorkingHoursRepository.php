<?php namespace NHHours\Repositories;

use NHHours\Models\Scopes\WorkingHoursScope;
use NHHours\Models\WorkingHour;

class WorkingHoursRepository extends BaseRepository
{
    public $query;

    public function buildQuery()
    {
        return $this->query = WorkingHour::query();
    }

    public function getWorkingHoursPerMonth($user_id, $month)
    {
        $workingHours = (new WorkingHoursScope())->init()
            ->forUser($user_id)
            ->forDate(null, $month)
            ->query()
            ->get();

        $hours = 0;
        $minutes = 0;

        foreach($workingHours as $workingHour) {
            $totalTime = $workingHour->from->diff($workingHour->to->subMinutes($workingHour->break));
            $hours += $totalTime->format('%h');
            $minutes += $totalTime->format('%i');
        }
        $hours += intval($minutes / 60);
        $minutes = $minutes % 60;

        return ['hours' => $hours, 'minutes' => $minutes];
    }
}