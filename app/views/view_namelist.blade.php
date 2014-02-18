<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>校園RFID系統｜檢視名冊</title>
    @include('import',array('target'=>'活動簽到'))
    <script>
        var nid = '';
        

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
                            <h1>檢視名冊</h1>
                        </div>
                        <div class="col-md-9 hidden-xs col-sm-8">
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
                                <li><a href="{{url()}}/namelist/view">檢視名冊</a></li>
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
                                <td class="col-md-3 field-name">名冊名稱</td>
                                <td class="col-md-7 hidden-xs">名冊說明</td>
                                <td class="col-md-1">詳細</td>
                                <td class="col-md-1 hidden-xs">刪除</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($namelist as $row)
                                <tr id="nid-{{{$row->nid}}}">
                                    <td>{{{$row->namelist_name}}}</td>
                                    <td class="hidden-xs">{{{$row->namelist_desc}}}</td>
                                    <td><a href="{{url()}}/namelist/edit/{{{$row->nid}}}" class="btn btn-default">詳細</a></td>
                                    <td class="hidden-xs"><a onclick="delete_dialog({{{$row->nid}}},'{{{$row->namelist_name}}}')" class="btn btn-danger">刪除</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pull-right">
                        <ul class="pagination need-link">
                            @for ($i=1; $i<=$pagenum; $i++)
                                <li class="{{$i==$current_page?'active':''}}"><a href="{{url()}}/namelist/view/{{$i}}">{{$i}}</a></li>
                            @endfor
                        </ul>
                    </div>
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
                <a class="btn btn-danger" onclick="delete_NameList()">確定刪除</a>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消刪除</button>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>
</body>
</html>