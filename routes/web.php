<?php

\Illuminate\Support\Facades\Auth::routes();

Route::get('/debug', function () {
//    dd(Carbon::create( , $month, 0, 0, 0, 0));
    dd(\Carbon\Carbon::now()->year(2018)->lastOfyear()->toDateString());
});

Route::get('/logout', function () {
    Auth::logout();
    return \Illuminate\Support\Facades\Redirect::to('/login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/', 'DashboardController@index')->name('dashboard.index');
    Route::post('/', 'DashboardController@index');

    Route::get('/profile', 'UsersController@index')->name('user.index');
    Route::post('/profile/{id}', 'UsersController@update')->name('user.update');

    Route::get('/departments', 'DepartmentsController@index')->name('department.index');
    Route::post('/departments/save/{id}', 'DepartmentsController@save')->name('department.save');
});