<?php

class user extends Eloquent{
    protected $table = 'user';
    protected $guarded = array('');
    
    public $primaryKey = 'uid';
    
    static function addUser(){
        self::create(array(
            'username'=>'linroex',
            'password'=>'123456789',
            'name'=>'林熙哲',
            'email'=>'linroex@coder.tw',
            'department'=>'學生會',
            'created_at'=>time(),
            'updated_at'=>time(),
            'type'=>'admin'
        ));
        
    }
}

