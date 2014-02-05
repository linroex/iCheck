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
    public static function delNameList($nid){
        return self::whereRaw('nid = ? and uid = ?',array($nid, Login::getUid()))->delete();
    }
    public static function getNameList($page = 1, $num = 20){
        return self::where('uid','=',Login::getUid())->orderBy('created_at','DESC')->take($num)->skip(($page-1)*$num)->get();
    }
    public static function getNameListPageNum($num = 20){
        return ceil(self::where('uid','=',Login::getUid())->orderBy('created_at','DESC')->count()/$num);
    }
}