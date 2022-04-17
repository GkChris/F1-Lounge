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





// // DATABASE UPDATE ROUTES
// // Route::get('/circuits_update', 'DatabaseHandling@Update_Circuits');
// // Route::get('/drivers_update', 'DatabaseHandling@Update_Drivers');
// // Route::get('/constructors_update', 'DatabaseHandling@Update_Constructors');
// // Route::get('/seasons_update', 'DatabaseHandling@Update_Seasons');
// // Route::get('/status_update', 'DatabaseHandling@Update_Status');

// Route::get('/dbupdate', 'DatabaseHandling@dbupdate');
// // END OF DATABASE UPDATE ROUTES




// DATABASE UPDATE ROUTES
Route::get('/updatedb/{option}', 'UpdateDatabaseController@show');

//POSTS
Route::post('/create_post', 'PostsController@store');
Route::post('/approve_post', 'PostsController@approved');
Route::post('/delete_post', 'PostsController@delete');
Route::post('/change_username', 'UserController@changeUsername');
Route::post('/change_mail', 'UserController@changeMail');
Route::post('/change_password', 'UserController@changePassword');
Route::post('/delete_acc', 'UserController@deleteAccount');
Route::post('/send_report', 'ReportController@report');


//SEARCH ROUTES
Route::get('/driver_search', 'SearchController@driverSearch');
Route::get('/constructor_search', 'SearchController@constructorSearch');
Route::get('/circuit_search', 'SearchController@circuitSearch');
Route::get('/all_search', 'SearchController@searchAll');
Route::get('/search_username', 'SearchController@searchUsername');
Route::get('/search_mail', 'SearchController@searchMail');
//END OF SEARCH ROUTES




//WEBAPP ROUTES
Route::get('/', function () {
    return redirect('/home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//User
Route::get('/profile', 'UserController@profile');   //secured
Route::get('/admin', 'UserController@admin');   //secured


//Footer
Route::get('/gallery', 'FooterController@gallery');
Route::get('/about', 'FooterController@about');
Route::get('/contact', 'FooterController@contact');
Route::get('/report', 'FooterController@report');

//Statistics
Route::get('/statistics', 'StatisticsController@index')->name('statistics.index');
Route::get('/statistics/{option}', 'StatisticsController@show');

//Circuits
Route::get('/circuits', 'CircuitsController@index');
Route::get('/circuits/{circuit}', 'CircuitsController@show');

//Drivers
Route::get('/drivers', 'DriversController@index');
Route::get('/drivers/{driver}', 'DriversController@show');

//Constructors
Route::get('/constructors', 'ConstructorsController@index');
Route::get('/constructors/{constructor}', 'ConstructorsController@show');

//Seasons
Route::get('/seasons', 'SeasonsController@index');
Route::get('/{season}', 'SeasonsController@show');

//Races
Route::get('/races', 'RacesController@index');
Route::get('/{year}/{round}', 'RacesController@show');


//END OF //WEBAPP ROUTES



