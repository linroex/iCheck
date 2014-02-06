<?php
class Activity extends Eloquent{
    protected $table = 'activity';
    protected $guarded = array('aid','created_at','updated_at');
    public $primaryKey = 'aid';
    /*
        'no_check'=>'無需身分驗證',
        'strict_check'=>'需嚴格身分驗證',
        'only_prompt'=>'僅需提示身份是否符合'

        nid = -1 代表不使用名冊
    */
    public static function checkData($data){
        $check = Validator::make($data,array(
            'activity_name'=>'required',
            'activity_desc'=>'',
            'activity_date'=>'date',
            'activity_type'=>'required',
            'nid'=>'required',
            'activity_organize'=>'',
            'activity_note'=>'',
            'enable'=>''
        ));
        return $check;
    }
    public static function createActivity($data){
        $check = self::checkData($data);
        if($check->fails()){
            return $check->messages();
        }else{
            if(Namelist::checkNidRelateUid($data['nid']) == Login::getUid() or $data['nid'] == 'not_use'){
                $data['nid'] = $data['nid']=='not_use'?-1:$data['nid'];
                if($data['activity_type'] != 'no_check' and $data['nid'] == -1){
                    return '您設定的簽到類型需使用名條';
                }
                return self::create(array(
                    'activity_name'=>$data['activity_name'],
                    'activity_desc'=>$data['activity_desc'],
                    'activity_date'=>$data['activity_date'],
                    'activity_type'=>$data['activity_type'],
                    'nid'=>$data['nid'],
                    'activity_organize'=>$data['activity_organize'],
                    'activity_note'=>$data['activity_note'],
                    'uid'=>Login::getUid(),
                    'enable'=>$data['enable']
                ))->aid;
            }else{
                return 'Not found this NameList';
            }
            
        }
    }
    public static function getAvtivityList($page = 1, $num = 20){
        return self::whereRaw('uid = ?',array(Login::getUid()))->orderBy('created_at','DESC')->take($num)->skip(($page-1)*$num)->get();
    }
    public static function getAvtivityListPageNum($num = 20){
        return ceil(self::whereRaw('uid = ?',array(Login::getUid()))->count()/$num);
    }
    public static function checkActivityExist($aid){
        $count = self::whereRaw('aid = ? and uid = ?',array($aid, Login::getUid()))->count();
        if($count == 0){
            return False;
        }else{
            return True;
        }
    }
    public static function deleteActivity($aid){
        if(self::checkActivityExist($aid)){
            return self::whereRaw('aid = ? and uid = ?',array($aid, Login::getUid()))->delete();
        }else{
            return False;
        }
    }
}