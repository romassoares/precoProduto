<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

    Route::put('produto/{id}/altera-ingredient', 'ProductIngredientsController@update')->name('produtoIngrediente.update');
    Route::delete('produto/{id}/remove-ingredient', 'ProductIngredientsController@remove')->name('produtoIngrediente.remove');
    Route::put('produto/{id}/restaura-ingredient', 'ProductIngredientsController@restore')->name('produtoIngrediente.restore');
    Route::get('/{id}/quantidade-ingrediente/{ing}', 'ProductIngredientsController@Qnt')->name('proIngQnt.qnt');
    Route::put('produto/{id}/qnt', 'ProductIngredientsController@addQnt')->name('produtoIngrediente.addQnt');

    Route::get('/relatorio', 'ReportController@index')->name('relatorio');

    // produto
    Route::group(['prefix' => '/cliente'], function () {
        Route::get('', 'ClientController@index')->name('cliente');
        Route::get('/novo', 'ClientController@create')->name('cliente.create');
        Route::post('/salvar', 'ClientController@store')->name('cliente.store');
        Route::get('/{id}', 'ClientController@show')->name('cliente.show');
        Route::get('/{id}/editar', 'ClientController@edit')->name('cliente.edit');
        Route::put('/{id}/altera', 'ClientController@update')->name('cliente.update');
        Route::delete('/{id}/remove', 'ClientController@remove')->name('cliente.remove');
        Route::put('/{id}/restaura', 'ClientController@restore')->name('cliente.restore');
    });
});
