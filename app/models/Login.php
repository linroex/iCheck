<?php
class Login extends Eloquent{
    protected $table = 'login_history';
    protected $guarded = array('uid');
    public $primaryKey = 'uid';

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
    public static function getAllRecentLoginHistory(){
        return DB::table('login_history')->join('user','login_history.uid','=','user.uid')->select(['login_ip','name','login_time'])->orderBy('login_time','DESC')->limit(10)->get();
    }
}
