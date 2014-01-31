<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>校園RFID系統｜建立名冊</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/sb-admin.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>

    <script>
        $(document).ready(function(){
            $('#select_namelist_file').click(function(e){
                e.preventDefault();
                $('#upload_namelist_file').click();
            })
            $('#upload_namelist_file').change(function(){
                $('#namelist_path').val($(this).val().replace('C:\\fakepath\\',''));
            })
        })
    </script>

</head>

<body>
    <div id="wrapper">
        <?php include('menu.php'); ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-3 col-sm-4">
                            <h1>建立名冊</h1>
                        </div>
                        <div class="col-md-9 hidden-xs col-sm-8">
                            <div class="btn-group quick-btn pull-right">
                                <a href="create_activity.php" class="btn btn-default">建立活動</a>
                                <a href="create_namelist.php" class="btn btn-default">建立名冊</a>
                                <a href="view_activity.php" class="btn btn-default">檢視活動</a>
                                <a href="view_namelist.php" class="btn btn-default">檢視名冊</a>              
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="breadcrumb">
                                <li>活動簽到</li>
                                <li><a href="view_namelist.php">檢視名冊</a></li>
                                <li><a href="create_namelist.php">建立名冊</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                 <div class="col-md-8">
                     <form action="" enctype="multipart/form-data">
                            
                             <table class="table">
                                 <tr>
                                     <td class="col-md-3 field-name">名冊名稱</td>
                                     <td class="col-md-9"><input type="text" class="form-control"></td>
                                 </tr>
                                 <tr>
                                     <td>名冊說明</td>
                                     <td><textarea name="" id="" rows="5" class="form-control col-md-12"></textarea></td>
                                 </tr>
                                 <tr>
                                     <td>上傳檔案</td>
                                     <td>
                                         <div class="input-group">
                                             <input type="text" class="form-control" id="namelist_path">
                                             <div class="input-group-btn">
                                                 <a class="btn btn-success" id="select_namelist_file">位置</a>
                                             </div>
                                         </div>
                                         <input type="file" name="upload_namelist_file" id="upload_namelist_file" style="display:none;">
                                     </td>
                                 </tr>
                                 <tr>
                                     <td></td>
                                     <td><input type="submit" value="建立" class="btn btn-primary btn-lg pull-right"></td>
                                 </tr>
                             </table>
                         
                    </form>
                </div>
            </div> <!-- row -->
        </div>
    </div>
</body>
</html>