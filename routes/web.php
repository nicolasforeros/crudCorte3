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
    return redirect()->route('paper.index');
});

Auth::routes();

Route::resource('user', 'UserController');
Route::resource('categorie', 'CategorieController');
Route::resource('paper', 'PaperController');

Route::get('/user/{user}/paper', 'UserController@showPapers')->name('user.paper');

Route::get('paper/{paper}/download', 'PaperController@downloadPaper')->name('paper.download');