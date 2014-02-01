<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>校園RFID系統｜編輯名冊</title>
    @include('import',array('target'=>'活動簽到'))
    <script>
        function del_namelist_check(namelist_id,namelist_name){
            $('#check_dialog .modal-title').text('確認刪除名冊');
            $('#check_dialog .modal-body').text('您確定要刪除' + namelist_name + '這份名冊？');
            $('#check_dialog').modal('show');
            
        }
        function del_select_member(){
            var body_str = '';
            var id_str = '';

            $('.namelist_member input[type=checkbox]:checked').each(function(){
                var temp = $(this).val().split(',');
                body_str += temp[1] + '<br/>';
                id_str += temp[0] + ',';
            })
            if($('.namelist_member input[type=checkbox]:checked').length===0){
                $('#check_dialog .modal-title').text('確認刪除成員');
                $('#check_dialog .modal-body').html('您沒有選擇任何成員！');
            }else{
                $('#check_dialog .modal-title').text('確認刪除成員');
                $('#check_dialog .modal-body').html('您確定要從本名冊中刪除以下成員？ <br/>' + body_str);    
            }
            
            $('#check_dialog').modal('show');
        }
    </script>
</head>

<body>
    <div id="wrapper">
        @include('menu')
        <div id="page-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <h1>編輯名冊</h1>
                    </div>
                    <div class="row">
                        <ul class="breadcrumb">
                            <li>活動簽到</li>
                            <li><a href="{{url()}}/namelist/view">檢視名冊</a></li>
                            <li><a href="{{url()}}/namelist/edit">編輯名冊</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <h3>基本資料</h3>
                    <form action="">
                        <table class="table">
                            <tr>
                                <td class="col-md-3">名冊名稱</td>
                                <td class="col-md-9"><input type="text" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>名冊說明</td>
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
            

            <div class="row">
                
                <div class="col-md-12">
                    <h3>名冊成員</h3>
                    <form action="">
                        <table class="table-hover table namelist_member">
                            <thead>
                                <tr>
                                    <td></td>
                                    <td>姓名</td>
                                    <td>學號</td>
                                    <td>科系</td>
                                    <td class="hidden-xs">職位</td>
                                    <td class="hidden-xs">電話</td>
                                    <td class="hidden-xs">信箱</td>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="checkbox" name="" value="1,林熙哲"></td>
                                    <td>林熙哲</td>
                                    <td>B10209019</td>
                                    <td>資訊管理系</td>
                                    <td class="hidden-xs">社員</td>
                                    <td class="hidden-xs">0912123456</td>
                                    <td class="hidden-xs">linroex@coder.tw</td>
                                    <td><a href="edit_namelist_member_data.php" class="btn btn-primary">編輯</a></td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="" value="2,林熙哲"></td>
                                    <td>林熙哲</td>
                                    <td>B10209019</td>
                                    <td>資訊管理系</td>
                                    <td class="hidden-xs">社員</td>
                                    <td class="hidden-xs">0912123456</td>
                                    <td class="hidden-xs">linroex@coder.tw</td>
                                    <td><a href="edit_namelist_member_data.php" class="btn btn-primary">編輯</a></td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name=""  value="3,林熙哲"></td>
                                    <td>林熙哲</td>
                                    <td>B10209019</td>
                                    <td>資訊管理系</td>
                                    <td class="hidden-xs">社員</td>
                                    <td class="hidden-xs">0912123456</td>
                                    <td class="hidden-xs">linroex@coder.tw</td>
                                    <td><a href="edit_namelist_member_data.php" class="btn btn-primary">編輯</a></td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name=""  value="4,林熙哲"></td>
                                    <td>林熙哲</td>
                                    <td>B10209019</td>
                                    <td>資訊管理系</td>
                                    <td class="hidden-xs">社員</td>
                                    <td class="hidden-xs">0912123456</td>
                                    <td class="hidden-xs">linroex@coder.tw</td>
                                    <td><a href="edit_namelist_member_data.php" class="btn btn-primary">編輯</a></td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name=""  value="5,林熙哲"></td>
                                    <td>林熙哲</td>
                                    <td>B10209019</td>
                                    <td>資訊管理系</td>
                                    <td class="hidden-xs">社員</td>
                                    <td class="hidden-xs">0912123456</td>
                                    <td class="hidden-xs">linroex@coder.tw</td>
                                    <td><a href="edit_namelist_member_data.php" class="btn btn-primary">編輯</a></td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name=""  value="6,林熙哲"></td>
                                    <td>林熙哲</td>
                                    <td>B10209019</td>
                                    <td>資訊管理系</td>
                                    <td class="hidden-xs">社員</td>
                                    <td class="hidden-xs">0912123456</td>
                                    <td class="hidden-xs">linroex@coder.tw</td>
                                    <td><a href="edit_namelist_member_data.php" class="btn btn-primary">編輯</a></td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name=""  value="7,林熙哲"></td>
                                    <td>林熙哲</td>
                                    <td>B10209019</td>
                                    <td>資訊管理系</td>
                                    <td class="hidden-xs">社員</td>
                                    <td class="hidden-xs">0912123456</td>
                                    <td class="hidden-xs">linroex@coder.tw</td>
                                    <td><a href="edit_namelist_member_data.php" class="btn btn-primary">編輯</a></td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name=""  value="8,林熙哲"></td>
                                    <td>林熙哲</td>
                                    <td>B10209019</td>
                                    <td>資訊管理系</td>
                                    <td class="hidden-xs">社員</td>
                                    <td class="hidden-xs">0912123456</td>
                                    <td class="hidden-xs">linroex@coder.tw</td>
                                    <td><a href="edit_namelist_member_data.php" class="btn btn-primary">編輯</a></td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name=""  value="9,林熙哲"></td>
                                    <td>林熙哲</td>
                                    <td>B10209019</td>
                                    <td>資訊管理系</td>
                                    <td class="hidden-xs">社員</td>
                                    <td class="hidden-xs">0912123456</td>
                                    <td class="hidden-xs">linroex@coder.tw</td>
                                    <td><a href="edit_namelist_member_data.php" class="btn btn-primary">編輯</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </form>


                </div>
            </div>  <!-- row end -->
            <div class="row">
                <div class="col-md-5 hidden-xs col-sm-4">
                    <a onclick="del_select_member()" class="btn btn-danger">刪除選定成員</a>
                </div>
                <div class="col-md-3 col-xs-6 col-sm-3">
                    <ul class="pagination">
                        <li class="active"><a href="">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>

                    </ul>
                </div>
                <div class="col-md-4 col-xs-6 col-sm-5">
                    <div class="btn-group edit-namelist-btn-group pull-right">
                        <a href="" class="btn btn-default hidden-xs">匯出名冊</a>
                        <a onclick="del_namelist_check(1,'國立台灣科技大學學生會')" class="btn btn-danger">刪除名冊</a>
                    </div>
                </div>
            </div> <!-- row end -->
        </div>  <!-- page-wrapper -->

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
