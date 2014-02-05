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
        function delete_select_member(){
            $('#check_dialog').modal('hide');
            $.post('{{url()}}/namelist/member/delete',$('#member_form').serialize(),function(data){

                if(data == 1){
                    $('#member_form input:checked').parent().parent().remove();
                    $('.breadcrumb').parent().append('<div class="alert alert-success">成功刪除指定的成員</div>');
                }else{
                    console.log(data);
                }
            })
        }
        function del_select_member_dialog(){
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
        function update_namelist(){
            
            $.post('{{url()}}/namelist/edit',$('#namelist_data').serialize(),function(data){
                $('.alert').remove();
                $('.breadcrumb').parent().append('<div class="alert alert-success">' + data + '</div>');
            });
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
                            <li><a href="{{url()}}/namelist/edit/{{$data[0]['nid']}}">編輯名冊</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <h3>基本資料</h3>
                    {{Form::model($data[0],array('id'=>'namelist_data'))}}
                        {{Form::hidden('nid')}}
                        <table class="table">
                            <tr>
                                <td class="col-md-3">名冊名稱</td>
                                <td class="col-md-9">{{Form::text('namelist_name',null,array('class'=>'form-control','id'=>'namelist_name','required'))}}</td>
                            </tr>
                            <tr>
                                <td>名冊說明</td>
                                <td>{{Form::textarea('namelist_desc',null,array('class'=>'form-control','rows'=>5,'id'=>'namelist_desc'))}}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="button" onclick="update_namelist()" value="送出" class="pull-right btn btn-primary btn-lg"></td>
                            </tr>
                        </table>

                    {{Form::close()}}
                </div>
            </div> <!-- row end -->
            

            <div class="row">
                
                <div class="col-md-12">
                    <h3>名冊成員</h3>
                    {{Form::open(array('id'=>'member_form'))}}
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
                                @foreach ($member as $row)
                                    <tr id="nmid-{{$row->nmid}}">
                                        <td><input type="checkbox" name="nmid[]" value="{{$row->nmid}},{{$row->name}}"></td>
                                        <td>{{$row->name}}</td>
                                        <td>{{$row->student_id}}</td>
                                        <td>{{$row->department}}</td>
                                        <td class="hidden-xs">{{$row->job}}</td>
                                        <td class="hidden-xs">{{$row->phone}}</td>
                                        <td class="hidden-xs">{{$row->email}}</td>
                                        <td><a href="{{url()}}/namelist/edit/member/{{$row->nmid}}" class="btn btn-primary">編輯</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    {{Form::close()}}


                </div>
            </div>  <!-- row end -->
            <div class="row">
                <div class="col-md-4 hidden-xs col-sm-4">
                    <a onclick="del_select_member_dialog()" class="btn btn-danger">刪除選定成員</a>
                </div>
                <div class="col-md-3 col-xs-6 col-sm-3">
                    <ul class="pagination">
                        @for ($i = 1; $i<=$pagenum; $i++)
                            <li class="{{$i==$current_page?'active':''}}"><a href="{{url()}}/namelist/edit/{{$data[0]['nid']}}/{{$i}}">{{$i}}</a></li>
                        @endfor
                    </ul>
                </div>
                <div class="col-md-5 col-xs-6 col-sm-5">
                
                    {{Form::open(array('url'=>url().'/namelist/export'))}}
                    {{Form::hidden('nid',$data[0]['nid'])}}
                    <input type="submit" value="匯出名冊" class="pull-right btn btn-default hidden-xs">
                    {{Form::close()}}

                    {{Form::open(array('url'=>url().'/namelist/delete'))}}
                    {{Form::hidden('nid',$data[0]['nid'])}}
                    <input type="submit" value="刪除名冊" class="pull-right btn btn-danger hidden-xs" style="margin-right:15px;">
                    {{Form::close()}}
                    <!-- <a onclick="del_namelist_check(1,'國立台灣科技大學學生會')" class="pull-right btn btn-danger">刪除名冊</a> -->
                
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
                <button type="button" class="btn btn-danger" onclick="delete_select_member()">確定刪除</button>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

    </div>
</body>
</html>
