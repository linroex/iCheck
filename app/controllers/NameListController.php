<?php
class NameListController extends Controller{
    public function test(){
        dd(Namelist::getNameList());
    }

    public function createNameList(){
        if(Input::hasfile('upload_namelist_file')){
            DB::beginTransaction();
            $namelist = Namelist::addNameList(Input::get('namelist_name'),Input::get('namelist_desc'));
            if(is_object($namelist)){
                DB::rollback();
                return Redirect::to('namelist/create')->with(array(
                    'message'=>$namelist
                ));
            }else{
                $list_member = ListMember::addMembersToList($namelist, Input::file('upload_namelist_file')->getRealPath());
                if(is_object($list_member)){
                    DB::rollback();
                    return Redirect::to('namelist/create')->with(array(
                        'message'=>$list_member
                    ));
                }else{
                    DB::commit();
                    return Redirect::to('namelist/view')->with(array(
                        'message'=>'名冊建立成功'
                    ));
                }
            }
        }else{
            return Redirect::to('namelist/create')->with(array(
                'message'=>'請上傳名冊檔案'
            ));
        }
    }

    public function getNameList($page = 1){
        return View::make('view_namelist')->with(array(
            'namelist'=>Namelist::getNameList($page),
            'pagenum'=>Namelist::getNameListPageNum(),
            'current_page'=>$page
        ));
    }
    public function delNameList(){
        Namelist::delNameList(Input::get('nid'));
        if(Input::has('_token')){
            return Redirect::to('namelist/view')->with(array(
                'message'=>'已刪除該名冊'
            ));
        }else{
            return 1;

        }
    }
    public function viewNameListData($nid, $page = 1){
        return View::make('edit_namelist')->with(array(
            'data'=>Namelist::getNameListData($nid),
            'member'=>ListMember::getMemberList($nid, $page),
            'pagenum'=>ListMember::getMemberListPage($nid),
            'current_page'=>$page
        ));
    }
    public function editNameList(){
        if(is_int(Namelist::editNameList(Input::get('nid'), Input::get('namelist_name'), Input::get('namelist_desc')))){
            return '名冊基本資料編輯成功';
        }else{
            return '錯誤，請檢查您填寫的資料';

        }
    }
    public function deleteMember(){
        if(Input::has('nmid')){
            foreach (Input::get('nmid') as $row) {
                $id = explode(',', $row);
                ListMember::deleteMember($id[0]);
            }
            return 1;
        }else{
            return 'No input';
        }
    }
    public function export(){
        $excel = new Excel('人員名冊','校園RFID系統','人員名冊');
        $data = array();
        $get_column = array('name','student_id','department','job','phone','email');
        $data = ListMember::whereRaw('nid = ? and uid = ?',array(Input::get('nid'),Login::getUid()))->get($get_column)->toArray();
        $excel->makeXLS(array(
            '姓名',
            '學號',
            '科系',
            '職務',
            '電話',
            '信箱'
            ),$data);
        $excel->download();
        $excel = NULL;
    }
}