<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>校園RFID系統｜檢視活動</title>
    @include('import',array('target'=>'活動簽到'))
    <script>
        
        function del_select_activity_dialog(){
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
        function del_select_activity(){
            $.post('{{url()}}/activity/delete',$('#viewActivityForm').serialize(),function(data){
                $('#check_dialog').modal('hide');
                $('input:checked').parent().parent().remove();
                $('.alert').remove();
                $('.breadcrumb').parent().append('<div class="alert alert-success">成功刪除指定的活動</div>');

            })
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
                    {{Form::open(array('id'=>'viewActivityForm'))}}
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
                            @foreach ($data as $row)
                                <tr>
                                    <td class="hidden-xs"><input type="checkbox" name="aid[]" value="{{{$row->aid . ',' . $row->activity_name}}}"></td>
                                    <td>{{{$row->activity_name}}}</td>
                                    <td class="hidden-xs">{{{$row->activity_desc}}}</td>
                                    <td class="hidden-xs">{{{str_replace('1970/01/01','',date('Y/m/d',strtotime($row->activity_date)))}}}</td>
                                    <td class="hidden-xs">{{{$row->activity_organize}}}</td>
                                    <td class="hidden-xs"><a href="{{url()}}/activity/edit/{{{$row->aid}}}" class="btn btn-default">編輯</a></td>
                                    <td><a href="{{url()}}/activity/detail/{{{$row->aid}}}" class="btn btn-default">記錄</a></td>
                                    <td>
                                        @if ($row->enable == 0)
                                            <a href="" class="btn btn-primary">已停用</a>

                                        @elseif ($row->enable == 1)
                                            <a href="{{url()}}/activity/check/{{{$row->aid}}}" class="btn btn-primary">進入</a>

                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{Form::close()}}
                </div>
            </div> <!-- row end -->
            <div class="row">
                <div class="col-md-12">
                    <div class="pull-left hidden-xs">
                        <a onclick="del_select_activity_dialog();" class="btn btn-danger">刪除所選活動</a>
                    </div>
                    <div class="pull-right">
                        <ul class="pagination">
                            @for ($i=1; $i<=$pagenum; $i++)
                                <li class="{{$i==$current_page?'active':''}}"><a href="{{url()}}/activity/view/{{$i}}">{{$i}}</a></li>
                            @endfor
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
                <button type="button" class="btn btn-danger" onclick="del_select_activity()">確定刪除</button>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

    </div>
</body>
</html>