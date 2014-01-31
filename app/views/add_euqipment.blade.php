<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>校園RFID系統｜新增器材</title>
    @include('import')
    <script>
        $(document).ready(function(){
            $('#select_equipment_file').click(function(e){
                e.preventDefault();
                $('#upload_equipment_file').click();
            })
            $('#upload_equipment_file').change(function(){
                $('#equipment_path').val($(this).val().replace('C:\\fakepath\\',''));
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
                            <h1>新增器材</h1>
                        </div>
                        <div class="col-md-9 hidden-xs col-sm-8">
                            <div class="btn-group quick-btn pull-right">
                                <a href="add_euqipment.php" class="btn btn-default">新增器材</a>
                                <a href="view_equipment.php" class="btn btn-default">器材清單</a>
                                <a href="{{url()}}/equip/history" class="btn btn-default">借用記錄</a>
                                <a href="{{url()}}/equip/borrow" class="btn btn-default">借還登記</a>
                                           
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="breadcrumb">
                                <li><a href="{{url()}}/equip/borrow">器材借用</a></li>
                                <li><a href="view_equipment.php">器材清單</a></li>
                                <li><a href="add_euqipment.php">新增器材</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div> <!-- row -->

            <div class="row">
                 <div class="col-md-8">
                     <form action="" enctype="multipart/form-data">
                         <table class="table">
                             <tr>
                                 <td class="col-md-3 col-sm-3 col-xs-3">上傳檔案</td>
                                 <td>
                                     <div class="input-group">
                                         <input type="text" class="form-control" id="equipment_path">
                                         <div class="input-group-btn">
                                             <a class="btn btn-success" id="select_equipment_file">位置</a>
                                         </div>
                                     </div>
                                     <input type="file" name="upload_equipment_file" id="upload_equipment_file" style="display:none;">
                                 </td>
                             </tr>
                             <tr>
                                 <td></td>
                                 <td><input type="submit" value="上傳" class="btn btn-primary btn-lg pull-right"></td>
                             </tr>
                         </table>
                         
                    </form>
                </div>
            </div> <!-- row -->



        </div> <!-- page-wrapper -->
    </div>
</body>
</html>