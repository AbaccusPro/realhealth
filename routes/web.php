<?php
use App\User;

Route::get('/', function () {
	/*User::create([
		'username' => 'stan',
		'first_name' => 'Stanley',
		'middle_name' => '',
		'last_name' => 'Pinnes',
		'email' => 'stan@hotmail.com',
		'password' => bcrypt('123abc'),
		'rol_id' => 1,
		'image_user_id' => 1
		]);*/
    return redirect('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('users', 'UsersController@index');
Route::get('create/user', 'UsersController@create');
Route::post('create/user', 'UsersController@store');
Route::get('edit/user/{id}', 'UsersController@edit');
Route::post('edit/user/{id}', 'UsersController@update');
Route::get('delete/user/{id}', 'UsersController@destroy');
Route::get('profile/user/{id}', 'UsersController@show');

Route::get('assign/workout', 'WorkoutController@index');
Route::get('assign/workout/{id}', 'WorkoutController@create');
Route::post('assign/workout/{id}', 'WorkoutController@store');

