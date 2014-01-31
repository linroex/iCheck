<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>校園RFID系統｜檢視活動</title>
    @include('import')
    <script>
        
        function del_select_activity(){
            var body_str = '';
            var id_str = '';

            $('.avtivity_list input[type=checkbox]:checked').each(function(){
                var temp = $(this).val().split(',');
                body_str += temp[1] + '<br/>';
                id_str += temp[0] + ',';
            })
            if($('.avtivity_list input[type=checkbox]:checked').length===0){
                $('#check_dialog .modal-title').text('確認刪除活動');
                $('#check_dialog .modal-body').html('您並沒有選擇任何成員！');
            }else{
                $('#check_dialog .modal-title').text('確認刪除活動');
                $('#check_dialog .modal-body').html('您確定要刪除以下活動？ <br/>' + body_str);    
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
                        <div class="pull-left col-md-3">
                            <h1>檢視活動</h1>
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
                            </ul>
                        </div>
                    </div>
                </div>
            </div> <!-- row end -->
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-hover avtivity_list">
                        <thead>
                            <tr>
                                <td class="hidden-xs"></td>
                                <td>活動名稱</td>
                                <td class="hidden-xs">活動內容</td>
                                <td class="hidden-xs">活動日期</td>
                                <td class="hidden-xs">主辦單位</td>
                                <td class="hidden-xs"></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="hidden-xs"><input type="checkbox" name="" id="" value="1,台科大電影節"></td>
                                <td>台科大電影節</td>
                                <td class="hidden-xs">一年一度的電影節，全校師生免費看電影</td>
                                <td class="hidden-xs">2014/2/13</td>
                                <td class="hidden-xs">台科學生會</td>
                                <td class="hidden-xs"><a href="{{url()}}/activity/edit" class="btn btn-default">編輯</a></td>
                                <td><a href="{{url()}}/activity/view/detail" class="btn btn-default">記錄</a></td>
                                <td><a href="{{url()}}/activity/check" class="btn btn-primary">進入</a></td>
                            </tr>
                            <tr>
                                <td class="hidden-xs"><input type="checkbox" name="" id="" value="2,台科大電影節"></td>
                                <td>台科大電影節</td>
                                <td class="hidden-xs">一年一度的電影節，全校師生免費看電影</td>
                                <td class="hidden-xs">2014/2/13</td>
                                <td class="hidden-xs">台科學生會</td>
                                <td class="hidden-xs"><a href="{{url()}}/activity/edit" class="btn btn-default">編輯</a></td>
                                <td><a href="{{url()}}/activity/view/detail" class="btn btn-default">記錄</a></td>
                                <td><a href="{{url()}}/activity/check" class="btn btn-primary">進入</a></td>
                            </tr>
                            <tr>
                                <td class="hidden-xs"><input type="checkbox" name="" id="" value="3,台科大電影節"></td>
                                <td>台科大電影節</td>
                                <td class="hidden-xs">一年一度的電影節，全校師生免費看電影</td>
                                <td class="hidden-xs">2014/2/13</td>
                                <td class="hidden-xs">台科學生會</td>
                                <td class="hidden-xs"><a href="{{url()}}/activity/edit" class="btn btn-default">編輯</a></td>
                                <td><a href="{{url()}}/activity/view/detail" class="btn btn-default">記錄</a></td>
                                <td><a href="{{url()}}/activity/check" class="btn btn-primary">進入</a></td>
                            </tr>
                            <tr>
                                <td class="hidden-xs"><input type="checkbox" name="" id="" value="4,台科大電影節"></td>
                                <td>台科大電影節</td>
                                <td class="hidden-xs">一年一度的電影節，全校師生免費看電影</td>
                                <td class="hidden-xs">2014/2/13</td>
                                <td class="hidden-xs">台科學生會</td>
                                <td class="hidden-xs"><a href="{{url()}}/activity/edit" class="btn btn-default">編輯</a></td>
                                <td><a href="{{url()}}/activity/view/detail" class="btn btn-default">記錄</a></td>
                                <td><a href="{{url()}}/activity/check" class="btn btn-primary">進入</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div> <!-- row end -->
            <div class="row">
                <div class="col-md-12">
                    <div class="pull-left hidden-xs">
                        <a onclick="del_select_activity();" class="btn btn-danger">刪除所選活動</a>
                    </div>
                    <div class="pull-right">
                        <ul class="pagination">
                            <li class="active"><a href="">1</a></li>
                            <li><a href="">2</a></li>
                            <li><a href="">3</a></li>
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