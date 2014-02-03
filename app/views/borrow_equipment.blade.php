<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>校園RFID系統｜借還登記</title>
    @include('import',array('target'=>'器材借用'))
    <script>

        $(document).ready(function(){
            
            var origin = $('#reset-clear').html();
            $('.return_date').datepicker();
            var flag = false;
            $('#stu_card').keypress(function(e){
                if(($('#stu_card').val().length == 9) && e.which == 13){
                    if(flag == true){
                        $('#reset-clear').html(origin);
                        $('.return_date').datepicker();
                        flag = false;

                    }
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
                                $('.wait-to-return tbody').append('<tr class="' + type + '"><td><input type="checkbox" name="bid[]" value="' 
                                    + data[i].bid
                                    +'"></td><td>' 
                                    + data[i].equip_name 
                                    + '</td><td>' 
                                    + $.datepicker.formatDate('yy/mm/dd',new Date(data[i].borrow_time)) 
                                    + '</td></tr>');
                                i++;
                            })
                        }
                        $('.borrow-table').removeClass('hidden');
                        flag = true;
                    })                    
                }
            });
            
        })
        function borrow(){
            $(".alert").remove();
            $.post('{{url()}}/equip/borrow',$('form').serialize(),function(data){
                $("form input:text").val('');
                $('.breadcrumb').parent().append('<div class="alert alert-success">' + data + '</div>')
            })
        }
        function returnEquip(){
            $(".alert").remove();
            $.post('{{url()}}/equip/return',$('form').serialize(),function(data){
                $("form input:text").val('');
                $('.breadcrumb').parent().append('<div class="alert alert-success">' + data + '</div>');
                $("input:checked").parent().parent().remove();

            })
        }
        function add_item(){
            $(".borrow-table tbody").append('<tr><td><input type="text" class="form-control" name="equip_name[]"></td><td><input type="text" class="form-control return_date" name="return_date[]"></td></tr>');
            $('.return_date').datepicker();
        }
        function del_item(){
            $(".borrow-table tbody tr").last().remove();
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
                <div class="col-md-12 col-xs-12 col-sm-12">
                    <div class="well">
                        <label for="stu_card" class="control-label">學生證</label>
                        <input type="text" class="form-control" id="stu_card" name="student_id" placeholder="請刷學生證">
                    </div>
                    <div id="reset-clear">
                        <div class="wait-to-return hidden col-md-6">
                            <h3>歸還</h3>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <td></td>
                                        <td>器材名稱</td>
                                        <td>借用日期</td>
                                    </tr>
                                    
                                </thead>
                                <tbody>
                                    
                                </tbody>
                            </table>
                            <a onclick="returnEquip()" class="btn btn-primary btn-lg pull-right">歸還</a>

                        </div>
                        <div class="borrow-table hidden col-md-6">
                            <h3>借用</h3>
                            <table class="table table-hover">
                               <thead>
                                   <tr>
                                       <td class="col-md-4">器材名稱</td>
                                       <td class="col-md-8">預計歸還日期</td>
                                   </tr>
                               </thead>
                               <tbody>
                                   <tr>
                                       <td><input type="text" class="form-control" name="equip_name[]"></td>
                                       <td><input type="text" class="form-control return_date" name="return_date[]"></td>
                                   </tr>
                                   
                               </tbody>
                            </table>
                            <div class="btn-group">
                                <a onclick="add_item()" class="btn btn-default">增加</a>
                                <a onclick="del_item()" class="btn btn-default">減少</a>
                            </div>
                            <a onclick="borrow()" class="btn btn-primary btn-lg pull-right">借用</a>

                        </div>
                    </div> <!-- reset-clear -->
                </div> <!-- col-md-12 -->
                
                {{Form::close()}}
            </div>

        </div> <!-- page-wrapper -->
    </div>
</body>
</html>