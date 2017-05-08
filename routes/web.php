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
    if (Auth::user()) {
    	return redirect('/home');
    } 
    else {
    	return view('auth.login');
    }
});

// Notebook Routes
Route::get('notebook/create', ['as' => 'notebook.create','uses' => 'NotebookController@create']);
Route::post('notebook/store', ['as' => 'notebook.store','uses' => 'NotebookController@store']);
Route::delete('notebook/{id}', ['as' => 'notebook.destroy', 'uses' => 'NotebookController@destroy']);
Route::get('notebook/{id}/edit', ['as' => 'notebook.edit', 'uses' => 'NotebookController@edit']);
Route::put('notebook/{id}', ['as' => 'notebook.update','uses' => 'NotebookController@update']);
Route::get('notebook/{id}/show', ['as' => 'notebook.show', 'uses' => 'NotebookController@show']);
 
// Notes Routes
Route::get('notebook/{id}/note/create', ['as' => 'note.create', 'uses' => 'NotesController@create']);
Route::post('notebook/{id}/note/store', ['as' => 'note.store', 'uses' => 'NotesController@store']);
Route::delete('notebook/{id}/note/{note_id}', ['as' => 'note.destroy', 'uses' => 'NotesController@destroy']);
Route::get('notebook/{id}/note/{note_id}/edit',['as' => 'note.edit', 'uses' => 'NotesController@edit']);
Route::put('notebook/{id}/note/{note_id}/update', ['as' => 'note.update', 'uses' => 'NotesController@update']);

Auth::routes();

Route::get('/home', ['as' => 'notebook.index', 'uses' => 'NotebookController@index']);
