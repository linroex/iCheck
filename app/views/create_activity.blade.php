<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>校園RFID系統｜建立活動</title>
    @include('import')
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
                        <div class="col-md-3">
                            <h1>建立活動</h1>
                        </div>
                        <div class="col-md-9 hidden-xs">
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
                    <form action="">
                        <table class="table">
                            <tr>
                                <td class="col-md-3 field-name">活動名稱</td>
                                <td class="col-md-9"><input type="text" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>活動內容</td>
                                <td><textarea name="" id="" rows="10" class="form-control col-md-12"></textarea></td>
                            </tr>
                            <tr>
                                <td>活動日期</td>
                                <td><input type="text" class="form-control" id="activity_date"></td>
                            </tr>
                            <tr>
                                <td>簽到類型</td>
                                <td>
                                    <select name="" id="" class="form-control">
                                        <option value="">無需身分驗證</option>
                                        <option value="">需嚴格身分驗證</option>
                                        <option value="">僅需提示身份是否符合</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>名冊選擇</td>
                                <td>
                                    <select name="" id="" class="form-control">
                                        <option value="">不需要名冊</option>
                                        <option value="">程式研究社 社員</option>
                                        <option value="">學生會成員</option>
                                        <option value="">教務處同仁</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>主辦單位</td>
                                <td><input type="text" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>備註</td>
                                <td><textarea name="" id="" rows="5" class="col-md-12 form-control"></textarea></td>
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