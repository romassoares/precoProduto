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

    // produto
    Route::group(['prefix' => '/produto'], function () {
        Route::get('', 'ProductController@index')->name('produto');
        Route::get('/novo', 'ProductController@create')->name('produto.create');
        Route::post('/salvar', 'ProductController@store')->name('produto.store');
        Route::get('/{id}', 'ProductController@show')->name('produto.show');
        Route::get('/{id}/editar', 'ProductController@edit')->name('produto.edit');
        Route::put('/{id}/altera', 'ProductController@update')->name('produto.update');
        Route::delete('/{id}/remove', 'ProductController@remove')->name('produto.remove');
        Route::put('/{id}/restaura', 'ProductController@restore')->name('produto.restore');
    });

    // Ingredient
    Route::group(['prefix' => '/ingrediente'], function () {
        Route::get('', 'IngredientController@index')->name('ingrediente');
        Route::get('/novo', 'IngredientController@create')->name('ingrediente.create');
        Route::post('/salvar', 'IngredientController@store')->name('ingrediente.store');
        Route::get('/{id}', 'IngredientController@show')->name('ingrediente.show');
        Route::get('/{id}/editar', 'IngredientController@edit')->name('ingrediente.edit');
        Route::put('/{id}/altera', 'IngredientController@update')->name('ingrediente.update');
        Route::delete('/{id}/remove', 'IngredientController@remove')->name('ingrediente.remove');
        Route::put('/{id}/restaura', 'IngredientController@restore')->name('ingrediente.restore');
    });

    // IngredientProduto
    Route::group([
        'prefix' => 'produto',
        'name' => 'produtoIngrediente.'
    ],function(){
        Route::post('/adcionar-ingredient', 'ProductIngredients@store')->name('store');
        Route::get('/{id}/editar-ingredient', 'ProductIngredients@edit')->name('edit');
        Route::put('/{id}/altera-ingredient', 'ProductIngredients@update')->name('update');
        Route::delete('/{id}/remove-ingredient', 'ProductIngredients@remove')->name('remove');
        Route::put('/{id}/restaura-ingredient', 'ProductIngredients@restore')->name('restore');
    });
    


    Route::get('/relatorio', 'ReportController@index')->name('relatorio');
});
