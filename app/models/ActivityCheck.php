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
        $result = DB::select('select count(name) count from namelist_member join activity where activity.aid = ? and namelist_member.student_id = ?',array($aid, $student_id));

        if($result[0]->count == 0){
            return false;
        }else{
            return true;
        }
        
    }
    public static function getCheckinHistory($aid, $page = 1, $num = 20){
        if(Activity::checkActivityExist($aid)){
            if($page == 'all'){
                $activity = Activity::getActivityData($aid);
                if($activity->activity_type == 'no_check'){
                    return self::whereRaw('aid = ? and uid = ?',array($aid, Login::getUid()))->orderby('check_time','DESC')->get(array('student_id','check_time'))->toArray();
                }else{
                    return DB::select('select distinct(member.student_id) ,member.name,member.department,member.job,checkin.check_time from activity_check as checkin join namelist_member member where member.nid = ? and checkin.aid = ? and checkin.uid = ? order by checkin.check_time desc',array($activity->nid, $aid, Login::getUid()));
                }
            }else{
                $activity = Activity::getActivityData($aid);
                if($activity->activity_type == 'no_check'){
                    return self::whereRaw('aid = ? and uid = ?',array($aid, Login::getUid()))->orderby('check_time','DESC')->take($num)->skip(($page-1)*$num)->get();
                }else{
                    return DB::select('select distinct(member.student_id) ,member.name,member.department,member.job,checkin.check_time from activity_check as checkin join namelist_member member where member.nid = ? and checkin.aid = ? and checkin.uid = ? order by checkin.check_time desc limit ?,?',array($activity->nid, $aid, Login::getUid(), ($page-1)*$num, $num));
                }
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
    public static function checkinActivity($aid, $student_id){
        $type = Activity::getActivityType($aid);
        
        if($type == 'strict_check'){
            if(!self::checkPremission($aid, $student_id)){
                return '資格不符合，簽到失敗';
            }else{

                self::create(array(
                    'aid'=>$aid,
                    'student_id'=>$student_id,
                    'check_time'=>date('Y/m/d H:i:s',time()),
                    'uid'=>Login::getUid()
                ));
                $data = ListMember::getMemberDataByStudentID($aid, $student_id);

                return json_encode(array('student_id'=>$student_id,'message'=>'簽到成功','name'=>$data->name,'department'=>$data->department,'job'=>$data->job));
            }
        }
        if(!self::checkData(array('aid'=>$aid,'student_id'=>$student_id))->fails()){
            self::create(array(
                'aid'=>$aid,
                'student_id'=>$student_id,
                'check_time'=>date('Y/m/d H:i:s',time()),
                'uid'=>Login::getUid()
            ));
            if($type == 'no_check'){
                return $student_id;
            }else{
                if(self::checkPremission($aid, $student_id)){
                    $memberdata = ListMember::getMemberDataByStudentID($aid, $student_id);
                    return json_encode($memberdata);
                }else{
                    return json_encode(array(
                        'student_id'=>$student_id,
                        'message'=>$student_id . '來賓已簽到，未報名',
                        'name'=>'未報名',
                        'department'=>'未報名',
                        'job'=>'未報名'
                    ));
                }
            }
        }else{
            return App::abort(404);
        }
        
    }
}