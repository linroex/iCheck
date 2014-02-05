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

}
/*
    
*/