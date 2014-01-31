<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function () {
	return View::make('index');
});

Route::get('products', function () {
	return Product::all();
});

Route::post('products', function () {
	// update
	if (Input::has('id')) {
		$product = Product::find(Input::get('id'));
		$product->update(Input::all());
		return $product;
	}
	// create
	else {
		return Product::create(Input::all());
	}
});

Route::post('product/delete', function () {
	if (Input::has('id')) {
		Product::find(Input::get('id'))->delete();
	}
});

