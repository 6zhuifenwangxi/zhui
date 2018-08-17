<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title> - 表单验证 jQuery Validation</title>
    <meta name="keywords" content="">
    <meta name="description" content="">

    <link rel="shortcut icon" href="favicon.ico"> <link href="/admin/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/admin/css/font-awesome.css?v=4.4.0" rel="stylesheet">
    <link href="/admin/css/animate.css" rel="stylesheet">
    <link href="/admin/css/style.css?v=4.1.0" rel="stylesheet">
    <style>
        .zuo{
            padding-left: 200px;
        }
        .dan{
            position: relative;
            left: -15px;
        }
        .fujia{
            margin-right: 40px;
            margin-left: 20px;
        }
    </style>
</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-max">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <form class="form-horizontal m-t" action="" method="post">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">比赛名称：</label>
                                <div class="col-sm-4">
                                <input id="cname" value="{{ $info->game_name }}" name="game_nam" minlength="2" type="text" class="form-control" placeholder="请输入比赛名称" aria-required="true" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">比赛日期：</label>
                                <div class="col-sm-4">
                                <input id="cemail" value="{{ $info->game_date}}" type="date" class="form-control" name="game_date" required="" aria-required="true">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">比赛时间：</label>
                                <div class="col-sm-4">
                                <input id="curl" value="{{ $info->game_time}}" type="time" class="form-control" name="game_time">
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="col-sm-3 control-label">比赛阶段：</label>
                                <div class="col-sm-4">
                                    <select name="game_stage" id="" class="form-control">
                                        <option selected>请选择</option>
                                        @foreach ($stage as $item)
                                            @if ($item->game_stage ==$info->game_stage)
                                            <option value="{{ $item->game_stage}}" selected>{{ $item->game_stage}}</option>
                                            @else
                                            <option value="{{ $item->game_stage}}">{{ $item->game_stage}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                    <label class="col-sm-3 control-label">运动员A：</label>
                                    <div class="col-sm-4">
                                        <select name="user_a" id="" class="form-control">
                                            <option value="">请选择</option>
                                            @foreach ($name as $item)
                                                @if ($item->user_name ==$info->rel_a->user_name)
                                                    <option selected value="{{ $item->id}}">{{ $item->user_name}}</option>
                                                @else
                                                    <option  value="{{ $item->id}}">{{ $item->user_name}}</option>
                                                @endif
                                            
                                            @endforeach
                                        </select>
                                    </div>
                             </div>
                                <div class="form-group">
                                        <label class="col-sm-3 control-label">运动员B：</label>
                                        <div class="col-sm-4">
                                            <select name="user_b" id="" class="form-control">
                                                <option value="">请选择</option>
                                                @foreach ($name as $item)
                                                @if ($item->user_name ==$info->rel_b->user_name)
                                                    <option selected value="{{ $item->id}}">{{ $item->user_name}}</option>
                                                @else
                                                    <option  value="{{ $item->id}}">{{ $item->user_name}}</option>
                                                @endif
                                            
                                            @endforeach
                                            </select>
                                        </div>
                                </div>
                             <div class="form-group">
                                <label class="col-sm-3 control-label">比赛项目：</label>
                                <div class="col-sm-4">
                                    <select name="game_project" id="" class="form-control">
                                        <option value="">请选择</option>
                                        @if ($info->game_project =='男单')
                                        <option selected value="男单">男单</option>
                                        <option value="女单">女单</option>
                                        @else
                                        <option  value="男单">男单</option>
                                        <option selected value="女单">女单</option>
                                        @endif
                                        
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">比赛国家：</label>
                                <div class="col-sm-4">
                                <input id="cemail" type="text" value="{{$info->state}}" class="form-control" name="state" placeholder='请输入比赛国家'' required="" aria-required="true">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">比赛城市：</label>
                                <div class="col-sm-4">
                                <input id="cemail" value="{{ $info->city}}" type="text" class="form-control" name="city" placeholder="请输入比赛城市" required="" aria-required="true">
                                </div>
                            </div>
                            <div class="zuo">
                                <span class="dan">空开赛</span>
                                <div class="radio-inline i-checks fujia">
                                        <label>
                                            <input type="radio" checked value="1" name="states"> <i></i> 是</label>
                                </div>
                                <div class="radio-inline i-checks fujia">
                                        <label>
                                        <input type="radio"  value="2" name="states"> <i></i> 否</label>
                                </div>
                            </div>
                             {{ csrf_field() }}
                             <input type="hidden" value="1" name="show">
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-3">
                                    <button class="btn btn-primary" type="submit" id="btn">提交</button>
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

    <!-- jQuery Validation plugin javascript-->
    <script src="/admin/js/plugins/validate/jquery.validate.min.js"></script>
    <script src="/admin/js/plugins/validate/messages_zh.min.js"></script>

    <script src="/admin/js/demo/form-validate-demo.js"></script>
    <script src="/admin/js/plugins/layer/layer.min.js"></script>
   
    
    

</body>

</html>
