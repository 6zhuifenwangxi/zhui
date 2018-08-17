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

</head>
<script></script>
<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-10">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>
                        	@if($data2['show'] == "0")
                        		修改运动员信息
                        	@else
                        		修改失败 , 请重新修改!
                        	@endif
                        </h5>
                    </div>
                    <div class="ibox-content">
                        <form class="form-horizontal" method="post" action="">
                        	{{ csrf_field()}}
                            <div class="form-group">
                                <label class="col-sm-3 control-label">姓名：</label>

                                <div class="col-sm-8">
                                    <input type="text" name="user_name" placeholder="请输入运动员姓名" class="form-control" value="{{$data2['user_name']}}"> 
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">性别：</label>
                                <div class="col-sm-8">
                                    <input type="text" name="sex" placeholder="性别" class="form-control" value="{{ $data2['sex']}}">
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="col-sm-3 control-label">年龄：</label>
                                <div class="col-sm-8">
                                    <input type="text" name="age" placeholder="年龄" class="form-control" value="{{ $data2['age']}}">
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="col-sm-3 control-label">国籍：</label>
                                <div class="col-sm-8">
                                    <input type="text" name="state" placeholder="国籍" class="form-control" value="{{ $data2['state']}}">
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="col-sm-3 control-label">执排手：</label>
                                <div class="col-sm-8">
                                    <input type="text" name="hand" placeholder="执排手" class="form-control" value="{{$data2['hand']}}">
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="col-sm-3 control-label">拿排方式：</label>
                                <div class="col-sm-8">
                                    <input type="text" name="bat" placeholder="拿排方式" class="form-control" value="{{$data2['bat']}}">
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="col-sm-3 control-label">打法：</label>
                                <div class="col-sm-8">
                                    <input type="text" name="play" placeholder="打法" class="form-control" value="{{$data2['play']}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">照片：</label>
                                <div class="col-sm-8">
                                    <input type="file" name="image">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-8">
                                    <button class="btn btn-sm btn-info" type="submit">修 改</button>
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
</body>

</html>
