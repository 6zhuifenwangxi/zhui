<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title> - 数据表格</title>
    <meta name="keywords" content="">
    <meta name="description" content="">

    <link rel="shortcut icon" href="favicon.ico"> <link href="/admin/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/admin/css/font-awesome.css?v=4.4.0" rel="stylesheet">

    <!-- Data Tables -->
    <link href="/admin/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">

    <link href="/admin/css/animate.css" rel="stylesheet">
    <link href="/admin/css/style.css?v=4.1.0" rel="stylesheet">
    <style>
        .shang{
            background: green;
        }
        .xia{
            background: orange;
        }
        select.form-control{
            padding: 3px 12px;
        }
    </style>
</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>首页 <small>数据，添加</small></h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="table_data_tables.html#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="table_data_tables.html#">选项1</a>
                                </li>
                                <li><a href="table_data_tables.html#">选项2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                            <div class="ibox-content">
                                    <form class="form-horizontal">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">比赛名称：</label>
                                            <div class="col-sm-8">
                                                <select style="font-size:12px" id='game' class="form-control m-b" name="game_id">
                                                      <option value="">请选择</option> 
                                                    @foreach ($game as $item)
                                                        <option value="{{$item->id}}">{{$item->game_name}}—{{$item->game_stage}}—{{$item->rel_a->user_name}} VS {{$item->rel_b->user_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-8" >
                                                <button class="btn btn-sm btn-info" id="btnn" type="button">添加</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>比赛时间</th>
                                    <th>比赛名称</th>
                                    <th>比赛项目</th>
                                    <th>比赛阶段</th>
                                    <th>运动员A</th>
                                    <th>运动员B</th>
                                    <th>大比分</th>
                                    <th class="center" width="80">小比分</th>
                                    <th>状态</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($date as $item)
                                    <tr class="gradeX">
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->rel_id->game_date}} </td>
                                    <td>{{$item->rel_id->game_name}}</td>
                                    <td>{{$item->rel_id->game_project}}</td>
                                    <td>{{$item->rel_id->game_stage}}</td>
                                    <td>{{$item->rel_id->rel_a->user_name}}</td>
                                    <td>{{$item->rel_id->rel_b->user_name}}</td>
                                    <td>{{$item->big}}</td>
                                    <td>{{$item->small}}</td>
                                    <td>
                                        @if ($item->rel_id->show =='1')
                                            已上线
                                        @else
                                            未上线
                                        @endif
                                        
                                    </td>
                                    <td>
                                    <span class="shang"><a href="javascript:;" >上线</a></span>
                                    <span class="xia"><a href="javascript:;" >下线</a></span>
                                    </td>
                                </tr>
                                @endforeach
                            </tfoot>
                        </table>

                    </div>
                </div>
            </div>
        </div>
        
    </div>

    <!-- 全局js -->
    <script src="/admin/js/jquery.min.js?v=2.1.4"></script>
    <script src="/admin/js/bootstrap.min.js?v=3.3.6"></script>



    <script src="/admin/js/plugins/jeditable/jquery.jeditable.js"></script>

    <!-- Data Tables -->
    <script src="/admin/js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="/admin/js/plugins/dataTables/dataTables.bootstrap.js"></script>

    <!-- 自定义js -->
    <script src="/admin/js/content.js?v=1.0.0"></script>
    <script src="/admin/js/plugins/layer/layer.min.js"></script>

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function () {
            $('.dataTables-example').dataTable();

            /* Init DataTables */
            var oTable = $('#editable').dataTable();

            /* Apply the jEditable handlers to the table */
            oTable.$('td').editable('../example_ajax.php', {
                "callback": function (sValue, y) {
                    var aPos = oTable.fnGetPosition(this);
                    oTable.fnUpdate(sValue, aPos[0], aPos[1]);
                },
                "submitdata": function (value, settings) {
                    return {
                        "row_id": this.parentNode.getAttribute('id'),
                        "column": oTable.fnGetPosition(this)[2]
                    };
                },

                "width": "90%",
                "height": "100%"
            });
        });
       
        function fnClickAddRow() {
            $('#editable').dataTable().fnAddData([
                "Custom row",
                "New row",
                "New row",
                "New row",
                "New row"]);
        }
        $('#btnn').click(function(){
           var id =$('#game').val();
           $.get("{{route('achievement.add')}}",'id='+id,function(data){
               if(data=='0'){
                   layer.alert('添加成功');
                   setTimeout(function(){
                       location.href="{{route('achievement.index')}}";
                   },1000)
               }else if(data =="没有数据"){
                   layer.alert('没有数据');
               }else{
                   layer.alert('添加失败');
               }
           })
        })
    </script>
    

</body>

</html>
