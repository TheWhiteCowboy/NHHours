<?php

namespace NHHours\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use NHHours\Models\User;

class CreateFirstUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates first user';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $password = $this->secret('What is the password?');

        $user = new User();
        $user->first_name = 'Chiem';
        $user->prefix = 'van';
        $user->surname = 'Woerkom';
        $user->email = 'chiem95@hotmail.com';
        $user->birth_date = Carbon::parse('1995-06-05')->format('Y-m-d');
        $user->phone = '0640250780';
        $user->password = Hash::make($password);
        $user->save();
        $this->info('User created');
    }
}
