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

Route::get('/dashboard', 'KaryawanController@index')->name('dashboard');
Route::get('/karyawan', 'KaryawanController@karyawan')->name('karyawan');
Route::get('/users', 'UsersController@index')->name('users');
Route::get('/absen/{id}', 'KaryawanController@detail_absen')->name('absen_detail');
Route::get('/{id}', 'KaryawanController@absen')->name('absen');
Route::post('/', 'KaryawanController@store')->name('proses_absen');
