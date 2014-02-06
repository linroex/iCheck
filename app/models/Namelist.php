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
            'namelist_desc'=>''
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
        if($num == 'all'){
            return self::where('uid','=',Login::getUid())->get();
        }else{
            return self::where('uid','=',Login::getUid())->orderBy('created_at','DESC')->take($num)->skip(($page-1)*$num)->get();    
        }
        
    }
    public static function getNameListArray(){
        $namelist_key = array('not_use');
        $namelist_value = array('不使用名條');
        foreach (self::getNameList('*','all') as $row) {
            array_push($namelist_key, $row->nid);
            array_push($namelist_value, $row->namelist_name);
        }
        $namelist = array_combine($namelist_key, $namelist_value);
        return $namelist;
    }
    public static function getNameListPageNum($num = 20){
        return ceil(self::where('uid','=',Login::getUid())->orderBy('created_at','DESC')->count()/$num);
    }
    public static function getNameListData($nid){
        return self::whereRaw('nid = ? and uid = ?',array($nid, Login::getUid()))->get()->toArray();
    }
    public static function editNameList($nid, $name, $desc = ''){
        $check = Validator::make(array(
            'nid'=>$nid,
            'namelist_name'=>$name,
            'namelist_desc'=>$desc
        ),array(
            'nid'=>'required | exists:namelist',
            'namelist_name'=>'required',
            'namelist_desc'=>''
        ));
        if($check->fails()){
            return $check->messages();
        }else{
            return self::whereRaw('nid = ? and uid = ?',array($nid, Login::getUid()))->update(array(
                'namelist_name'=>$name,
                'namelist_desc'=>$desc
            ));    
        }
        
    }
    public static function convertNidToName($nid){
        $namelist = self::whereRaw('nid = ? and uid = ?',array($nid, Login::getUid()))->first();
        if(is_null($namelist)){
            return 'not found nid';
        }else{
            return $namelist->namelist_name;
        }
    }
    public static function checkNidRelateUid($nid){
        $namelist =  self::where('nid','=',$nid)->first();
        if(is_null($namelist)){
            return 'not found nid';
        }else{
            return $namelist->uid;    
        }
        
    }
}