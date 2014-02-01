<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>校園RFID系統｜編輯活動</title>
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
                        <h1>編輯活動</h1>
                    </div>
                    <div class="row">
                        <ul class="breadcrumb">
                            <li>活動簽到</li>
                            <li><a href="{{url()}}/activity/view">檢視活動</a></li>
                            <li><a href="{{url()}}/activity/edit">編輯活動</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <h3>活動資料</h3>
                    <form action="">
                        <table class="table">
                            <tr>
                                <td class="col-md-3">活動名稱</td>
                                <td class="col-md-9"><input type="text" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>活動內容</td>
                                <td><textarea name="" id="" rows="5" class="col-md-12 form-control"></textarea></td>
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
                                <td><input type="submit" value="送出" class="pull-right btn btn-primary btn-lg"></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div> <!-- row end -->
        </div>  <!-- page-wrapper -->
    </div>
</body>
</html>
