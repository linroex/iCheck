<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iCheck｜總覽</title>
    @include('import',array('target'=>'總覽'))
</head>

<body>
    <div id="wrapper">
        @include('menu')
        <div id="page-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <h1>總覽</h1>
                    <ul class="breadcrumb">
                        <li><a href="index.php">總覽</a></li>
                    </ul>
                    
                </div>
            </div>
            <div class="row">
                @if (Login::getType() == 'admin')
                    <div class="col-md-6 col-sm-6">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <p class="panel-title">登入記錄</p>
                            </div>
                            <div class="panel-body">
                                <table class="table table-border">
                                    <thead>
                                        <tr>
                                            <td>姓名</td>
                                            <td>時間</td>
                                            <td>IP</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($login_history as $login) 
                                        <tr>
                                            <td>{{{$login->name}}}</td>
                                            <td>{{{$login->login_time}}}</td>
                                            <td>{{{$login->login_ip}}}</td>
                                        </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        
                    </div>
                @else
                    PASS
                @endif
                
            </div>
            
        </div>
        
    </div>
</body>
</html>