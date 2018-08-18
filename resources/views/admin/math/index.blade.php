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

</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>基本 <small>分类，查找</small></h5>
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

                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>比赛名称</th>
                                    <th>比赛日期</th>
                                    <th>比赛时间</th>
                                    <th>比赛阶段</th>
                                    <th>运动员A</th>
                                    <th>运动员B</th>
                                    <th width='50px'>比赛项目</th>
                                    <th>比赛国家</th>
                                    <th>比赛城市</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($date as $item)
                                    <tr class="gradeX">
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->game_name}} </td>
                                        <td>{{$item->game_date}}</td>
                                        <td>{{$item->game_time}}</td>
                                        <td>{{$item->game_stage}}</td>
                                        <td>{{$item->rel_a->user_name}}</td>
                                        <td>{{$item->rel_b->user_name}}</td>
                                        <td>{{$item->game_project}}</td>
                                        <td>{{$item->state}}</td>
                                        <td>{{$item->city}}</td>
                                        <td>
                                        <span ><a href="javascript:;" class="btn btn-outline btn-info" onclick="edit('赛事信息修改','{{ route('math.edit')}}','{{$item->id}}','700','500')" >编辑</a></span>
                                        <span><a href="javascript:;" class="btn btn-outline btn-danger" onclick="dlt('{{$item->id}}')">删除</a></span>
                                    </td>
                                 </tr>
                                @endforeach
                            </tbody>
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
    <script src="/admin/js/H-ui.js"></script>
    <script src="/admin/js/H-ui.admin.js"></script>
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
    </script>
    <script>
        function dlt(id){
            layer.confirm('是否删除',function(){
                $.get("{{ route('math.dlt')}}",'id='+id,function(data){
                if(data.code=="0"){
                    layer.alert(data.msg);
                    setTimeout(function(){
                        self.location="{{route('math.index')}}";
                    },2000);
                }else{
                    layer.alert(data.msg);
                }
            },'json')
            }) 
        }
        function edit(title,url,id,w,h){
            layer_show(title,url+'?id='+id,w,h);
        }
            @if(count($errors)>0)
              var err ='';
            @foreach($errors->all() as $error)
              err +="{{$error}}<br/>";
            @endforeach
              layer.alert(err);
          @endif
    </script>
    
    

</body>

</html>
