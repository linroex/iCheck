<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>校園RFID系統 | 後台登入</title>
    @include('import')
    <script>
        @if (Session::has("message"))
            $(document).ready(function(){
                $('.alert').addClass('alert-danger').removeClass('hidden').text('{{Session::get("message")}}');
            })
        @endif
    </script>
</head>
<body>
    <div class="container">
        <div class="col-md-4 col-md-offset-4 login-form">
            <h2 class="text-center">校園RFID系統 <small>Beta</small></h2>
            <form method="post">
                <div class="alert hidden"></div>
                <table class="table">
                    {{Form::token()}}
                    <tr>
                        <td class="col-md-4">使用者名稱</td>
                        <td class="col-md-8"><input type="text" class="form-control" name="username"></td>
                    </tr>
                    <tr>
                        <td class="col-md-4">使用者密碼</td>
                        <td class="col-md-8"><input type="password" name="password" class="form-control"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="登入" class="btn btn-primary pull-right"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>
</html>