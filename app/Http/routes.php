<?php

use App\Story;

get('api/story',function(){
	return Story::all();
});

Route::get('/',['as'=>'home','uses'=>'HomeController@index']);
get('login',['as'=>'user.login','uses'=>'UserController@getLogin']);
post('login',['as'=>'user.postLogin','uses'=>'UserController@postLogin']);
get('user/{username}/{slug}',['as'=>'user.story','uses'=>'UserController@story']);

Route::group(['middleware'=>'auth'],function(){
	Route::resource('user','UserController');
	Route::get('user/{username}/settings',['as'=>'user.setting','uses'=>'UserController@getSetting']);
	get('p/new-post',['as'=>'user.newStory','uses'=>'UserController@newStory']);
	post('p/new-post',['as'=>'user.storeStory','uses'=>'UserController@storeStory']);
});
