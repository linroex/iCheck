<?php
class Equip extends Eloquent{
    protected $table = 'equip_history';
    protected $guarded = array('bid');
    public $primaryKey = 'student_id';
    /*
        已歸還 = returned
        未歸還 = not_return
        已逾期 = be_lated
    */
    public static function getNotReturnEquipList($student_id){
        $data = self::find($student_id);
        if($data === null){
            return 'false';
        }else{
            $data = $data->whereRaw('type = \'not_return\' and uid = ?',array(Login::getUid()))->get();
            if($data->count() == 0){
                return 'false';
            }else{
                return $data->toJson();    
            }
            
        }
        
    }
}