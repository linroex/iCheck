<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>校園RFID系統｜器材清單</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/sb-admin.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
    <script>
        function del_select_activity(){
            var body_str = '';
            var id_str = '';

            $('.equipment_list input[type=checkbox]:checked').each(function(){
                var temp = $(this).val().split(',');
                body_str += temp[1] + '<br/>';
                id_str += temp[0] + ',';
            })
            if($('.equipment_list input[type=checkbox]:checked').length===0){
                $('#check_dialog .modal-title').text('確認刪除器材');
                $('#check_dialog .modal-body').html('您並沒有選擇任何器材！');
            }else{
                $('#check_dialog .modal-title').text('確認刪除器材');
                $('#check_dialog .modal-body').html('您確定要刪除以下器材？ <br/>' + body_str);    
            }
            
            $('#check_dialog').modal('show');
        }

    </script>
</head>

<body>
    <div id="wrapper">
        <?php include('menu.php'); ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-3 col-xs-9 col-sm-4">
                            <h1>器材清單</h1>
                        </div>
                        <div class="col-md-9 col-xs-3 col-sm-8">
                            <div class="btn-group quick-btn pull-right">
                                <a href="add_euqipment.php" class="btn btn-primary">新增器材</a>
                                <a href="view_equipment.php" class="btn btn-default  hidden-xs">器材清單</a>
                                <a href="history_equipment.php" class="btn btn-default  hidden-xs">借用記錄</a>
                                <a href="borrow_equipment.php" class="btn btn-default  hidden-xs">借還登記</a>
                                           
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="breadcrumb">
                                <li><a href="borrow_equipment.php">器材借用</a></li>
                                <li><a href="view_equipment.php">器材清單</a></li>
                            </ul>
                        </div>
                    </div><!-- row -->
                    <div class="row">
                        <div class="col-md-12">
                            <form action="">
                                <table class="table table-hover equipment_list">
                                    <thead>
                                        <tr>
                                            <td></td>
                                            <td>編號</td>
                                            <td>名稱</td>
                                            <td class="hidden-xs">說明</td>
                                            <td class="hidden-xs">購入時間</td>
                                            <td class="hidden-xs">備註</td>
                                            <td>編輯</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input type="checkbox" value="1,無線電101-01-01"></td>
                                            <td>101-01-01</td>
                                            <td>無線電</td>
                                            <td class="hidden-xs">學生會的無線電</td>
                                            <td class="hidden-xs">2013/12/10</td>
                                            <td class="hidden-xs">可借用給校內單位，例如系學會、社團、學務處等等</td>
                                            <td><a href="edit_equipment_item.php" class="btn btn-primary">編輯</a></td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" value="2,無線電101-01-01"></td>
                                            <td>101-01-01</td>
                                            <td>無線電</td>
                                            <td class="hidden-xs">學生會的無線電</td>
                                            <td class="hidden-xs">2013/12/10</td>
                                            <td class="hidden-xs">可借用給校內單位，例如系學會、社團、學務處等等</td>
                                            <td><a href="edit_equipment_item.php" class="btn btn-primary">編輯</a></td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" value="3,無線電101-01-01"></td>
                                            <td>101-01-01</td>
                                            <td>無線電</td>
                                            <td class="hidden-xs">學生會的無線電</td>
                                            <td class="hidden-xs">2013/12/10</td>
                                            <td class="hidden-xs">可借用給校內單位，例如系學會、社團、學務處等等</td>
                                            <td><a href="edit_equipment_item.php" class="btn btn-primary">編輯</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div> <!-- row -->
                    <div class="row">
                        <div class="col-md-5"><a onclick="del_select_activity();" class="btn btn-danger">刪除所選項目</a></div>
                        <div class="col-md-4">
                            <ul class="pagination">
                                <li class="active"><a href="">1</a></li>
                                <li><a href="">2</a></li>
                                <li><a href="">3</a></li>
                                <li><a href="">4</a></li>
                                <li><a href="">5</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- page-wrapper -->
        <div class="modal fade" id="check_dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">確認刪除</h4>
              </div>
              <div class="modal-body">
                <p>你確定要刪除<span class="del_name"></span>？</p>
              </div>
              <div class="modal-footer">
                <a class="btn btn-danger">確定刪除</a>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消刪除</button>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>
</body>
</html>
