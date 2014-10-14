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
Route::get('login', function()
{
    if(Session::has('user_data')){
        return Redirect::to('/');
    }else{
        return View::make('login');

    }
});
Route::post('login',array('before'=>'csrf','uses'=>'UserController@login'));
Route::get('logout','UserController@logout');

Route::group(array('before'=>'auth'),function(){
    Route::get('/', 'IndexController@showIndex');

    Route::get('/me',function(){
        return View::make('user');
    });


    Route::get('/search',function(){
        return View::make('search');
    });

    Route::group(array('before'=>'csrf'),function(){
        Route::post('/me','UserController@editMe');
    });

    Route::group(array('prefix'=>'namelist'),function(){
        Route::get('create',function(){
            return View::make('create_namelist');
        });
        Route::get('view/{page?}','NameListController@getNameList');
    
        // 此路由順序必須放前面，因為下面會讀取變數
        Route::get('edit/member/{nmid}','NameListController@viewMemberData');
        Route::get('edit/{nid}/{page?}','NameListController@viewNameListData');
        
        Route::post('delete','NameListController@delNameList');
        Route::group(array('before'=>'csrf'),function(){
            Route::post('create','NameListController@createNameList');
            Route::post('edit','NameListController@editNameList');
            Route::post('member/delete','NameListController@deleteMember');
            Route::post('export','NameListController@export');
            Route::post('edit/member/{nmid}','NameListController@editMemberData');
        });
    });
    Route::group(array('prefix'=>'activity'),function(){
        Route::get('check/{aid?}','ActivityController@viewActivityCheck');
        Route::get('create','ActivityController@viewCreateActivity');
        Route::get('view/{page?}','ActivityController@viewActivity');
        Route::get('edit/{aid}','ActivityController@viewEditActivity');
        Route::get('detail/{aid}/{page?}','ActivityController@viewCheckinHistory');
        Route::post('data','ActivityController@getActivityData');
        Route::post('export','ActivityController@export');
        Route::group(array('before'=>'csrf'),function(){
            Route::post('create','ActivityController@createActivity');
            Route::post('delete','ActivityController@deleteActivity');
            Route::post('edit/{aid}','ActivityController@editActivity');
            Route::post('check','ActivityController@checkinActivity');
        });
    });
    Route::group(array('prefix'=>'equip'),function(){
        Route::get('history','EquipController@viewRecordList');
        Route::get('borrow',function(){
            return View::make('borrow_equipment');
        });
        Route::post('return/not','EquipController@getNotReturnEquipList');
        Route::post('history/count','EquipController@getPageNum');
        Route::post('history','EquipController@getRecordList');
        Route::post('export','EquipController@export');
        Route::group(array('before'=>'csrf'),function(){
            Route::post('borrow','EquipController@borrowEquip');
            Route::post('return','EquipController@setRecordReturned');
        });
    });
    Route::group(array('prefix'=>'user','before'=>'isAdmin'),function(){
        Route::get('create',function(){
            return View::make('create_user');
        });
        Route::group(array('befroe'=>'csrf'),function(){
            Route::post('create','UserController@addUser');
            Route::post('edit/{uid}','UserController@editUser');

        });
        Route::post('delete','UserController@deleteUser');
        Route::get('edit/{uid}','UserController@getUserData');
        Route::get('view','UserController@viewUser');
    });
});

App::missing(function($exception)
{
    return Response::view('404', array(), 404);
});