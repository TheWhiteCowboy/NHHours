<?php namespace NHHours\Repositories;

use NHHours\Models\Scopes\WorkingHoursScope;

class WorkingHoursRepository
{
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