<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="brand-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a href="{{url()}}" class="navbar-brand">校園RFID系統</a>
    </div>
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li><a href="{{url()}}">總覽</a></li>
            <!-- <li><a href="{{url()}}/search">搜尋</a></li> -->
            @if (Login::getType() == 'admin')
                <li class="dropdown">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown">系統管理</a>
                    <ul class="dropdown-menu">
                        <li><a href="{{url()}}/user/create">新增用戶</a></li>
                        <li><a href="{{url()}}/user/view">檢視用戶</a></li>
                    </ul>
                </li>
            @endif
            <li class="dropdown">
                <a href="" class="dropdown-toggle" data-toggle="dropdown">活動簽到</a>
                <ul class="dropdown-menu">
                    <li><a href="{{url()}}/namelist/create">建立名冊</a></li>
                    <li><a href="{{url()}}/activity/create">建立活動</a></li>
                    <li><a href="{{url()}}/activity/view">檢視活動</a></li>
                    <li><a href="{{url()}}/namelist/view">檢視名冊</a></li>
                    <li><a href="{{url()}}/activity/check">活動簽到</a></li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="" class="dropdown-toggle" data-toggle="dropdown">器材借用</a>
                <ul class="dropdown-menu">
                    <li><a href="{{url()}}/equip/history">借用記錄</a></li>
                    <li><a href="{{url()}}/equip/borrow">借還登記</a></li>
                </ul>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right navbar-user">
            <li><a href=""><i class="fa fa-file"></i> 關於</a></li>
            <li class="dropdown user-dropdown">
                <a href="" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-user"></i>
                     {{Login::getName()}}
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="{{url()}}/me"><i class="fa fa-user"></i> 個人資料</a></li>
                    <li class="divider"></li>
                    <li><a href="{{url()}}/logout"><i class="fa fa-power-off"></i> 登出</a></li>
                </ul>
            </li>
        </ul>
        
    </div>
</nav>