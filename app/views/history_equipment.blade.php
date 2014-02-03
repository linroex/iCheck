<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>校園RFID系統｜借用記錄</title>
    @include('import',array('target'=>'器材借用'))
    <script>
        $('#history_tab a').click(function (e) {
          e.preventDefault()
          $(this).tab('show')
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
                            <h1>借用記錄</h1>
                        </div>
                        <div class="col-md-9 hidden-xs col-sm-8">
                            <div class="btn-group quick-btn pull-right">
                                <a href="{{url()}}/equip/history" class="btn btn-default">借用記錄</a>
                                <a href="{{url()}}/equip/borrow" class="btn btn-default">借還登記</a>
                                           
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="breadcrumb">
                                <li><a href="{{url()}}/equip/borrow">器材借用</a></li>
                                <li><a href="{{url()}}/equip/history">借用記錄</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div> <!-- row -->

            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-tabs" id="history_tab">
                        <li class="active"><a href="#borrowed" data-toggle="tab">已借出</a></li>
                        <li><a href="#returned" data-toggle="tab">已歸還</a></li>
                        <li><a href="#recovery" data-toggle="tab">待催討</a></li>
                        <div class="pull-right">
                        {{Form::selectMonth('month',date('m',time()),array('class'=>'form-control'))}}
                    </div>
                    </ul>
                    
                    <div class="tab-content">
                        <div class="tab-pane active fade in" id="borrowed">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <td>借用人</td>
                                        <td>學號</td>
                                        <td>器材名稱</td>
                                        <td>借用日期</td>
                                        <td>預計歸還日期</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>林熙哲</td>
                                        <td>B10209019</td>
                                        <td>無線電</td>
                                        <td>2014/1/1</td>
                                        <td>2014/1/10</td>
                                    </tr>
                                    <tr>
                                        <td>林熙哲</td>
                                        <td>B10209019</td>
                                        <td>無線電</td>
                                        <td>2014/1/1</td>
                                        <td>2014/1/10</td>
                                    </tr>
                                    <tr>
                                        <td>林熙哲</td>
                                        <td>B10209019</td>
                                        <td>無線電</td>
                                        <td>2014/1/1</td>
                                        <td>2014/1/10</td>
                                    </tr>
                                    <tr>
                                        <td>林熙哲</td>
                                        <td>B10209019</td>
                                        <td>無線電</td>
                                        <td>2014/1/1</td>
                                        <td>2014/1/10</td>
                                    </tr>
                                    <tr>
                                        <td>林熙哲</td>
                                        <td>B10209019</td>
                                        <td>無線電</td>
                                        <td>2014/1/1</td>
                                        <td>2014/1/10</td>
                                    </tr>
                                    <tr>
                                        <td>林熙哲</td>
                                        <td>B10209019</td>
                                        <td>無線電</td>
                                        <td>2014/1/1</td>
                                        <td>2014/1/10</td>
                                    </tr>
                                    <tr>
                                        <td>林熙哲</td>
                                        <td>B10209019</td>
                                        <td>無線電</td>
                                        <td>2014/1/1</td>
                                        <td>2014/1/10</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="pull-left">
                                <a href="" class="btn btn-success">匯出資料</a>
                            </div>
                            <ul class="pagination pull-right">
                                <li class="active"><a href="">1</a></li>
                                <li><a href="">2</a></li>
                                <li><a href="">3</a></li>
                                <li><a href="">4</a></li>
                            </ul>
                        </div> <!-- tab-pane -->
                        <div class="tab-pane fade in" id="returned">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <td>借用人</td>
                                        <td>學號</td>
                                        <td>器材名稱</td>
                                        <td>借用日期</td>
                                        <td>歸還日期</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>林熙哲</td>
                                        <td>B10209019</td>
                                        <td>無線電</td>
                                        <td>2014/1/1</td>
                                        <td>2014/1/10</td>
                                    </tr>
                                    <tr>
                                        <td>林熙哲</td>
                                        <td>B10209019</td>
                                        <td>無線電</td>
                                        <td>2014/1/1</td>
                                        <td>2014/1/10</td>
                                    </tr>
                                    <tr>
                                        <td>林熙哲</td>
                                        <td>B10209019</td>
                                        <td>無線電</td>
                                        <td>2014/1/1</td>
                                        <td>2014/1/10</td>
                                    </tr>
                                    <tr>
                                        <td>林熙哲</td>
                                        <td>B10209019</td>
                                        <td>無線電</td>
                                        <td>2014/1/1</td>
                                        <td>2014/1/10</td>
                                    </tr>
                                    <tr>
                                        <td>林熙哲</td>
                                        <td>B10209019</td>
                                        <td>無線電</td>
                                        <td>2014/1/1</td>
                                        <td>2014/1/10</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="pull-left">
                                <a href="" class="btn btn-success">匯出資料</a>
                            </div>
                            <ul class="pagination pull-right">
                                <li class="active"><a href="">1</a></li>
                                <li><a href="">2</a></li>
                                <li><a href="">3</a></li>
                                <li><a href="">4</a></li>
                            </ul>
                        </div> <!-- tab-pane -->
                        <div class="tab-pane fade in" id="recovery">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <td>借用人</td>
                                        <td>學號</td>
                                        <td>器材名稱</td>
                                        <td>借用日期</td>
                                        <td>預計歸還日期</td>
                                        <td>逾期天數</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>林熙哲</td>
                                        <td>B10209019</td>
                                        <td>無線電</td>
                                        <td>2014/1/1</td>
                                        <td>2014/1/10</td>
                                        <td>5天</td>
                                    </tr>
                                    <tr>
                                        <td>林熙哲</td>
                                        <td>B10209019</td>
                                        <td>無線電</td>
                                        <td>2014/1/1</td>
                                        <td>2014/1/10</td>
                                        <td>5天</td>
                                    </tr>
                                    <tr>
                                        <td>林熙哲</td>
                                        <td>B10209019</td>
                                        <td>無線電</td>
                                        <td>2014/1/1</td>
                                        <td>2014/1/10</td>
                                        <td>5天</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="pull-left">
                                <a href="" class="btn btn-success">匯出資料</a>
                            </div>
                            <ul class="pagination pull-right">
                                <li class="active"><a href="">1</a></li>
                                <li><a href="">2</a></li>
                                <li><a href="">3</a></li>
                                <li><a href="">4</a></li>
                            </ul>
                        </div> <!-- tab-pane -->
                    </div>
                    
                </div>
            </div>
        </div> <!-- page-wrapper -->
    </div>
</body>
</html>
<!-- 
    已借出
    已歸還
    待催討

    借用人
    學號
    器材名稱
    借用日期
    預計歸還日期
 -->