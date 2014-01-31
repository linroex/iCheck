<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>校園RFID系統｜編輯器材</title>
    @include('import')
    <script>
        $(document).ready(function(){
            $('#buy_date').datepicker();
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
                            <h1>編輯器材</h1>
                        </div>
                        <div class="col-md-9 hidden-xs col-sm-8">
                            <div class="btn-group quick-btn pull-right">
                                <a href="add_euqipment.php" class="btn btn-default">新增器材</a>
                                <a href="view_equipment.php" class="btn btn-default">器材清單</a>
                                <a href="{{url()}}/equip/history" class="btn btn-default">借用記錄</a>
                                <a href="{{url()}}/equip/borrow" class="btn btn-default">借還登記</a>
                                           
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="breadcrumb">
                                <li><a href="{{url()}}/equip/borrow">器材借用</a></li>
                                <li><a href="view_equipment.php">器材清單</a></li>
                                <li><a href="edit_equipment_item.php">編輯器材</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div> <!-- row -->
            
            <div class="row">
                <div class="col-md-8">
                    <table class="table">
                        <tr>
                            <td>編號</td>
                            <td><input type="text" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>名稱</td>
                            <td><input type="text" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>說明</td>
                            <td><textarea name="" id="" rows="5" class="col-md-12 form-control"></textarea></td>
                        </tr>
                        <tr>
                            <td>購入時間</td>
                            <td><input type="text" class="form-control" id="buy_date"></td>
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
                </div>
            </div>
            
        </div> <!-- page-wrapper -->
    </div>
</body>
</html>