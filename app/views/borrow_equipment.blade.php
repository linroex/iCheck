<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>校園RFID系統｜借還登記</title>
    @include('import',array('target'=>'器材借用'))
    <script>
        $(document).ready(function(){
            $('#return_date').datepicker();
            
            $('#stu_card').keypress(function(e){
                if(($('#stu_card').val().length == 9) && e.which == 13){
                    $.post('{{url()}}/equip/return/not',{student_id:$('#stu_card').val()},function(data){
                        if(data!='false'){
                            data = JSON.parse(data);
                            i = 0;
                            $('.wait-to-return').removeClass('hidden');
                            $.each(data,function(){
                                // console.log(data[i].equip_name);
                                var now = new Date();
                                var type = "";
                                if(Date.parse(now) > Date.parse(data[i].estimate_return_time)){
                                    type = "danger";
                                }
                                $('tbody').append('<tr class="' + type + '"><td><input type="checkbox" name="bid[]" value="' 
                                    + data[i].bid
                                    +'"></td><td>' 
                                    + data[i].equip_name 
                                    + '</td><td>' 
                                    + data[i].borrow_time 
                                    + '</td></tr>');
                                i++;
                            })
                        }
                    })                    
                }
            });
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
                            <h1>借還登記</h1>
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
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div> <!-- row -->
            <div class="row">
                {{Form::open()}}
                <div class="col-md-9 col-xs-12 col-sm-12">
                    <h3>借用、歸還</h3>
                    <div class="form-group">
                        <label for="stu_card">學生證</label>
                        <input type="text" class="form-control" id="stu_card" placeholder="請刷學生證">
                    </div>
                    <div class="form-group wait-to-return hidden">
                        <label for="">歸還</label>
                        <table class="table table-hover">
                            <thead>
                                <td></td>
                                <td>器材名稱</td>
                                <td>借用日期</td>
                                <!-- 逾時歸還用紅框 -->
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="form-group">
                        <label for="">借用</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">歸還日期</label>
                        <input type="text" class="form-control" id="return_date">
                    </div>
                    <div class="form-group">
                        <div class="btn-group pull-right">
                            <input type="button" value="借用" class="btn btn-lg btn-default">
                            <input type="button" value="歸還" class="btn btn-lg btn-default">

                        </div>
                    </div>
                
                    
                </div> <!-- col-md-9 -->
                
                {{Form::close()}}
            </div>

        </div> <!-- page-wrapper -->
    </div>
</body>
</html>