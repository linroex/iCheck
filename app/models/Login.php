<?php
class Login{
    public static function getUsername(){
        return Session::get('user_data')['username'];
    }
    public static function getUid(){
        return Session::get('user_data')['uid'];
    }
    public static function getName(){
        return Session::get('user_data')['name'];
    }
    public static function getType(){
        return Session::get('user_data')['type'];
    }
    public static function isLogin(){
        return (Session::has('user_data'))? true : false ;
    }
    
}
