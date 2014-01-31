<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>校園RFID系統｜搜尋</title>
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
                    <h1>搜尋</h1>
                    <ul class="breadcrumb">
                        <li><a href="search.php">搜尋</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-7 ">
                    <form>
                        <div class="form-group">
                            <div class="col-md-3">
                                <select name="" id="" class="form-control">
                                    <option value="">曾參與活動</option>
                                    <option value="">未歸還設備</option>
                                    <option value="">名冊資料</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-7">
                                <input type="text" class="form-control" placeholder="請輸入學號、姓名、職位或其他相關資料">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-2">
                                <input type="submit" value="查詢" class="btn btn-primary form-control">
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
            
            <div class="row search-result">
                <div class="col-md-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <p class="panel-title">搜尋結果</p>
                        </div>
                        <div class="panel-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <td>活動名稱</td>
                                        <td>活動日期</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>學生計算機年會</td>
                                        <td>102.10.1</td>
                                    </tr>
                                    <tr>
                                        <td>學生計算機年會</td>
                                        <td>102.10.1</td>
                                    </tr>
                                    <tr>
                                        <td>學生計算機年會</td>
                                        <td>102.10.1</td>
                                    </tr>
                                    <tr>
                                        <td>學生計算機年會</td>
                                        <td>102.10.1</td>
                                    </tr>
                                    <tr>
                                        <td>學生計算機年會</td>
                                        <td>102.10.1</td>
                                    </tr>
                                    <tr>
                                        <td>學生計算機年會</td>
                                        <td>102.10.1</td>
                                    </tr>
                                </tbody>
                            </table>
                            
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pull-right">
                                <ul class="pagination">
                                    <li class="active"><a href="">1</a></li>
                                    <li><a href="">2</a></li>
                                    <li><a href="">3</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>