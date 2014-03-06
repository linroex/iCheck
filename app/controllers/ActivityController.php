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
    public function viewCreateActivity(){
        
        return View::make('create_activity')->with(array(
            'namelist'=>Namelist::getNameListArray(),
            'old_activity'=>Activity::geteActivityListArray()
        ));
    }
    public function viewActivity($page = 1){
        return View::make('view_activity')->with(array(
            'data'=>Activity::getActivityList($page),
            'pagenum'=>Activity::getActivityListPageNum(),
            'current_page'=>$page
        ));
    }
    public function deleteActivity(){
        foreach (Input::get('aid') as $aid) {
            $aid = explode(',', $aid);
            if(!Activity::deleteActivity($aid[0])){
                return 'Activity not found';
            }
        }
        return 1;
    }
    public function editActivity($aid){
        $activity = Activity::editActivityData($aid, Input::all());
        if(is_object($activity) or $activity == '您設定的簽到類型需使用名條'){
            return Redirect::to('activity/edit/'.$aid)->with(array(
                'message'=>$activity
            ));
        }else{
            return Redirect::to('activity/view')->with(array(
                'message'=>'活動編輯成功'
            ));
        }
    }
    public function viewEditActivity($aid){
        return View::make('edit_activity')->with(array(
            'data'=>Activity::getActivityData($aid),
            'namelist'=>Namelist::getNameListArray()
        ));
    }
    public function checkinActivity(){
        return ActivityCheck::checkinActivity(Input::get('activity'), Input::get('student_id'));
    }
    public function getActivityData(){
        return Activity::getActivityData(Input::get('aid'))->toJson();
    }
    public function viewActivityCheck($aid = ''){
        return View::make('activity_check')->with(array(
            'activity_list'=>Activity::geteEnableActivityListArray(),
            'default'=>($aid == ''?null:Activity::getActivityData($aid)->aid),
            'default_data'=>($aid == ''?null:Activity::getActivityData($aid))
        ));
    }
    public function viewCheckinHistory($aid = '',$page = 1){
        return View::make('view_activity_detail')->with(array(
            'activity_data'=>Activity::getActivityData($aid),
            'checkin_data'=>ActivityCheck::getCheckinHistory($aid, $page),
            'pagenum'=>ActivityCheck::getCheckinHistoryPageNum($aid),
            'current_page'=>$page,
            'aid'=>$aid,
            'checkin_total'=>ActivityCheck::getTotalNum($aid),
            'groupnum'=>ActivityCheck::getCheckinGroupNum($aid)
        ));
    }
    public function export(){
        $data = ActivityCheck::getCheckinHistory(Input::get('aid'),'all');
        $activity_data = Activity::getActivityData(Input::get('aid'));
        if($activity_data->activity_type == 'no_check'){
            $head = array('學號','簽到時間');
            
        }else{
            $head = array(
                '學號',
                '姓名',
                '科系',
                '票種、職務',
                '簽到時間'
            );
        }
        $excel = new Excel('簽到清冊','校園RFID系統','簽到清冊');
        $excel->makeXLS($head,$data);
        $excel->download();
    }
    
}