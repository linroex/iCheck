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
    public static function getActivityList($page = 1, $num = 20){
        if($page == 'all'){
            return self::whereRaw('uid = ?',array(Login::getUid()))->orderBy('created_at','DESC')->get();
        }else{
            return self::whereRaw('uid = ?',array(Login::getUid()))->orderBy('created_at','DESC')->take($num)->skip(($page-1)*$num)->get();
        }
    }
    public static function geteEnableActivityListArray(){
        $activity_key = array('');
        $activity_value = array('');
        foreach (self::getActivityList('all') as $row) {
            if($row->enable == 1){
                array_push($activity_key, $row->aid);
                array_push($activity_value, $row->activity_name);    
            }
        }
        $activity_list = array_combine($activity_key, $activity_value);
        return $activity_list;
    }
    public static function getActivityListPageNum($num = 20){
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
    public static function getActivityData($aid){
        if(self::checkActivityExist($aid)){
            return self::whereRaw('aid = ? and uid = ?',array($aid, Login::getUid()))->first();
        }else{
            return App::abort(404);
        }
    }
    public static function editActivityData($aid, $data){
        if(self::checkActivityExist($aid)){
            $check = self::checkData($data);
            if($check->fails()){
                return $check->messages();
            }else{
                $data['nid'] = $data['nid']=='not_use'?-1:$data['nid'];
                if($data['activity_type'] != 'no_check' and $data['nid'] == -1){
                    return '您設定的簽到類型需使用名條';
                }else{
                    return self::whereRaw('aid = ? and uid = ?',array($aid, Login::getUid()))->update(array(
                        'activity_name'=>$data['activity_name'],
                        'activity_desc'=>$data['activity_desc'],
                        'activity_date'=>$data['activity_date'],
                        'activity_type'=>$data['activity_type'],
                        'nid'=>$data['nid'],
                        'activity_organize'=>$data['activity_organize'],
                        'activity_note'=>$data['activity_note'],
                        'enable'=>$data['enable']
                    ));
                }
            }
        }else{
            return App::abort(404);
        }
    }
    public static function deleteActivity($aid){
        if(self::checkActivityExist($aid)){
            return self::whereRaw('aid = ? and uid = ?',array($aid, Login::getUid()))->delete();
        }else{
            return App::abort(404);
        }
    }
}