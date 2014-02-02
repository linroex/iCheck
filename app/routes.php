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

Route::get('/', function()
{
	return View::make('index');
});
Route::get('/me',function(){
    return View::make('user');
});

Route::get('/search',function(){
    return View::make('search');
});
Route::group(array('prefix'=>'namelist'),function(){
    Route::get('create',function(){
        return View::make('create_namelist');
    });
    Route::get('view',function(){
        return View::make('view_namelist');
    });
    Route::get('edit',function(){
        return View::make('edit_namelist');
    });
    Route::get('edit/member',function(){
        return View::make('edit_namelist_member_data');
    });
});
Route::group(array('prefix'=>'activity'),function(){
    Route::get('check',function(){
        return View::make('activity_check');
    });
    Route::get('create',function(){
        return View::make('create_activity');
    });
    Route::get('view',function(){
        return View::make('view_activity');
    });
    Route::get('edit',function(){
        return View::make('edit_activity');
    });
    Route::get('view/detail',function(){
        return View::make('view_activity_detail');
    });
});
Route::group(array('prefix'=>'equip'),function(){
    Route::get('history',function(){
        return View::make('history_equipment');
    });
    Route::get('borrow',function(){
        return View::make('borrow_equipment');
    });
});
Route::group(array('prefix'=>'user'),function(){
    Route::get('create',function(){
        return View::make('create_user');
    });
    Route::post('create',array('before'=>'csrf','uses'=>'UserController@addUser'));
    Route::get('edit/{uid}','UserController@getUserData');
    Route::post('edit/{uid}',array('before'=>'csrf','uses'=>'UserController@editUser'));
    Route::get('view','UserController@viewUser');
});
Route::any('test','UserController@test');
// Route::post('test','UserController@test');

App::missing(function($exception)
{
    return Response::view('404', array(), 404);
});