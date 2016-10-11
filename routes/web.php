<?php
use App\User;

Route::get('/', function () {
	//aqui comento el codigo de creacion del usuario admin principal porque al crearlo de la base de datos directo luego da conflicto y no reconoce las credenciales... solo lo utilizo una vez y lo comento
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

//en laravel 5.3 es necesario definir esta ruta para que funcioene el logout
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

//Route::group(['middleware' => 'auth'], function () {
	//rutas de usuarios
	Route::get('users', 'UsersController@index');
	Route::get('create/user', 'UsersController@create');
	Route::post('create/user', 'UsersController@store');
	Route::get('edit/user/{id}', 'UsersController@edit');
	Route::post('edit/user/{id}', 'UsersController@update');
	Route::get('delete/user/{id}', 'UsersController@destroy');
	Route::get('profile/user/{id}', 'UsersController@show');

	//rutas de asignacion de workout
	Route::get('assign/workout', 'WorkoutController@index');
	Route::get('assign/workout/{id}', 'WorkoutController@create');
	Route::post('assign/workout/{id}', 'WorkoutController@store');
	Route::get('view/workout/{id}', 'WorkoutController@show');
	Route::get('details/workout/{id}', 'WorkoutController@details');
	Route::get('pdf/workout/{id}', 'WorkoutController@detailsToPdf');
	Route::get('send/workout/{id}', 'WorkoutController@sendPdf');

Route::group(['middleware' => ['auth', 'mod']], function () {
	Route::get('nutrition', 'NutritionController@index');   
});

Route::group(['middleware' => ['auth', 'ther']], function () {
	Route::get('therapy', 'NutritionController@therapy');   
});
