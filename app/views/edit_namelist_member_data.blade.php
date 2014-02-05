<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>校園RFID系統｜編輯成員資料</title>
    @include('import',array('target'=>'活動簽到'))
    
</head>

<body>
    <div id="wrapper">
        @include('menu')
        <div id="page-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <h1>編輯成員資料</h1>
                    <ul class="breadcrumb">
                        <li>活動簽到</li>
                        <li><a href="{{url()}}/namelist/view">檢視名冊</a></li>
                        <li><a href="{{url()}}/namelist/edit/{{$data[0]['nid']}}">編輯名冊</a></li>
                        <li><a href="{{url()}}/namelist/edit/member/{{$data[0]['nmid']}}">編輯成員資料</a></li>
                    </ul>
                </div>
            </div> <!-- row end -->
            <div class="row">
                <div class="col-md-8">
                    {{Form::model($data[0])}}
                        {{Form::hidden('nid')}}
                        <table class="table table-striped">
                            <tr>
                                <td class="col-md-2 col-xs-3">姓名</td>
                                <td class="col-md-10 col-xs-9">{{Form::text('name',null,array('class'=>'form-control'))}}</td>
                            </tr>
                            <tr>
                                <td>學號</td>
                                <td>{{Form::text('student_id',null,array('class'=>'form-control'))}}</td>
                            </tr>
                            <tr>
                                <td>科系</td>
                                <td>{{Form::text('department',null,array('class'=>'form-control'))}}</td>
                            </tr>
                            <tr>
                                <td>職位</td>
                                <td>{{Form::text('job',null,array('class'=>'form-control'))}}</td>
                            </tr>
                            <tr>
                                <td>電話</td>
                                <td>{{Form::input('tel','phone',null,array('class'=>'form-control'))}}</td>
                            </tr>
                            <tr>
                                <td>信箱</td>
                                <td>{{Form::input('email','email',null,array('class'=>'form-control'))}}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" value="送出" class="pull-right btn btn-lg btn-primary"></td>
                            </tr>
                        </table>
                    {{Form::close()}}
                </div> <!-- col-md-8 end -->
            </div> <!-- row end -->
        </div> <!-- page-wrapper end -->
    </div>
</body>
</html>