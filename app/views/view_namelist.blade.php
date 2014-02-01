<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>校園RFID系統｜檢視名冊</title>
    @include('import',array('target'=>'活動簽到'))
    <script>
        function delete_dialog(namelist_id,namelist_name){
            $('.del_name').text(namelist_name);
            $('#check_delete_dialog').modal('show');
        }

    </script>
</head>

<body>
    <div id="wrapper">
        @include('menu');
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
                                <td class="col-md-1">刪除</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>國立台灣科技大學學生會成員</td>
                                <td class="hidden-xs">台科大所有成員的資料、聯絡方式、信箱、職位等等台科大所有成員的資料、聯絡方式、信箱、職位等等</td>
                                <td><a href="{{url()}}/namelist/edit" class="btn btn-default">詳細</a></td>
                                <td><a onclick="delete_dialog(1,'國立台灣科技大學學生會成員')" class="btn btn-danger">刪除</a></td>
                            </tr>
                            <tr>
                                <td>國立台灣科技大學學生會成員</td>
                                <td class="hidden-xs">台科大所有成員的資料、聯絡方式、信箱、職位等等台科大所有成員的資料、聯絡方式、信箱、職位等等</td>
                                <td><a href="{{url()}}/namelist/edit" class="btn btn-default">詳細</a></td>
                                <td><a onclick="delete_dialog(1,'國立台灣科技大學學生會成員1')" class="btn btn-danger">刪除</a></td>
                            </tr>
                            <tr>
                                <td>國立台灣科技大學學生會成員</td>
                                <td class="hidden-xs">台科大所有成員的資料、聯絡方式、信箱、職位等等台科大所有成員的資料、聯絡方式、信箱、職位等等</td>
                                <td><a href="{{url()}}/namelist/edit" class="btn btn-default">詳細</a></td>
                                <td><a onclick="delete_dialog(1,'國立台灣科技大學學生會成員2')" class="btn btn-danger">刪除</a></td>
                            </tr>
                            <tr>
                                <td>國立台灣科技大學學生會成員</td>
                                <td class="hidden-xs">台科大所有成員的資料、聯絡方式、信箱、職位等等台科大所有成員的資料、聯絡方式、信箱、職位等等</td>
                                <td><a href="{{url()}}/namelist/edit" class="btn btn-default">詳細</a></td>
                                <td><a onclick="delete_dialog(1,'國立台灣科技大學學生會成員3')" class="btn btn-danger">刪除</a></td>
                            </tr>
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
                <a class="btn btn-danger">確定刪除</a>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消刪除</button>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>
</body>
</html>