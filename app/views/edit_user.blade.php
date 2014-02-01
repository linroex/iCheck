<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>校園RFID系統｜編輯用戶</title>
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
                            <h1>編輯用戶</h1>
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
                                <li><a href="{{url()}}/user/create">編輯用戶</a></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <form action="">
                        <table class="table">
                            <tr>
                                <td class="col-md-3 field-name">使用者名稱</td>
                                <td class="col-md-9"><input type="text" class="form-control" disabled></td>
                            </tr>
                            <tr>
                                <td>使用者密碼</td>
                                <td><input type="password" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>在輸入一次</td>
                                <td><input type="password" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>姓名</td>
                                <td><input type="text" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>單位</td>
                                <td><input type="text" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>信箱</td>
                                <td><input type="email" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>種類</td>
                                <td>
                                    <select name="" id="" class="form-control">
                                        <option value="">管理者</option>
                                        <option value="">使用者</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" value="建立" class="btn btn-lg btn-primary pull-right"></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>