<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
\Illuminate\Support\Facades\Auth::routes();

Route::get('/debug', function () {

    $users = \NHHours\Models\WorkingHour::select([
        'name',
        'email',
        'created_at',
        'updated_at'
    ]);
    dd($users);
});

Route::get('/logout', function () {
    Auth::logout();
    return \Illuminate\Support\Facades\Redirect::to('/login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/', 'DashboardController@index')->name('index');

    Route::post('/load_working_hours', 'DashboardController@loadWorkingHours')->name('loadWorkingHours');

    Route::get('/home', 'HomeController@index')->name('home');
});
//Route::get('/home', 'longController@index')->name('login');