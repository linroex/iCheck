<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="brand-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a href="index.php" class="navbar-brand">校園RFID系統</a>
    </div>
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li class="active"><a href="index.php">總覽</a></li>
            <li><a href="search.php">搜尋</a></li>
            
            <li class="dropdown">
                <a href="" class="dropdown-toggle" data-toggle="dropdown">活動簽到</a>
                <ul class="dropdown-menu">
                    <li><a href="create_namelist.php">建立名冊</a></li>
                    <li><a href="create_activity.php">建立活動</a></li>
                    <li><a href="view_activity.php">檢視活動</a></li>
                    <li><a href="view_namelist.php">檢視名冊</a></li>
                    <li><a href="activity_check.php">活動簽到</a></li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="" class="dropdown-toggle" data-toggle="dropdown">器材借用</a>
                <ul class="dropdown-menu">
                    <!-- <li><a href="add_euqipment.php">新增器材</a></li>
                    <li><a href="view_equipment.php">器材清單</a></li> -->
                    <li><a href="history_equipment.php">借用記錄</a></li>
                    <li><a href="borrow_equipment.php">借還登記</a></li>
                </ul>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right navbar-user">
            <li><a href=""><i class="fa fa-file"></i> 關於</a></li>
            <li class="dropdown user-dropdown">
                <a href="" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-user"></i>
                     用戶 
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="user.php"><i class="fa fa-user"></i> 個人資料</a></li>
                    <li class="divider"></li>
                    <li><a href="logout.php"><i class="fa fa-power-off"></i> 登出</a></li>
                </ul>
            </li>
        </ul>
        
    </div>
</nav>