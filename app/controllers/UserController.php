<?php
class UserController extends Controller{
    public function test(){
        
    }
    public function addUser(){
        $return = User::addUser(Input::all());
        if(is_int($return) === true){
            return Redirect::to('/user/view')->with(array(
                'username'=>Input::get('username'),
                'message'=>'帳號建立成功'
            ));    
        }else{

            return Redirect::to('/user/create')->with(array(
                'data'=>Input::all(),
                'message'=>$return
            ));    
        }
        
    }
    public function viewUser(){

        return View::make('view_user',array('data'=>User::getUserList()));
    }
    public function getUserData($uid){
        $data = User::getUserData($uid);
        if($data === false){
            App::abort(404);
        }else{
            return View::make('edit_user',array('user_data'=>$data));
            
        }
        
    }
    public function editUser($uid){
        if(Input::has('password')){
            if(Input::get('password')==Input::get('password_confirmation')){
                $data = User::editUserPasswd($uid,Input::get('password'));
                if(is_object($data) === true){
                    return Redirect::to('/user/edit/' . $uid)->with(array('message'=>$data));
                }else{
                    return Redirect::to('/user/view')->with(array('message'=>'密碼變更成功'));
                }
            }else{
                return Redirect::to('/user/edit/' . $uid)->with(array('message'=>'兩次密碼輸入不同'));
            }
        }else{
            $data = User::editUser($uid,Input::all());

            if($data === false){
                App::abort(404);
            }else{
                return Redirect::to('/user/view')->with(array('message'=>'用戶資料變更成功'));
            }
        }
        
    }
    public function login(){
        $return = User::login(Input::get('username'),Input::get('password'));
        if($return === false){
            return Redirect::to('login')->with(array('message'=>'密碼錯誤'));
        }elseif($return === null){
            return Redirect::to('login')->with(array('message'=>'帳號不存在'));
        }else{
            Session::put('user_data',$return);
            return Redirect::to('/');
        }
        
    }
    public function logout(){
        Session::flush();
        return Redirect::to('login');
    }
}