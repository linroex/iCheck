<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>校園RFID系統｜活動簽到</title>
    @include('import',array('target'=>'活動簽到'))
</head>

<body>
    <div id="wrapper">
        @include('menu')
        <div id="page-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-3 col-sm-4">
                            <h1>活動簽到</h1>
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
                                <li><a href="{{url()}}/activity/check">活動簽到</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div> <!-- row -->
            <div class="row">
                <div class="col-md-6">
                    <form action="">
                        
                            <div class="form-group">
                                <label for="select_activity">選擇活動</label>
                                <select name="" id="select_activity" class="form-control">
                                    <option value="">台科大電影節</option>
                                    <option value="">大登陸演唱會</option>
                                    <option value="">電研社課</option>
                                    <option value="">桌遊社課</option>
                                </select>
                            </div>
                            
                        
                            <div class="form-group">
                                <label for="stu_card">學生證</label>
                                <input type="text" class="form-control" id="stu_card" placeholder="請刷學生證">
                            </div>
                            
                    </form>
                    <div class="alert alert-success">
                        <h3 class="text-center">活動資訊載入成功</h3>
                        <p class="text-center">此活動需使用名冊</p>
                        <br>
                        <ul class="list-group">
                            <li class="list-group-item">活動名稱</li>
                            <li class="list-group-item">活動內容</li>
                            <li class="list-group-item">簽到類型</li>
                            <li class="list-group-item">活動時間</li>
                            <li class="list-group-item">主辦單位</li>
                        </ul>
                    </div>
                    
                </div>
                <div class="col-md-6">
                    <div class="pull-right">
                        <div class="btn-group">
                            <a href="" class="btn btn-default">已簽到人數100人</a>
                        </div>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <td>姓名</td>
                                <td>學號</td>
                                <td>時間</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>林熙哲</td>
                                <td>B10209019</td>
                                <td>17:19</td>
                            </tr>
                            <tr>
                                <td>林熙哲</td>
                                <td>B10209019</td>
                                <td>17:19</td>
                            </tr>
                            <tr>
                                <td>林熙哲</td>
                                <td>B10209019</td>
                                <td>17:19</td>
                            </tr>
                            <tr>
                                <td>林熙哲</td>
                                <td>B10209019</td>
                                <td>17:19</td>
                            </tr>
                            <tr>
                                <td>林熙哲</td>
                                <td>B10209019</td>
                                <td>17:19</td>
                            </tr>
                            <tr>
                                <td>林熙哲</td>
                                <td>B10209019</td>
                                <td>17:19</td>
                            </tr>
                            <tr>
                                <td>林熙哲</td>
                                <td>B10209019</td>
                                <td>17:19</td>
                            </tr>
                            <tr>
                                <td>林熙哲</td>
                                <td>B10209019</td>
                                <td>17:19</td>
                            </tr>
                            <tr>
                                <td>林熙哲</td>
                                <td>B10209019</td>
                                <td>17:19</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- page-wrapper -->
    </div>
</body>
</html>