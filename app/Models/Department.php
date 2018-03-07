<?php namespace NHHours\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Department extends Model
{

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public static function validate($data)
    {
        return Validator::make($data,
            [
                'name' => 'required',
            ],
            [
                'required' => 'Verplicht'
            ]
        );
    }
}