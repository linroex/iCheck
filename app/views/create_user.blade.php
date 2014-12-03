<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iCheck｜建立用戶</title>
    @include('import',array('target'=>'系統管理'))
    
</head>

<body>
    <div id="wrapper">
        @include('menu')
        <div id="page-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-3 col-sm-4">
                            <h1>建立用戶</h1>
                        </div>
                        <div class="col-md-9 hidden-xs col-sm-8">
                            <div class="btn-group quick-btn pull-right">
                                <a href="{{url()}}/user/create" class="btn btn-default">建立用戶</a>
                                <a href="{{url()}}/user/view" class="btn btn-default">檢視用戶</a>              
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="breadcrumb">
                                <li>系統設定</li>
                                <li><a href="{{url()}}/user/view">檢視用戶</a></li>
                                <li><a href="{{url()}}/user/create">建立用戶</a></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    
                    {{Form::open()}}
                        <table class="table">
                            <tr>
                                <td class="col-md-3 field-name">使用者名稱</td>
                                <td class="col-md-9">{{Form::text('username',Session::get('data')['username'],array('class'=>'form-control'))}}</td>
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
                                <td>{{Form::text('name',Session::get('data')['name'],array('class'=>'form-control'))}}</td>
                            </tr>
                            <tr>
                                <td>單位</td>
                                <td>{{Form::text('department',Session::get('data')['department'],array('class'=>'form-control'))}}</td>
                            </tr>
                            <tr>
                                <td>信箱</td>
                                <td>{{Form::email('email',Session::get('data')['email'],array('class'=>'form-control'))}}</td>
                            </tr>
                            <tr>
                                <td>種類</td>
                                <td>
                                    {{Form::select('type',array('normal'=>'使用者','admin'=>'管理員'),Session::get('data')['type'],array('class'=>'form-control'))}}
                                </td>
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