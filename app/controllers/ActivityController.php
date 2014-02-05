<?php
class ActivityController extends Controller{
    public function createActivity(){
        $activity = Activity::createActivity(Input::all());
        if(is_object($activity)){
            return Redirect::to('activity/create')->with(array(
                'message'=>$activity,
                'old_data'=>Input::all()
            ));
        }elseif(is_int($activity)){
            return Redirect::to('activity/view')->with(array(
                'message'=>Input::get('activity_name') . ' 新增完成'
            ));
        }else{
            return Redirect::to('activity/create')->with(array(
                'message'=>$activity,
                'old_data'=>Input::all()
            ));
        }
    }
    public function viewActivity(){
        $namelist_key = array('not_use');
        $namelist_value = array('不使用名條');
        foreach (Namelist::getNameList('*','all') as $row) {
            array_push($namelist_key, $row->nid);
            array_push($namelist_value, $row->namelist_name);
        }
        $namelist = array_combine($namelist_key, $namelist_value);
        return View::make('create_activity')->with(array(
            'namelist'=>$namelist
        ));
    }
    public function test(){

    }
}