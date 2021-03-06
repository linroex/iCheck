<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iCheck｜借用記錄</title>
    @include('import',array('target'=>'器材借用'))
    <script>
        
        $(document).ready(function(){
            $('ul.pagination li a').click(function(e){
                e.preventDefault();
            })
            $('#history_tab a').click(function (e) {
                e.preventDefault();
                $(this).tab('show');              
            })    
            
            $('#month').change(function(){
                var target = $("#history_tab li.active a").attr('href');
                $('input.month').val($('#month').val());
                load_record($(target).find('ul.pagination li.active a').text(),target.replace('#',''));
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
                            <h1>借用記錄</h1>
                        </div>
                        <div class="col-md-9 hidden-xs col-sm-8">
                            <div class="btn-group quick-btn pull-right">
                                <a href="{{url()}}/equip/history" class="btn btn-default">借用記錄</a>
                                <a href="{{url()}}/equip/borrow" class="btn btn-default">借還登記</a>
                                           
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="breadcrumb">
                                <li><a href="{{url()}}/equip/borrow">器材借用</a></li>
                                <li><a href="{{url()}}/equip/history">借用記錄</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div> <!-- row -->

            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-tabs" id="history_tab">
                        <li class="active"><a href="#not_return" data-toggle="tab">未歸還</a></li>
                        <li><a href="#returned" data-toggle="tab">已歸還</a></li>
                        <li><a href="#be_lated" data-toggle="tab">待催討</a></li>
                        <div class="pull-right">
                            <select name="month" id="month" class="form-control">
                                <option value="all">全部</option>
                                <option value="1">一月</option>
                                <option value="2">二月</option>
                                <option value="3">三月</option>
                                <option value="4">四月</option>
                                <option value="5">五月</option>
                                <option value="6">六月</option>
                                <option value="7">七月</option>
                                <option value="8">八月</option>
                                <option value="9">九月</option>
                                <option value="10">十月</option>
                                <option value="11">十一月</option>
                                <option value="12">十二月</option>
                            </select>
                        </div>
                    </ul>
                    
                    <div class="tab-content">
                        <div class="tab-pane active fade in" id="not_return">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <td>借用人</td>
                                        <td>學號</td>
                                        <td>器材名稱</td>
                                        <td>借用日期</td>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach (json_decode($content['not_return'],true) as $record)
                                        <tr>

                                            <td>{{{$record['name']}}}</td>
                                            <td>{{{$record['student_id']}}}</td>
                                            <td>{{{$record['equip_name']}}}</td>
                                            <td>{{{date('Y/m/d H:i',strtotime($record['borrow_time']))}}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pull-left">
                                <form action="{{url()}}/equip/export" method="post">
                                    <input type="hidden" name="month" class="month" value="all">
                                    <input type="hidden" name="type" value="not_return">
                                    <input type="submit" class="btn btn-success" value="匯出資料">
                                </form>
                            </div>
                            <ul class="pagination pull-right">
                                @for ($i=1; $i<=$pagenum['not_return']; $i++)
                                    <li class="{{$i==1?'active':''}}"><a href="" onclick="load_record({{$i}},'not_return')">{{$i}}</a></li>
                                @endfor
                            </ul>
                        </div> <!-- tab-pane -->
                        <div class="tab-pane fade in" id="returned">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <td>借用人</td>
                                        <td>學號</td>
                                        <td>器材名稱</td>
                                        <td>借用日期</td>
                                        <td>歸還日期</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (json_decode($content['returned'],true) as $record)
                                        <tr>
                                            <td>{{{$record['name']}}}</td>
                                            <td>{{{$record['student_id']}}}</td>
                                            <td>{{{$record['equip_name']}}}</td>
                                            <td>{{{date('Y/m/d H:i',strtotime($record['borrow_time']))}}}</td>
                                            <td>{{{date('Y/m/d H:i',strtotime($record['return_time']))}}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pull-left">
                                <form action="{{url()}}/equip/export" method="post">
                                    <input type="hidden" name="month" class="month" value="all">
                                    <input type="hidden" name="type" value="returned">
                                    <input type="submit" class="btn btn-success" value="匯出資料">
                                </form>
                            </div>
                            <ul class="pagination pull-right">
                                @for ($i=1; $i<=$pagenum['returned']; $i++)
                                    <li class="{{$i==1?'active':''}}"><a href="" onclick="load_record({{$i}},'returned')">{{$i}}</a></li>
                                @endfor
                            </ul>
                        </div> <!-- tab-pane -->
                        <div class="tab-pane fade in" id="be_lated">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <td>借用人</td>
                                        <td>學號</td>
                                        <td>器材名稱</td>
                                        <td>借用日期</td>
                                        <td>預計歸還日期</td>
                                        <td>逾期天數</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (json_decode($content['be_lated'],true) as $record)
                                        <tr>
                                            <td>{{{$record['name']}}}</td>
                                            <td>{{{$record['student_id']}}}</td>
                                            <td>{{{$record['equip_name']}}}</td>
                                            <td>{{{date('Y/m/d H:i',strtotime($record['borrow_time']))}}}</td>
                                            <td>{{{date('Y/m/d H:i',strtotime($record['estimate_return_time']))}}}</td>
                                            <td>{{{date('j',time()-strtotime($record['estimate_return_time']))}}}天</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pull-left">
                                <form action="{{url()}}/equip/export" method="be_lated">
                                    <input type="hidden" name="month" class="month" value="all">
                                    <input type="hidden" name="type" value="not_return">
                                    <input type="submit" class="btn btn-success" value="匯出資料">
                                </form>
                            </div>
                            <ul class="pagination pull-right">
                                @for ($i=1; $i<=$pagenum['be_lated']; $i++)
                                    <li class="{{$i==1?'active':''}}"><a href="" onclick="load_record({{$i}},'be_lated')">{{$i}}</a></li>
                                @endfor
                            </ul>
                        </div> <!-- tab-pane -->
                    </div>
                    
                </div>
            </div>
        </div> <!-- page-wrapper -->
    </div>
</body>
</html>