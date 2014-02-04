<?php
class EquipController extends Controller{
    public function getNotReturnEquipList(){
        return (Equip::getNotReturnEquipList(Input::get('student_id')));
        
    }
    public function borrowEquip(){
        $data = '';
        for($i=0;$i<count(Input::get('equip_name'));$i++){
            if(Input::get('equip_name')[$i] == ''){
                break;
            }
            $info = Equip::borrowEquip(Input::get('student_id'),Input::get('equip_name')[$i],Input::get('return_date')[$i]);
            if(is_int($info) === true){
                $data .= "第" . ($i+1) . "項借用登記成功<br/>";
            }else{
                $data .= "第" . ($i+1) . "項錯誤：預計歸還時間不可早於借出時間<br/>";
            }
        }
        return $data;
    }
    public function setRecordReturned(){
        foreach (Input::get('bid') as $bid) {
            Equip::setRecordReturned($bid);
        }
        return '已設定為歸還';
    }

}