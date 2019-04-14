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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/bret', function() {
    return 'Welcome from Bret';
});


Route::get('/debug', function() {
    $debug = ['Environment' => App::environment(),];

    $debug['MySQL connection config'] = config('database.connections.mysql');
    try {
        $databases = DB::select('SHOW DATABASES;');
        $debug['Database connection test'] = 'PASSED';
        $debug['Databases'] = array_column($databases, 'Database');
    } catch (Exception $ex) {
        $debug['DATABASE CONNECTION TEST'] = 'failed: ' . $ex->getMessage();
    }
    dump($debug);
});

