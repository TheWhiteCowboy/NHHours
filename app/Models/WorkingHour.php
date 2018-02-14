<?php namespace NHHours\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class WorkingHour extends Model
{
    public $dates = ['date', 'from', 'to'];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function getTotalHoursAttribute()
    {
        $totalTime = $this->from->diff($this->to->subMinutes($this->break));
        if($totalTime->i == 0){
            return $totalTime->format('%h');
        };
        return $totalTime->format('%h:%i');
    }

    public function getBreak()
    {
        $hours = intval($this->break / 60);
        $minutes = $this->break % 60;

        if($hours != 0){
            return Carbon::create(0,0,0, $hours, $minutes, 0);
        };
        return Carbon::create(0,0,0, 0, $minutes, 0);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}