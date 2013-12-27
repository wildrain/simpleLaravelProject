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

/*Route::controller('pages','PagesController');*/

Route::get('names/search/{letter}',function($letter){

	return Person::byFirstLetter($letter)->lists('name');
});

Route::get('names/show/{id}','NamesController@getShow');
Route::controller('names','NamesController');




/*Route::get('hello', function()
{
	$name = DB::table('people')->pluck('name'); 
	return View::make('hello')->with('namea',$name);
}); */