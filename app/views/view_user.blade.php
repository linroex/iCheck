<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iCheck｜檢視用戶</title>
    @include('import',array('target'=>'系統管理'))
    <script>
        var uid = '';
        function delete_dialog(user_id,user_name){
            $('.del_name').text(user_name);
            uid = user_id;
            $('#check_delete_dialog').modal('show');
        }
        $(document).ready(function(){
            $('#sure_delete').click(function(){
                $.post('{{url()}}/user/delete',{uid:uid},function(data){
                    $('#check_delete_dialog').modal('hide');
                    $('.breadcrumb').parent().append('<div class="alert alert-success">' + data + '</div>')
                    $('tr.uid-' + uid).remove();
                })
            })
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
                            <h1>檢視用戶</h1>
                        </div>
                        <div class="col-md-9 hidden-xs col-sm-8">
                            <div class="btn-group quick-btn pull-right">
                                
                                <a href="{{url()}}/user/create" class="btn btn-default">建立用戶</a>
                                <a href="{{url()}}/user/view" class="btn btn-default">檢視用戶</a>              
                            
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="breadcrumb">
                                <li>系統設定</li>
                                <li><a href="{{url()}}/user/view">檢視用戶</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <td>姓名</td>
                                <td class="hidden-xs">帳號</td>
                                <td>單位</td>
                                <td class="hidden-xs">信箱</td>
                                <td class="hidden-xs">類型</td>
                                <td></td>
                                <td class="hidden-xs"></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $row)
                                <tr class="uid-{{{$row->uid}}}">
                                    <td>{{{$row->name}}}</td>
                                    <td class="hidden-xs">{{{$row->username}}}</td>
                                    <td>{{{$row->department}}}</td>
                                    <td class="hidden-xs">{{{$row->email}}}</td>
                                    <td class="hidden-xs">{{$row->type == 'admin' ?'管理員':'使用者'}}</td>
                                    <td><a href="{{url()}}/user/edit/{{{$row->uid}}}" class="btn btn-default">編輯</a></td>
                                    <td class="hidden-xs"><a onclick="delete_dialog({{{$row->uid}}},'{{{$row->name}}}')" class="btn btn-danger">刪除</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- col-md-12 -->
            </div>
            <!-- row -->
        </div>
        <!-- page-wrapper -->
        <div class="modal fade" id="check_delete_dialog">
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
                <a class="btn btn-danger" id="sure_delete">確定刪除</a>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消刪除</button>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>
</body>
</html>