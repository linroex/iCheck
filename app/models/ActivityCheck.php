<?php
class ActivityCheck extends Eloquent{
    protected $table = 'activity_check';
    protected $guarded = array('cid');
    public $primaryKey = 'cid';
    public $timestamps = false;

    public static function checkData($data){
        return Validator::make($data,array(
            'student_id'=>'required',
            'aid'=>'required | exists:activity',
        ));

    }
    
    public static function checkPremission($aid, $student_id = ''){
        $result = DB::select('select activity_type, count(name) count from namelist_member join activity on activity.nid = namelist_member.nid where activity.aid = ? and namelist_member.student_id = ?',array($aid, $student_id));

        if($result[0]->activity_type == 'strict_check' && $result[0]->count == 0){
            return false;
        }else{
            return true;
        }
        
    }
    public static function getCheckinHistory($aid, $page = 1, $num = 20){
        if(Activity::checkActivityExist($aid)){
            $activity = Activity::getActivityData($aid);
            if($page == 'all'){
                return DB::select('select distinct(contrast.student_id) ,contrast.name,contrast.department,checkin.check_time from activity_check as checkin join contrast contrast on contrast.student_id = checkin.student_id where checkin.aid = ? and checkin.uid = ? order by checkin.check_time desc',array($aid, Login::getUid()));
            }else{
                return DB::select('select distinct(contrast.student_id) ,contrast.name,contrast.department,checkin.check_time from activity_check as checkin join contrast contrast on contrast.student_id = checkin.student_id where checkin.aid = ? and checkin.uid = ? order by checkin.check_time desc limit ?,?',array($aid, Login::getUid(), ($page-1)*$num, $num));
            }
        }else{
            return App::abort(404);
        }
    }
    public static function getCheckinHistoryPageNum($aid, $num = 20){
        if(Activity::checkActivityExist($aid)){
            return ceil(self::whereRaw('aid = ? and uid = ?',array($aid, Login::getUid()))->orderby('check_time','DESC')->count()/$num);
        }else{
            return App::abort(404);
        }
    }
    public static function getTotalNum($aid){
        return self::whereRaw('aid = ? and uid = ?',array($aid, Login::getUid()))->count();
    }
    public static function getCheckinGroupNum($aid){
        return DB::select('select count(cid) num,cast(check_time as date) date FROM activity_check where aid = ? and uid = ? group by cast(check_time as date)',array($aid, Login::getUid()));
    }
    public static function checkinExist($aid, $student_id){
        return self::whereRaw('aid = ? and student_id = ? and uid = ?',array($aid, $student_id, Login::getUid()))->count();
    }
    public static function checkinActivity($aid, $student_id){
        $type = Activity::getActivityType($aid);
        $student_data = Contrast::getStudentData($student_id);

        if($type == 'strict_check'){
            if(!self::checkPremission($aid, $student_id)){
                return '資格不符合，簽到失敗';
            }else{
                if(self::checkinExist($aid, $student_id) >= 1){
                    return "已簽到";
                }

                self::create(array(
                    'aid'=>$aid,
                    'student_id'=>$student_id,
                    'check_time'=>date('Y/m/d H:i:s',time()),
                    'uid'=>Login::getUid()
                ));

                return json_encode(array('student_id'=>$student_id,'message'=>'簽到成功','name'=>$student_data['name'],'department'=>$student_data['department']));
            }
        }
        if(!self::checkData(array('aid'=>$aid,'student_id'=>$student_id))->fails()){
            if(self::checkinExist($aid, $student_id) >= 1){
                return "已簽到";
            }
            self::create(array(
                'aid'=>$aid,
                'student_id'=>$student_id,
                'check_time'=>date('Y/m/d H:i:s',time()),
                'uid'=>Login::getUid()
            ));
            if($type == 'no_check'){
                return $student_data['name'];
            }else{
                if(self::checkPremission($aid, $student_id)){
                    $memberdata = ListMember::getMemberDataByStudentID($aid, $student_id);
                    return json_encode($memberdata);
                }else{
                    return json_encode(array(
                        'student_id'=>$student_id,
                        'message'=>$student_data['name'] . '已簽到(未報名)',
                        'name'=>$student_data['name'],
                        'department'=>$student_data['department']
                    ));
                }
            }
        }else{
            return App::abort(404);
        }
        
    }
}