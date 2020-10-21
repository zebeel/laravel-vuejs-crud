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
    return view('index');
});

Route::get('/get-all-notes', 'App\Http\Controllers\NoteController@getAllNotes')->name('get-all-note');
Route::get('/delete-note/{id}', 'App\Http\Controllers\NoteController@deleteNote')->name('delete-note');
Route::post('/upsert-note', 'App\Http\Controllers\NoteController@upsertNote')->name('upsert-note');
Route::post('/edit-note/{id}', 'App\Http\Controllers\NoteController@editNote')->name('edit-note');
