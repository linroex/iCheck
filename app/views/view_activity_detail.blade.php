<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>校園RFID系統｜檢視簽到記錄</title>
    @include('import')

</head>

<body>
    <div id="wrapper">
        @include('menu')
        <div id="page-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <h1>檢視簽到記錄</h1>
                    <ul class="breadcrumb">
                        <li>活動簽到</li>
                        <li><a href="{{url()}}/activity/view">檢視活動</a></li>
                        <li><a href="{{url()}}/activity/view/detail">檢視簽到記錄</a></li>
                        
                    </ul>
                </div>
            </div> <!-- row end -->
            <div class="row">
                
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-8">
                            <h3>基本資料</h3>
                            <table class="table">
                                <tr>
                                    <td class="col-md-2">活動名稱</td>
                                    <td class="col-md-10">台科大電影節</td>
                                </tr>
                                <tr>
                                    <td>活動內容</td>
                                    <td>讓台科師生免費看電影的活動</td>
                                </tr>
                                <tr>
                                    <td>簽到類型</td>
                                    <td>無需身分驗證</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        
                        <div class="col-md-12">
                            <div class="pull-left">
                                <h3>簽到記錄</h3>
                            </div>
                            <div class="btn-group pull-right activity_btn_group">
                                <a href="" class="btn btn-default hidden-xs">匯出記錄</a>
                                <a href="" class="btn btn-default dropdown-toggle" data-toggle="dropdown">共100人簽到 <span class="caret"></span></a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="">2013/9/10共10人</a></li>
                                    <li><a href="">2013/9/17共30人</a></li>
                                    <li><a href="">2013/9/20共50人</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>  <!-- row end -->
                    <form action="">
                        <table class="table-hover table activity_check_list">
                            <thead>
                                <tr>
                                    <td>姓名</td>
                                    <td>學號</td>
                                    <td>科系</td>
                                    <td>簽到日期</td>
                                    <td>簽到時間</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>林熙哲</td>
                                    <td>B10209019</td>
                                    <td>資訊管理系</td>
                                    <td>2014/1/1</td>
                                    <td>13:30</td>
                                </tr>
                                <tr>
                                    <td>林熙哲</td>
                                    <td>B10209019</td>
                                    <td>資訊管理系</td>
                                    <td>2014/1/1</td>
                                    <td>13:30</td>
                                </tr>
                                <tr>
                                    <td>林熙哲</td>
                                    <td>B10209019</td>
                                    <td>資訊管理系</td>
                                    <td>2014/1/1</td>
                                    <td>13:30</td>
                                </tr>
                                <tr>
                                    <td>林熙哲</td>
                                    <td>B10209019</td>
                                    <td>資訊管理系</td>
                                    <td>2014/1/1</td>
                                    <td>13:30</td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>  <!-- row end -->
            <div class="row">
                
                <div class="col-md-4 col-xs-8 col-sm-7 col-md-offset-4">
                    <ul class="pagination">
                        <li class="active"><a href="">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>
                        <li><a href="">4</a></li>
                        <li><a href="">5</a></li>
                        <li><a href="">6</a></li>
                        <li><a href="">7</a></li>
                        <li><a href="">8</a></li>
                    </ul>
                </div>
                <div class="col-md-3 col-xs-4 col-sm-5 pull-right">
                    <div class="btn-group edit-namelist-btn-group pull-right">
                        <a href="" class="btn btn-default hidden-xs">匯出記錄</a>
                        <a href="" class="btn btn-default dropdown-toggle" data-toggle="dropdown">共100人簽到 <span class="caret"></span></a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="">2013/9/10共10人</a></li>
                            <li><a href="">2013/9/17共30人</a></li>
                            <li><a href="">2013/9/20共50人</a></li>
                        </ul>
                        
                    </div>
                </div>
            </div> <!-- row end -->

        </div> <!-- page-wrapper end -->
        <div class="modal fade" id="check_dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"></h4>
              </div>
              <div class="modal-body">
                <p></p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                <button type="button" class="btn btn-danger">確定刪除</button>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>
</body>
</html>