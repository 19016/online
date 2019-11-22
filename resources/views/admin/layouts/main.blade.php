<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>应用名称 - @yield('title')</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- inject:css -->
    <link rel="stylesheet" href="/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="/img/favicon.png" />
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <script src="vendors/js/vendor.bundle.addons.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="js/dashboard.js"></script>
</head>
<body>
<div class="container-scroller">
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <a class="navbar-brand brand-logo" href="index.html"><img src="img/logo.svg" alt="logo"/></a>
            <a class="navbar-brand brand-logo-mini" href="index.html"><img src="img/logo-mini.svg" alt="logo"/></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
            <div class="search-field d-none d-md-block">
                <form class="d-flex align-items-center h-100" action="#">
                    <div class="input-group">
                        <div class="input-group-prepend bg-transparent">
                            <i class="input-group-text border-0 mdi mdi-magnify"></i>
                        </div>
                        <input type="text" class="form-control bg-transparent border-0" placeholder="Search projects">
                    </div>
                </form>
            </div>
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item nav-profile dropdown">
                    @if(session('admins','a_name')=='')
                        <a href="/admin_login">登录</a>
                    @elseif(session('admins','a_name' != ''))
                        <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                            <div class="nav-profile-img">
                                <img src="img/faces/face1.jpg" alt="image">
                                <span class="availability-status online"></span>
                            </div>
                            <div class="nav-profile-text">
                                <p class="mb-1 text-black">{{session('admin.a_name')}}</p>
                            </div>
                        </a>
                        <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                            <a class="dropdown-item" href="javascript:;">
                                <i class="mdi mdi-cached mr-2 text-success"></i>
                                修改密码
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/quit">
                                <i class="mdi mdi-logout mr-2 text-primary"></i>
                                退出
                            </a>
                        </div>
                    @endif
                </li>
                <li class="nav-item d-none d-lg-block full-screen-link">
                    <a class="nav-link">
                        <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                        <i class="mdi mdi-email-outline"></i>
                        <span class="count-symbol bg-warning"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                        <h6 class="p-3 mb-0">Messages</h6>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <img src="img/faces/face4.jpg" alt="image" class="profile-pic">
                            </div>
                            <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Mark send you a message</h6>
                                <p class="text-gray mb-0">
                                    1 Minutes ago
                                </p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <img src="img/faces/face2.jpg" alt="image" class="profile-pic">
                            </div>
                            <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Cregh send you a message</h6>
                                <p class="text-gray mb-0">
                                    15 Minutes ago
                                </p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <img src="img/faces/face3.jpg" alt="image" class="profile-pic">
                            </div>
                            <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Profile picture updated</h6>
                                <p class="text-gray mb-0">
                                    18 Minutes ago
                                </p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <h6 class="p-3 mb-0 text-center">4 new messages</h6>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                        <i class="mdi mdi-bell-outline"></i>
                        <span class="count-symbol bg-danger"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                        <h6 class="p-3 mb-0">Notifications</h6>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-success">
                                    <i class="mdi mdi-calendar"></i>
                                </div>
                            </div>
                            <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                <h6 class="preview-subject font-weight-normal mb-1">Event today</h6>
                                <p class="text-gray ellipsis mb-0">
                                    Just a reminder that you have an event today
                                </p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-warning">
                                    <i class="mdi mdi-settings"></i>
                                </div>
                            </div>
                            <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                <h6 class="preview-subject font-weight-normal mb-1">Settings</h6>
                                <p class="text-gray ellipsis mb-0">
                                    Update dashboard
                                </p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-info">
                                    <i class="mdi mdi-link-variant"></i>
                                </div>
                            </div>
                            <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                <h6 class="preview-subject font-weight-normal mb-1">Launch Admin</h6>
                                <p class="text-gray ellipsis mb-0">
                                    New admin wow!
                                </p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <h6 class="p-3 mb-0 text-center">See all notifications</h6>
                    </div>
                </li>
                <li class="nav-item nav-logout d-none d-lg-block">
                    <a class="nav-link" href="#">
                        <i class="mdi mdi-power"></i>
                    </a>
                </li>
                <li class="nav-item nav-settings d-none d-lg-block">
                    <a class="nav-link" href="#">
                        <i class="mdi mdi-format-line-spacing"></i>
                    </a>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="mdi mdi-menu"></span>
            </button>
        </div>
    </nav>
    {{--左侧导航--}}
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item nav-profile">
                    <a href="#" class="nav-link">
                        <div class="nav-profile-image">
                            <img src="img/faces/face1.jpg" alt="profile">
                            <span class="login-status online"></span> <!--change to offline or busy as needed-->
                        </div>
                        <div class="nav-profile-text d-flex flex-column">
                            @if(session('admins','a_name')=='')
                                &nbsp;
                            @elseif(session('admins','a_name' != ''))
                                <span class="font-weight-bold mb-2">{{session('admins.a_name')}}</span>
                            @endif
                        </div>
                        <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/index">
                        <span class="menu-title">首页</span>
                        <i class="mdi mdi-home menu-icon"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                        <span class="menu-title">管理员管理</span>
                        <i class="menu-arrow"></i>
                        <i class="mdi mdi-crosshairs-gps menu-icon"></i>
                    </a>
                    <div class="collapse" id="ui-basic">
                    <ul class="nav nav-second-level">
                        <li>
                            <a class="J_menuItem" href="{{url('/admin')}}">管理员管理</a>
                        </li>
                        <li>
                            <a class="J_menuItem" href="{{url('/role')}}">角色管理</a>
                        </li>
                    </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages">
                        <span class="menu-title">教师管理</span>
                        <i class="menu-arrow"></i>
                        <i class="mdi mdi-medical-bag menu-icon"></i>
                    </a>
                    <div class="collapse" id="general-pages">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="/lectAdd"> 教师添加 </a></li>
                            <li class="nav-item"> <a class="nav-link" href="/lectList"> 教师展示 </a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#general-pgs" aria-expanded="false" aria-controls="general-pages">
                        <span class="menu-title">用户管理</span>
                        <i class="menu-arrow"></i>
                        <i class="mdi mdi-medical-bag menu-icon"></i>
                    </a>
                    <div class="collapse" id="general-pgs">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="/userAdd"> 用户添加 </a></li>
                            <li class="nav-item"> <a class="nav-link" href="/userList"> 用户展示 </a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#general-page" aria-expanded="false" aria-controls="general-pages">
                        <span class="menu-title">收藏管理</span>
                        <i class="menu-arrow"></i>
                        <i class="mdi mdi-medical-bag menu-icon"></i>
                    </a>
                    <div class="collapse" id="general-page">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="/collectList"> 收藏展示 </a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#general" aria-expanded="false" aria-controls="general-pages">
                        <span class="menu-title">收藏夹管理</span>
                        <i class="menu-arrow"></i>
                        <i class="mdi mdi-medical-bag menu-icon"></i>
                    </a>
                    <div class="collapse" id="general">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="/favoriteList"> 收藏夹展示 </a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#general-pag" aria-expanded="false" aria-controls="general-pages">
                        <span class="menu-title">课程管理</span>
                        <i class="menu-arrow"></i>
                        <i class="mdi mdi-medical-bag menu-icon"></i>
                    </a>
                    <div class="collapse" id="general-pag">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="/classAdd"> 课程添加 </a></li>
                            <li class="nav-item"> <a class="nav-link" href="/classList"> 课程展示 </a></li>
                            <li class="nav-item"> <a class="nav-link" href="/categoryAdd"> 课程分类添加 </a></li>
                            <li class="nav-item"> <a class="nav-link" href="/categoryList"> 课程分类展示 </a></li>
                            <li class="nav-item"> <a class="nav-link" href="/cataAdd"> 课程章节添加 </a></li>
                            <li class="nav-item"> <a class="nav-link" href="/cataList"> 课程章节展示 </a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#generer" aria-expanded="false" aria-controls="general-pages">
                        <span class="menu-title">题库管理</span>
                        <i class="menu-arrow"></i>
                        <i class="mdi mdi-medical-bag menu-icon"></i>
                    </a>
                    <div class="collapse" id="generer">
                        <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="/bank_add">题库添加 </a></li>
                            <li class="nav-item"> <a class="nav-link" href="/bank_list">题库列表 </a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#gener" aria-expanded="false" aria-controls="general-pages">
                        <span class="menu-title">问答管理</span>
                        <i class="menu-arrow"></i>
                        <i class="mdi mdi-medical-bag menu-icon"></i>
                    </a>
                    <div class="collapse" id="gener">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="/ques_list">问答列表 </a></li>
                            <li class="nav-item"> <a class="nav-link" href="/ques_auth">问答授权 </a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#genererer" aria-expanded="false" aria-controls="general-pages">
                        <span class="menu-title">资讯管理</span>
                        <i class="menu-arrow"></i>
                        <i class="mdi mdi-medical-bag menu-icon"></i>
                    </a>
                    <div class="collapse" id="genererer">
                        <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="/information_add">资讯添加 </a></li>
                            <li class="nav-item"> <a class="nav-link" href="/information_list">资讯列表 </a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#gesdsrer" aria-expanded="false" aria-controls="general-pages">
                        <span class="menu-title">轮播图管理</span>
                        <i class="menu-arrow"></i>
                        <i class="mdi mdi-medical-bag menu-icon"></i>
                    </a>
                    <div class="collapse" id="gesdsrer">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="/slideshow">轮播图列表 </a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#gesdssdsrer" aria-expanded="false" aria-controls="general-pages">
                        <span class="menu-title">导航栏管理</span>
                        <i class="menu-arrow"></i>
                        <i class="mdi mdi-medical-bag menu-icon"></i>
                    </a>
                    <div class="collapse" id="gesdssdsrer">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="/nav_list">导航栏列表 </a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#gerer" aria-expanded="false" aria-controls="general-pages">
                        <span class="menu-title">订单管理</span>
                        <i class="menu-arrow"></i>
                        <i class="mdi mdi-medical-bag menu-icon"></i>
                    </a>
                    <div class="collapse" id="gerer">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="/order_list">订单列表 </a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#general-p" aria-expanded="false" aria-controls="general-pages">
                        <span class="menu-title">评论管理</span>
                        <i class="menu-arrow"></i>
                        <i class="mdi mdi-medical-bag menu-icon"></i>
                    </a>
                    <div class="collapse" id="general-p">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="/commentList"> 评论展示 </a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#gen" aria-expanded="false" aria-controls="general-pages">
                        <span class="menu-title">笔记管理</span>
                        <i class="menu-arrow"></i>
                        <i class="mdi mdi-medical-bag menu-icon"></i>
                    </a>
                    <div class="collapse" id="gen">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="/noteList"> 笔记展示 </a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#ger" aria-expanded="false" aria-controls="general-pages">
                        <span class="menu-title">作业管理</span>
                        <i class="menu-arrow"></i>
                        <i class="mdi mdi-medical-bag menu-icon"></i>
                    </a>
                    <div class="collapse" id="ger">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="/jobAdd">作业添加 </a></li>
                            <li class="nav-item"> <a class="nav-link" href="/jobList">作业展示 </a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#gene" aria-expanded="false" aria-controls="general-pages">
                        <span class="menu-title">支付方式管理</span>
                        <i class="menu-arrow"></i>
                        <i class="mdi mdi-medical-bag menu-icon"></i>
                    </a>
                    <div class="collapse" id="gene">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="/payAdd"> 支付方式添加 </a></li>
                            <li class="nav-item"> <a class="nav-link" href="/payList"> 支付方式展示 </a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pages/forms/basic_elements.html">
                        <span class="menu-title">Forms</span>
                        <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="pages/charts/chartjs.html">
                        <span class="menu-title">Charts</span>
                        <i class="mdi mdi-chart-bar menu-icon"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pages/tables/basic-table.html">
                        <span class="menu-title">Tables</span>
                        <i class="mdi mdi-table-large menu-icon"></i>
                    </a>
                </li>
                <div class="tlinks">Collect from <a href="http://www.cssmoban.com/" >企业网站模板</a></div>
                <li class="nav-item sidebar-actions">
            <span class="nav-link">
              <div class="border-bottom">
                <h6 class="font-weight-normal mb-3">Projects</h6>
              </div>
              <button class="btn btn-block btn-lg btn-gradient-primary mt-4">+ Add a project</button>
              <div class="mt-4">
                <div class="border-bottom">
                  <p class="text-secondary">Categories</p>
                </div>
                <ul class="gradient-bullet-list mt-4">
                  <li>Free</li>
                  <li>Pro</li>
                </ul>
              </div>
            </span>
                </li>
            </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
        {{--主体内容--}}

        @yield('content')
        {{--结束主体内容--}}
        <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->

            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    {{--结束左侧导航--}}




</div>
</body>
</html>