<?php

use App\Http\Controllers\HomeController;
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
    return view('welcome');
});

Auth::routes();
Route::middleware('auth')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/produto', 'ProductController@index')->name('produto');
    Route::get('/produto/novo', 'ProductController@create')->name('produto.create');
    Route::post('/produto/salvar', 'ProductController@store')->name('produto.store');

    // Ingredient
    Route::get('/ingrediente', 'IngredientController@index')->name('ingrediente');
    Route::get('/relatorio', 'ReportController@index')->name('relatorio');
});
