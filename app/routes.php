<?php


// API ROUTES ==================================
Route::group(array('prefix' => 'api'), function() {

	// since we will be using this just for CRUD, we won't need create and edit
	// Angular will handle both of those forms
	// this ensures that a user can't access api/create or api/edit when there's nothing there
	Route::post('battles/{id}/action', 'BattleController@takeAction');

	Route::resource('battles', 'BattleController',
		array('only' => array('index', 'store', 'show')));

	Route::resource('fighters', 'FighterController',
		array('only' => array('index', 'store', 'show')));

	Route::resource('users', 'UserController',
		array('only' => array('index', 'store', 'show')));

});

// CATCH ALL ROUTE =============================
// all routes that are not home or api will be redirected to the frontend
// this allows angular to route them
App::missing(function($exception) {
	return View::make('index');
});