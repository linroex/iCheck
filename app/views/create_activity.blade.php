<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>校園RFID系統｜建立活動</title>
    @include('import',array('target'=>'活動簽到'))
    <script>
        $(document).ready(function(){
            $('#activity_date').datepicker();
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
                            <h1>建立活動</h1>
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
                                <li>活動簽到</li>
                                <li><a href="{{url()}}/activity/view">檢視活動</a></li>
                                <li><a href="{{url()}}/activity/create">建立活動</a></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    {{Form::model(Session::get('old_data'))}}
                        <table class="table">
                            <tr>
                                <td class="col-md-3 field-name">活動名稱</td>
                                <td class="col-md-9">{{Form::text('activity_name',null,array('class'=>'form-control'))}}</td>
                            </tr>
                            <tr>
                                <td>活動內容</td>
                                <td>{{Form::textarea('activity_desc',null,array('class'=>'form-control'))}}</td>
                            </tr>
                            <tr>
                                <td>活動日期</td>
                                <td>{{Form::text('activity_date',null,array('class'=>'form-control','id'=>'activity_date'))}}</td>
                            </tr>
                            <tr>
                                <td>簽到類型</td>
                                <td>
                                    {{
                                        Form::select('activity_type',array(
                                            'no_check'=>'無需身分驗證',
                                            'strict_check'=>'需嚴格身分驗證',
                                            'only_prompt'=>'僅需提示身份是否符合'
                                        ),null,array('class'=>'form-control'))
                                    }}
                                    
                                </td>
                            </tr>
                            <tr>
                                <td>名冊選擇</td>
                                <td>
                                    {{Form::select('nid',$namelist,null,array('class'=>'form-control'))}}
                                </td>
                            </tr>
                            
                            <tr>
                                <td>主辦單位</td>
                                <td>{{Form::text('activity_organize',null,array('class'=>'form-control'))}}</td>
                            </tr>
                            <tr>
                                <td>狀態</td>
                                <td>
                                    {{
                                        Form::select('enable',array(
                                            '1'=>'啟用',
                                            '0'=>'停用'
                                        ),1,array('class'=>'form-control'))
                                    }}
                                </td>
                            </tr>
                            <tr>
                                <td>備註</td>
                                <td>{{Form::textarea('activity_note',null,array('class'=>'form-control','rows'=>5))}}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" value="建立" class="btn btn-lg btn-primary pull-right"></td>
                            </tr>
                        </table>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
</body>
</html>