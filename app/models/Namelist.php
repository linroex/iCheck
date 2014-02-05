<?php
class Namelist extends Eloquent{
    protected $table = 'namelist';
    protected $guarded = array('nid','created_at','updated_at');
    public $primaryKey = 'nid';

    public static function addNameList($namelist_name, $namelist_desc){
        $result = Validator::make(array(
            'namelist_name'=>$namelist_name,
            'namelist_desc'=>$namelist_desc
        ), array(
            'namelist_name'=>'required',
            'namelist_desc'=>'required'
        ));
        if($result->fails()){
            return $result->messages();
        }else{
            return self::create(array(
                'namelist_name'=>$namelist_name,
                'namelist_desc'=>$namelist_desc,
                'uid'=>Login::getUid()
            ))->nid;
        }
        

    }
}