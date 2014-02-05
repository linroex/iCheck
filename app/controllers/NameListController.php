<?php
class NameListController extends Controller{
    public function test(){
        dd(Namelist::addNamelist('測試名冊',''));
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
}