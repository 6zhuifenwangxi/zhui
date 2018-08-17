<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title> - 基本表单</title>
    <meta name="keywords" content="">
    <meta name="description" content="">

    <link rel="shortcut icon" href="favicon.ico"> <link href="/admin/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/admin/css/font-awesome.css?v=4.4.0" rel="stylesheet">
    <link href="/admin/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="/admin/css/animate.css" rel="stylesheet">
    <link href="/admin/css/style.css?v=4.1.0" rel="stylesheet">
 	<link href="/admin/css/plugins/switchery/switchery.css" rel="stylesheet">
</head>
<script></script>
<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-10">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>
                             @if(!$mes)
                                添加管理员
                             @else
                                添加失败 , 请重新添加!
                             @endif
                        </h5>
                    </div>
                    <div class="ibox-content">
                        <form class="form-horizontal" method="post" action="">
                        	{{ csrf_field()}}
                            <div class="form-group">
                                <label class="col-sm-3 control-label">用户名：</label>

                                <div class="col-sm-8">
                                    <input type="text" name="username" placeholder="请输入管理员用户名" class="form-control"> 
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">密码：</label>
                                <div class="col-sm-8">
                                    <input type="text" name="userpwd" placeholder="密码" class="form-control">
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="col-sm-3 control-label">状态：</label>
                                <div class="col-sm-8">
	                                <div class="switch">
	                    		        <div class="onoffswitch">
	                             	   <input type="checkbox" name='show' checked class="onoffswitch-checkbox" id="example1">
	                              	   <label class="onoffswitch-label" for="example1">
		                                    <span class="onoffswitch-inner"></span>
		                                    <span class="onoffswitch-switch"></span>
	                                	</label>
	                          	    </div>
	                          	</div>
                        </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-8">
                                    <button class="btn btn-sm btn-info" type="submit">添 加</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 全局js -->
    <script src="/admin/js/jquery.min.js?v=2.1.4"></script>
    <script src="/admin/js/bootstrap.min.js?v=3.3.6"></script>

    <!-- 自定义js -->
    <script src="/admin/js/content.js?v=1.0.0"></script>

    <!-- iCheck -->
    <script src="/admin/js/plugins/iCheck/icheck.min.js"></script>
    <script src="/admin/js/plugins/switchery/switchery.js"></script>
    <script> 
    	$()
    </script>
</body>

</html>
