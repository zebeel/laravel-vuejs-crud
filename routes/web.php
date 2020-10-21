<?php

use App\Http\Controllers\NoteController;
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

Route::get('/get-all-notes', [NoteController::class, 'getAllNotes'])->name('get-all-note');
Route::get('/delete-note/{id}', [NoteController::class, 'deleteNote'])->name('delete-note');
Route::post('/upsert-note', [NoteController::class, 'upsertNote'])->name('upsert-note');
