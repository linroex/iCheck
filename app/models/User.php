<?php

class User extends Eloquent{
    protected $table = 'user';
    protected $guarded = array('uid');
    public $primaryKey = 'uid';
    
    public static function validator($data){
        $validator_return = Validator::make($data,array(
            'username'=>'required | min:3 | max:20 | unique:user',
            'password'=>'required | min:8 | max:64 | confirmed',
            'password_confirmation'=>'required',
            'name'=>'required',
            'email'=>'required | email | unique:user',
            'department'=>'required',
            'type'=>'required'
        ));

        if($validator_return->fails()){
            return $validator_return->messages();
        }else{
            return true;
        }
    }
    public static function validator_edit_user($data){
        $validator_return = Validator::make($data,array(
            'name'=>'required',
            'email'=>'required | email',
            'department'=>'required',
            'type'=>'required'
        ));

        if($validator_return->fails()){
            return $validator_return->messages();
        }else{
            return true;
        }
    }
    public static function validator_edit_me($data){
        $validator_return = Validator::make($data,array(
            'username'=>'required | min:3 | max:20',
            'name'=>'required',
            'email'=>'required | email'
        ));

        if($validator_return->fails()){
            return $validator_return->messages();
        }else{
            return true;
        }
    }
    public static function addUser($data){
        $check = self::validator($data);
        if($check === true){
            $user = self::create(array(
                'username'=>$data['username'],
                'password'=>Hash::make($data['password']),
                'name'=>$data['name'],
                'email'=>$data['email'],
                'department'=>$data['department'],
                'created_at'=>time(),
                'updated_at'=>time(),
                'type'=>$data['type']
            ));
            return $user->uid;
        }else{
            return $check;
        }
        
    }
    public static function deleteUser($uid){
        return self::destroy($uid);
    }
    public static function getUserList(){
        return self::all();
    }
    public static function getUserData($uid){
        $data = self::find($uid);
        if($data === null){
            return false;
        }else{
            return $data;    
        }
        
    }
    public static function editUser($uid, $data){

        $check = self::validator_edit_user($data);
        if($check === true){
            $user = self::find($uid);
            if($user === null){
                return false;
            }else{

                return self::find($uid)->update(array(
                    'name'=>$data['name'],
                    'department'=>$data['department'],
                    'email'=>$data['email'],
                    'type'=>$data['type']
                ));

            }
        }else{
            return $check;
        }
    }
    public static function editMe($data){
        $uid = Login::getUid();
        $check = self::validator_edit_me($data);
        if($check === true){
            $user = self::find($uid);
            if($user === null){
                return false;
            }else{

                return self::find($uid)->update(array(
                    'name'=>$data['name'],
                    'email'=>$data['email']
                ));

            }
        }else{
            return $check;
        }
    }
    public static function editUserPasswd($uid, $passwd){
        $validator_return = Validator::make(array(
            'password'=>$passwd
        ),array(
            'password'=>'required | min:8 | max:64',
        ));

        if($validator_return->fails()){
            return $validator_return->messages();
        }else{
            return self::find($uid)->update(array(
                'password'=>Hash::make($passwd)
            ));
        }
    }

    public static function getUidByUsername($username){
        $user = self::where('username','=',$username)->first()->get()->toArray();
        return $user[0]['uid'];
    }
    public static function login($username, $password){
        $user_data = self::where('username','=',$username)->first();
        if($user_data !== null){
            if(!Hash::check($password, $user_data->password)){
                return false;
            }else{
                DB::insert('insert into login_history(uid, login_os, login_ip, login_time) values (?, ?, ?, ?)',array(
                    self::getUidByUsername($username),
                    Request::server('HTTP_USER_AGENT'),
                    Request::server('REMOTE_ADDR'),
                    date('Y/m/d H:i:s',time())
                ));
                
                return $user_data;
            }
        }else{
            return $user_data;
        }
        
    }

}

