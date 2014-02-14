<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>校園RFID系統｜檢視簽到記錄</title>
    @include('import',array('target'=>'活動簽到'))

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
                        <li><a href="{{url()}}/activity/detail/{{$aid}}/{{$current_page}}">檢視簽到記錄</a></li>
                        
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
                                    <td class="col-md-10">{{{$activity_data->activity_name}}}</td>
                                </tr>
                                <tr>
                                    <td>活動內容</td>
                                    <td>{{{$activity_data->activity_desc}}}</td>
                                </tr>
                                <tr>
                                    <td>簽到類型</td>
                                    <td>{{{str_replace(array('no_check','strict_check','only_prompt'), array('無需身分驗證','需嚴格身分驗證','僅需提示身份是否符合'), $activity_data->activity_type)}}}</td>
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
                                <a href="" class="btn btn-default dropdown-toggle" data-toggle="dropdown">共{{{$checkin_total}}}人簽到 <span class="caret"></span></a>

                                <ul class="dropdown-menu" role="menu">
                                    @foreach ($groupnum as $row)
                                        <li><a href="">{{{$row->date}}}共{{{$row->num}}}人</a></li>
                                    @endforeach
                                    
                                </ul>
                            </div>
                        </div>
                    </div>  <!-- row end -->
                    <form action="">
                        <table class="table-hover table activity_check_list">
                            <thead>
                                @if ($activity_data->activity_type == 'no_check')
                                    <tr>
                                        <td>姓名</td>
                                        <td>學號</td>
                                        <td>簽到日期</td>
                                        <td>簽到時間</td>
                                    </tr>
                                @else
                                    <tr>
                                        <td>姓名</td>
                                        <td>學號</td>
                                        <td>科系</td>
                                        <td>簽到日期</td>
                                        <td>簽到時間</td>
                                        <td>資格</td>
                                    </tr>
                                @endif
                                
                            </thead>
                            <tbody>
                                @if ($activity_data->activity_type == 'no_check')
                                    @foreach ($checkin_data as $checkin)
                                        <tr>
                                            <td>XXX</td>
                                            <td>{{{$checkin->student_id}}}</td>
                                            <td>{{{date('Y/m/d', strtotime($checkin->check_time))}}}</td>
                                            <td>{{{date('H:i:s', strtotime($checkin->check_time))}}}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    @foreach ($checkin_data as $checkin)
                                        <tr>
                                            <td>{{{$checkin->name}}}</td>
                                            <td>{{{$checkin->student_id}}}</td>
                                            <td>{{{$checkin->department}}}</td>
                                            <td>{{{date('Y/m/d', strtotime($checkin->check_time))}}}</td>
                                            <td>{{{date('H:i:s', strtotime($checkin->check_time))}}}</td>
                                            <td>{{{$checkin->job}}}</td>
                                        </tr>
                                    @endforeach
                                @endif
                                
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>  <!-- row end -->
            <div class="row">
                
                <div class="col-md-4 col-xs-8 col-sm-7 col-md-offset-4">
                    <ul class="pagination">
                        @for ($i=1; $i<=$pagenum; $i++)
                            <li class="{{$i==$current_page?'active':''}}"><a href="{{url()}}/activity/detail/{{$aid}}/{{$i}}">{{$i}}</a></li>
                        @endfor
                    </ul>
                </div>
                <div class="col-md-3 col-xs-4 col-sm-5 pull-right">
                    <div class="btn-group pull-right activity_btn_group">
                        <a href="" class="btn btn-default hidden-xs">匯出記錄</a>
                        <a href="" class="btn btn-default dropdown-toggle" data-toggle="dropdown">共{{{$checkin_total}}}人簽到 <span class="caret"></span></a>

                        <ul class="dropdown-menu" role="menu">
                            @foreach ($groupnum as $row)
                                <li><a href="">{{{$row->date}}}共{{{$row->num}}}人</a></li>
                            @endforeach
                            
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