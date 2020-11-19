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
Route::get('/login','LoginController@login');
Route::post('/login/checklogin','LoginController@checklogin');
Route::get('/login/successlogin','LoginController@successlogin');
Route::get('/login/logout','LoginController@logout');
Route::get('/login/nouvelleF', 'LoginController@nouvelleF');
Route::get('/login/suiviF', 'LoginController@suiviF');
Route::get('/login/modlogin', 'LoginController@modlogin');
Route::post('/login/ajoutF','LoginController@ajoutF');
Route::post('/login/condition','LoginController@condition');
Route::get('/login/date/{debut}/{fin}', 'FactureController@date');

Route::get('/login/dossier/{num_dossier}', 'FactureController@dossier');
Route::get('/login/client/{nom_client}', 'FactureController@client');
Route::get('/login/adresse/{adresse}', 'FactureController@adresse');
Route::get('/login/commune/{commune}', 'FactureController@commune');
Route::get('/login/ht/{montant_ht}', 'FactureController@ht');
Route::get('/login/tva/{tav}','FactureController@tva');
Route::get('/login/ttc/{montant_ttc}', 'FactureController@ttc');
Route::get('/login/total', 'FactureController@total');