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
                        		修改比赛信息
                        	@elseif($data2['show'] == '1')
                        		修改信息失败 , 请重新修改!
                            @else
                                修改成功!
                            @endif
                        </h5>
                    </div>
                    <div class="ibox-content">
                        <form class="form-horizontal" method="post" action="">
                        	{{ csrf_field()}}
                            <div class="form-group">
                                <label class="col-sm-3 control-label">运动员：</label>

                                <div class="col-sm-8">
                                    <input type="text" name="user_name" disabled class="form-control" value="{{$data2->rel->user_name}}"> 
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">比赛：</label>
                                <div class="col-sm-8">
                                    <input type="text" name="game_name" disabled class="form-control" value="{{ $data2->mes->game_name}}">
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="col-sm-3 control-label">得分：</label>
                                <div class="col-sm-8">
                                    <input type="text" name="score_first"  class="form-control" value="{{ $data2->score_first}}">
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="col-sm-3 control-label">失分：</label>
                                <div class="col-sm-8">
                                    <input type="text" name="score_last"  class="form-control" value="{{ $data2->score_last}}">
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="col-sm-3 control-label">发接轮次：</label>
                                <div class="col-sm-8">
                                    <input type="text" name="send"  class="form-control" value="{{$data2->send}}">
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="col-sm-3 control-label">拍数：</label>
                                <div class="col-sm-8">
                                    <input type="text" name="bat_number"  class="form-control" value="{{$data2->bat_number}}">
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="col-sm-3 control-label">手段：</label>
                                <div class="col-sm-8">
                                    <input type="text" name="tool"  class="form-control" value="{{$data2->tool}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">得失分：</label>
                                <div class="col-sm-8">
                                    <input type="text" name="get_lose"  class="form-control" value="{{$data2->get_lose}}">
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
