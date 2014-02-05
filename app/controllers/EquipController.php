<?php
class EquipController extends Controller{
    public function getNotReturnEquipList(){
        return (Equip::getNotReturnEquipList(Input::get('student_id')));
        
    }
    public function borrowEquip(){
        $data = '';
        for($i=0;$i<count(Input::get('equip_name'));$i++){
            if(trim(Input::get('equip_name')[$i]) == ''){
                $data .= "第" . ($i+1) . "項錯誤：器材名稱為必填";
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
    public function viewRecordList(){

        return View::make('history_equipment')
                ->with('pagenum',array(
                    'not_return'=>Equip::getRecordListPageCount('not_return'),
                    'returned'=>Equip::getRecordListPageCount('returned'), 
                    'be_lated'=>Equip::getRecordListPageCount('be_lated')
                    ))
                ->with('content',array(
                    'not_return'=>Equip::getRecordList('not_return'), 
                    'returned'=>Equip::getRecordList('returned'), 
                    'be_lated'=>Equip::getRecordList('be_lated')
                    ));

    }
    public function getPageNum(){
        return Equip::getRecordListPageCount(Input::get('type'), Input::get('month'));
    }
    public function getRecordList(){
        return Equip::getRecordList(Input::get('type'), Input::get('month'),Input::get('page'));
    }
    public function export(){
        $excel = new Excel('設備清單','校園RFID系統','設備清單');
        $data = array();
        $get_column = array('bid','student_id','equip_name','borrow_time','estimate_return_time','return_time');
        if(Input::get('type') == 'not_return'){
            if(Input::get('month') == 'all'){
                $data = Equip::whereRaw('return_time is null')->get($get_column)->toArray();

            }else{
                $data = Equip::whereRaw('return_time is null and month(borrow_time)=?',array(Input::get('month')))->get($get_column)->toArray();

            }
        }else{
            if(Input::get('month') == 'all'){
                $data = Equip::whereRaw('type = ?',array(Input::get('type')))->get($get_column)->toArray();
            }else{
                $data = Equip::whereRaw('type = ? and month(borrow_time)=?',array(Input::get('type'),Input::get('month')))->get($get_column)->toArray();
            }
        }
        $excel->makeXLS(array(
            '編號',
            '學號',
            '器材名稱',
            '借出時間',
            '預計歸還時間',
            '實際歸還時間'
            ),$data);
        $excel->download();
        $excel = NULL;

    }
    public function test(){
    }
}