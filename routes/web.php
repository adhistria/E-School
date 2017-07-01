<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Auth::routes();
Route::group(['middleware'=>['web']],function(){
	Route::get('/','pagesController@index');
	Route::get('pages/{id}',['as'=>'pages.single','uses'=>'pagesController@single']);
	Route::get('updates/{id}',['as'=>'sekolahs.adminUpdate','uses'=>'SekolahController@adminUpdate']);
	Route::PUT('updates/{id}',['as'=>'sekolahs.saveAdminUpdate','uses'=>'SekolahController@saveAdminUpdate']);
	Route::get('/home', 'HomeController@index');
	Route::resource('sekolahs','SekolahController');
	Route::get('/logout', 'Auth\LoginController@logout');
	// Route::get('tes',function(){
	// 	$sekolah = App\Sekolah::all();
	// 	foreach ($sekolah as $skul) {
	// 		echo $skul->nama .'belongs to' . $skul->user->name . '<br>';
	// 	}
	// });
});


Auth::routes();

Route::get('/home', 'HomeController@index');
