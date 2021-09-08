<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect('login');
});

require __DIR__ . '/auth.php';

Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('dashboard', 'DashboardController@index');
    

    Route::get('user-profile', 'UserProfileController@index');
    Route::post('user-profile/update-user', 'UserProfileController@updateUser');
    Route::post('user-profile/renew-password', 'UserProfileController@renewPassword');

    Route::get("monthly", "MonthlyController@index");
    Route::get("daily", "DailyController@index");

    Route::get("oldemen", "OldemenController@index");
    Route::get("prediction","OldemenController@predictionForm");
    Route::post("prediction","OldemenController@prediction");

    Route::get("delete-prediction","OldemenController@deletePredictionForm");
    Route::post("delete-prediction","OldemenController@deletePrediction");
    
    
    
});
