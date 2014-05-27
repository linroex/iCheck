<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>校園RFID系統｜活動簽到</title>
    @include('import',array('target'=>'活動簽到'))
    <script>

        $(document).ready(function(){
            $('#select_activity').change(function(){
                load_activity_data();
            });
            var flag = false;
            
            $('#checkin_form').submit(function(e){
                e.preventDefault();
                if(($('#stu_card').val().length == 10)){
                    checkin();
                }else if($('#type').is(':checked')){
                    checkin();
                    $('#type').prop('checked',false);
                }
            });
        })
    </script>
</head>

<body>
    <div id="wrapper">
        @include('menu')
        <div id="page-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-3 col-sm-4">
                            <h1>活動簽到</h1>
                        </div>
                        <div class="col-md-9 hidden-xs col-sm-8">
                            <div class="btn-group quick-btn pull-right">
                                <a href="{{url()}}/activity/create" class="btn btn-default">建立活動</a>
                                <a href="{{url()}}/namelist/create" class="btn btn-default">建立名冊</a>
                                <a href="{{url()}}/activity/view" class="btn btn-default">檢視活動</a>
                                <a href="{{url()}}/namelist/view" class="btn btn-default">檢視名冊</a>              
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="breadcrumb">
                                <li><a href="{{url()}}/activity/check">活動簽到</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div> <!-- row -->
            <div class="row">
                
                <div class="col-md-6">
                    <div class="alert alert-info text-center">
                        <h2>請出示學生證</h2>
                        <p>台科大學生會資訊室 校園RFID系統</p>
                    </div>
                    {{Form::open(array('id'=>'checkin_form'))}}
                        <div class="form-group">
                            <label for="select_activity">選擇活動</label>
                            {{Form::select('activity',$activity_list,$default,array('class'=>'form-control','id'=>'select_activity'))}}
                        </div>

                        <div class="form-group">
                            <label for="stu_card">學生證</label>
                            <div class="clearfix"></div>
                            <div class="col-md-1 col-xs-1"><input type="checkbox" name="type" id="type" value="studentid" class="form-control"></div>
                            <div class="col-md-11 col-xs-11"><input type="password" class="form-control" id="stu_card" name="student_id" placeholder="請刷學生證"></div>
                            <div class="clearfix"></div>
                        </div>
                    {{Form::close()}}
                    
                    <div class="alert alert-success {{$default==null?'hidden':''}}" id="activity_load_alert">
                        <h3 class="text-center">活動資訊載入成功</h3>
                        <br>
                        <ul class="list-group">
                            @if ($default != '')
                                <?php
                                    // 為了讓簽到類型可以顯示中文
                                    $default_data->activity_type = str_replace(array('no_check','strict_check','only_prompt'), array('無需事先報名','需事先報名','需事先報名，但可現場補報'), $default_data->activity_type)
                                ?>
                                <li class="list-group-item" id="activity_name">活動名稱：{{{$default_data->activity_name}}}</li>
                                <li class="list-group-item" id="activity_type">簽到類型：{{{$default_data->activity_type}}}</li>
                                <li class="list-group-item" id="activity_date">活動時間：{{{str_replace('1970/01/01','',date('Y/m/d',strtotime($default_data->activity_date)))}}}</li>
                                <li class="list-group-item" id="activity_organize">主辦單位：{{{$default_data->activity_organize}}}</li>
                            @else
                                <li class="list-group-item" id="activity_name">活動名稱：</li>
                                <li class="list-group-item" id="activity_type">簽到類型：</li>
                                <li class="list-group-item" id="activity_date">活動時間：</li>
                                <li class="list-group-item" id="activity_organize">主辦單位：</li>
                            @endif
                        </ul>
                    </div>

                    <div class="alert alert-success hidden" id="checkin_alert">
                        <h3 class="text-center checkin_title"></h3>
                        <br>
                        <ul class="list-group checkin-data hidden">
                            <li class="list-group-item" id="checkin_name"></li>
                            <li class="list-group-item" id="checkin_studentid"></li>
                            <li class="list-group-item" id="checkin_department"></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="pull-right">
                        <div class="btn-group">
                            <a class="btn btn-default">已簽到人數<span class="checkin_num">0</span>人</a>
                        </div>
                    </div>
                    
                    <table class="table table-hover checkin_history {{$default==null?'hidden':''}}">
                        <thead>
                            <tr>
                                <td>姓名</td>
                                <td>時間</td>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- page-wrapper -->
    </div>
</body>
</html>