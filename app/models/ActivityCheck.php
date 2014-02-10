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
                $data = json_decode(ListMember::getMemberDataByStudentID($aid, $student_id));
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