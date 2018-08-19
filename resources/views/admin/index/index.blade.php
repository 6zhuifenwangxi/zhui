<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">

    <title> hAdmin- 主页</title>

    <meta name="keywords" content="">
    <meta name="description" content="">

    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->

    <link rel="shortcut icon" href="favicon.ico"> <link href="/admin/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/admin/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="/admin/css/animate.css" rel="stylesheet">
    <link href="/admin/css/style.css?v=4.1.0" rel="stylesheet">
</head>

<body class="fixed-sidebar full-height-layout gray-bg" style="overflow:hidden">
    <div id="wrapper">
        <!--左侧导航开始-->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="nav-close"><i class="fa fa-times-circle"></i>
            </div>
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear">
                                    <span class="block m-t-xs" style="font-size:20px;">
                                        <i class="fa fa-area-chart"></i>
                                    <strong class="font-bold">{{$name}}</strong>
                                    </span>
                                </span>
                            </a>
                        </div>
                        <div class="logo-element">hAdmin
                        </div>
                    </li>
                    <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">
                        <span class="ng-scope">分类</span>
                    </li>
                    <li>
                        <a class="J_menuItem" href="{{ route('index.welcome')}}">
                            <i class="fa fa-home"></i>
                            <span class="nav-label">主页</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa fa-users"></i>
                            <span class="nav-label">运动员管理</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a class="J_menuItem" href="{{route('athletes.index')}}">运动员列表</a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="{{route('athletes.add')}}">添加运动员信息</a>
                            </li>
                        </ul>
                    </li>
                     <li>
                        <a href="#">
                            <i class="fa fa fa-street-view"></i>
                            <span class="nav-label">赛事管理</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li>
                            <a class="J_menuItem" href="{{ route('math.index')}}">赛事列表</a>
                            </li>
                            <li>
                            <a class="J_menuItem" href="{{ route('math.add')}}">添加赛事</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa fa-database"></i>
                            <span class="nav-label">比赛数据管理</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a class="J_menuItem" href="{{route('Mdata.index')}}">比赛数据列表</a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="{{route('Mdata.add')}}">比赛数据添加</a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="{{route('excel.index')}}">比赛数据批量上传</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-cubes"></i>
                            <span class="nav-label">比赛成绩管理</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li>
                            <a class="J_menuItem" href="{{ route('achievement.index')}}">比赛成绩列表</a>
                            </li>
                        </ul>
                    </li>
                       <li>
                        <a href="#">
                            <i class="fa fa fa-user"></i>
                            <span class="nav-label">管理员管理</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a class="J_menuItem" href="{{route('admin.index')}}">管理员列表</a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="{{route('admin.add')}}">添加管理员</a>
                            </li>
                        </ul>
                    </li>
                    </li>
                </ul>
            </div>
        </nav>
        <!--左侧导航结束-->
        <!--右侧部分开始-->
        <div id="page-wrapper" class="gray-bg dashbard-1">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header"><a class="navbar-minimalize minimalize-styl-2 btn btn-info " href="#"><i class="fa fa-bars"></i> </a>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li class="dropdown">
                        <a class="dropdown-toggle count-info logout" data-toggle="dropdown" title='退出' href="#">
                                <i class="fa fa-close"></i>
                        </a>
                       
                        </li>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="row J_mainContent" id="content-main">
            <iframe id="J_iframe" width="100%" height="100%" src="{{ route('index.welcome')}}" frameborder="0" data-id="{{ route('index.welcome')}}" seamless></iframe>
            </div>
        </div>
        <!--右侧部分结束-->
    </div>

    <!-- 全局js -->
    <script src="/admin/js/jquery.min.js?v=2.1.4"></script>
    <script src="/admin/js/bootstrap.min.js?v=3.3.6"></script>
    <script src="/admin/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="/admin/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="/admin/js/plugins/layer/layer.min.js"></script>

    <!-- 自定义js -->
    <script src="/admin/js/hAdmin.js?v=4.1.0"></script>
    <script type="text/javascript" src="/admin/js/index.js"></script>

    <!-- 第三方插件 -->
    <script src="/admin/js/plugins/pace/pace.min.js"></script>
    <script src="/admin/js/plugins/layer/layer.min.js"></script>
<div style="text-align:center;">
<p>来源:<a href="http://www.mycodes.net/" target="_blank">源码之家</a></p>
</div>
</body>
<script>
    $(function(){
        $('.logout').click(function(){
            layer.confirm('确认要退出吗？',function(){
                $.get("{{route('public.logout')}}",function(data){
                    if(data=='1'){
                        location.href ="{{route('admin.public.index')}}";
                    }else{
                         layer.alert('退出失败');
                    }
                })
            })
        })
    })
</script>

</html>
