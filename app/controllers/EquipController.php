<?php
class EquipController extends Controller{
    public function getNotReturnEquipList(){
        return (Equip::getNotReturnEquipList(Input::get('student_id')));
        
    }
}