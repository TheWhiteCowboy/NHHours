<?php namespace NHHours\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Validator;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use Notifiable;
    use EntrustUserTrait; // add this trait to your user model

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public $dates = ['birth_date'];

    public static function validateUpdate($data)
    {
        return Validator::make($data,
            [
                'full_name' => 'required',
                'email' => 'required|email',
                'phone' => 'required',
                'birth_date' => 'required|date',
            ],
            static::getValidationMessages()
        );
    }

    public static function getValidationMessages()
    {
        return [
            'required' => 'Verplicht',
            'email.email' => 'Voer een geldig e-mail adres in',
            'email.unique' => 'E-mail adres al in gebruik',
            'birth_date.date' => 'Vul een geldige datum in',
        ];
    }
}