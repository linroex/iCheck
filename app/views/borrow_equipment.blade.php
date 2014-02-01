<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>校園RFID系統｜借還登記</title>
    @include('import',array('target'=>'器材借用'))
</head>

<body>
    <div id="wrapper">
        @include('menu')
        <div id="page-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        
                        <div class="col-md-3 col-sm-4">
                            <h1>借還登記</h1>
                        </div>
                        <div class="col-md-9 hidden-xs col-sm-8">
                            <div class="btn-group quick-btn pull-right">
                                <!-- <a href="add_euqipment.php" class="btn btn-default">新增器材</a>
                                <a href="view_equipment.php" class="btn btn-default">器材清單</a> -->
                                <a href="{{url()}}/equip/history" class="btn btn-default">借用記錄</a>
                                <a href="{{url()}}/equip/borrow" class="btn btn-default">借還登記</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="breadcrumb">
                                <li><a href="{{url()}}/equip/borrow">器材借用</a></li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div> <!-- row -->
            <div class="row">
                <div class="col-md-6">

                    <form action="" class="borrow_form">
                            <div class="form-group">
                                <label for="stu_card">1.學生證</label>
                                <input type="text" class="form-control" id="stu_card" placeholder="請刷學生證">
                            </div>
                            <div class="form-group">
                                <label for="">2.選擇器材</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">3.歸還日期</label>
                                <input type="text" class="form-control" id="return_date">
                            </div>
                            <div class="form-group">
                                <div class="btn-group pull-right">
                                    <input type="button" value="借用" class="btn btn-lg btn-default">
                                    <input type="button" value="歸還" class="btn btn-lg btn-default">

                                </div>
                            </div>
                    </form>
                    
                </div>
                <div class="col-md-6">
                    <div class="alert alert-success">
                        <h3 class="text-center">借用完成</h3>
                        <br>
                        <ul class="list-group text-center">
                            <li class="list-group-item">無線電</li>
                            <li class="list-group-item">101-01-01</li>
                        </ul>
                    </div>
                    <div class="alert alert-success">
                        <h3 class="text-center">未歸還</h3>
                        <br>
                        <ul class="list-group">
                            <li class="list-group-item">無線電 <i>101-01-01</i><small class="pull-right">未逾期</small></li>
                            <li class="list-group-item">籃球 <i>101-21-11</i><small class="pull-right">已逾期</small></li>
                        </ul>
                    </div>
                    <div class="alert alert-success">
                        <h3 class="text-center">狀態</h3>
                    </div>
                </div>
            </div>

        </div> <!-- page-wrapper -->
    </div>
</body>
</html>