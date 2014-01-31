<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>校園RFID系統｜編輯成員資料</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/sb-admin.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
    
</head>

<body>
    <div id="wrapper">
        <?php include('menu.php'); ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <h1>編輯成員資料</h1>
                    <ul class="breadcrumb">
                        <li>活動簽到</li>
                        <li><a href="view_namelist.php">檢視名冊</a></li>
                        <li><a href="edit_namelist.php">編輯名冊</a></li>
                        <li><a href="edit_namelist_member_data.php">編輯成員資料</a></li>
                    </ul>
                </div>
            </div> <!-- row end -->
            <div class="row">
                <div class="col-md-8">
                    <form action="">
                        <table class="table table-striped">
                            <tr>
                                <td class="col-md-2 col-xs-3">姓名</td>
                                <td class="col-md-10 col-xs-9"><input type="text" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>學號</td>
                                <td><input type="text" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>職位</td>
                                <td><input type="text" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>電話</td>
                                <td><input type="tel" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>信箱</td>
                                <td><input type="email" class="form-control"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" value="送出" class="pull-right btn btn-lg btn-primary"></td>
                            </tr>
                        </table>
                    </form>
                </div> <!-- col-md-8 end -->
            </div> <!-- row end -->
        </div> <!-- page-wrapper end -->
    </div>
</body>
</html>