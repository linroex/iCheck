<?php
class ListMember extends Eloquent{
    protected $table = 'namelist_member';
    protected $guarded = array('nmid');
    public $primaryKey = 'nmid';
    public $timestamps = false;

    public static function addMembersToList($nid, $path){
        $excel = new Excel();
        $member_datas = $excel->readXLS($path, 6);
        foreach ($member_datas as $member_data) {
            $temp = array();
            foreach ($member_data as $block) {
                array_push($temp, $block);
            }
            $check = Validator::make(array(
                'name'=>$temp[0],
                'student_id'=>$temp[1],
                'department'=>$temp[2],
                'job'=>$temp[3],
                'phone'=>$temp[4],
                'email'=>$temp[5]
            ),array(
                'name'=>'required',
                'student_id'=>'required',
                'department'=>'',
                'job'=>'',
                'phone'=>'',
                'email'=>'email'
            ));
            if($check->fails()){
                return $check->messages();
            }else{
                self::create(array(
                    'name'=>$temp[0],
                    'student_id'=>$temp[1],
                    'department'=>$temp[2],
                    'job'=>$temp[3],
                    'phone'=>$temp[4],
                    'email'=>$temp[5],
                    'nid'=>$nid,
                    'uid'=>Login::getUid()
                ));
            }
            
        }
        $excel = NULL;
        return 1;
    }
    public static function getMemberList($nid, $page = 1, $num = 10){
        return self::whereRaw('nid = ? and uid = ?',array($nid, Login::getUid()))->take($num)->skip(($page-1)*$num)->get();
    }
    public static function getMemberListPage($nid, $num = 10){
        return ceil(self::whereRaw('nid = ? and uid = ?',array($nid, Login::getUid()))->count()/$num);
    }
    public static function deleteMember($nmid){
        return self::whereRaw('nmid = ? and uid = ?',array($nmid, Login::getUid()))->delete();
    }
    public static function getMemberData($nmid){
        return self::whereRaw('nmid = ? and uid = ?',array($nmid, Login::getUid()))->get()->toArray();
    }
    public static function editMemberData($nmid, $data){
        $check = Validator::make($data,array(
            'name'=>'required',
            'student_id'=>'required',
            'department'=>'',
            'job'=>'',
            'phone'=>'',
            'email'=>'email'
        ));
        if($check->fails()){
            return $check->messages();
        }else{
            self::whereRaw('nmid = ? and uid = ?',array($nmid, Login::getUid()))->update(array(
                'name'=>$data['name'],
                'student_id'=>$data['student_id'],
                'department'=>$data['department'],
                'job'=>$data['job'],
                'phone'=>$data['phone'],
                'email'=>$data['email']
            ));
            return $data['name'] . ' 資料編輯成功';
        }
        
    }
    public static function getMemberDataByStudentID($aid, $student_id){
        $result = DB::select('select name,student_id,department,job from namelist_member join activity where activity.aid = ? and namelist_member.student_id = ? and namelist_member.uid = ? limit 1',array($aid, $student_id, Login::getUid()));
        if(empty($result)){
            return false;
        }else{
            return ($result[0]);    
        }
        

    }
}
