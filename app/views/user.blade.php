<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iCheck｜個人資料</title>
    @include('import')
</head>

<body>
    <div id="wrapper">
        @include('menu')
        <div id="page-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <h1>個人資料修改</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{url()}}/me">個人資料</a></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    {{Form::model(Session::get('user_data'))}}
                        <table class="table">
                            {{Form::hidden('username')}}
                            <tr>
                                <td class="col-md-3 field-name">使用者名稱</td>
                                <td class="col-md-9">{{Form::text('username',NULL,array('class'=>'form-control','disabled'))}}</td>
                            </tr>
                            <tr>
                                <td>使用者密碼</td>
                                <td>{{Form::password('password',array('class'=>'form-control'))}}</td>
                            </tr>
                            <tr>
                                <td>在輸入一次</td>
                                <td>{{Form::password('password_confirmation',array('class'=>'form-control'))}}</td>
                            </tr>
                            <tr>
                                <td>姓名</td>
                                <td>{{Form::text('name',NULL,array('class'=>'form-control'))}}</td>
                            </tr>
                            
                            <tr>
                                <td>信箱</td>
                                <td>{{Form::email('email',NULL,array('class'=>'form-control'))}}</td>
                            </tr>
                            
                            <tr>
                                <td></td>
                                <td><input type="submit" value="更新" class="btn btn-lg btn-primary pull-right"></td>
                            </tr>
                        </table>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
</body>
</html>
