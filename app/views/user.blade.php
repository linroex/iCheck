<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>校園RFID系統｜個人資料</title>
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
                        <li><a href="user.php">個人資料</a></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <form action="">
                        <table class="table">
                            <tr>
                                <td class="col-md-3">使用者名稱</td>
                                <td class="col-md-9"><input type="text" name="" id="" class="form-control" disabled></td>
                            </tr>
                            <tr>
                                <td>暱稱</td>
                                <td><input type="text" name="" id="" class="form-control"></td>
                            </tr>
                            <tr>
                                <td class="col-md-2">請輸入密碼</td>
                                <td><input type="password" name="" id="" class="form-control"></div></td>
                            </tr>
                            <tr>
                                <td>在輸入一次</td>
                                <td><input type="password" name="" id="" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>電子信箱</td>
                                <td><input type="email" name="" id="" class="form-control"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" value="送出" class="btn btn-primary pull-right btn-lg"></td>
                            </tr>
                        </table>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
