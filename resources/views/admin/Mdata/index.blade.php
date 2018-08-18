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
                    </div>
                    <div class="ibox-content">
                        <form class="form-horizontal">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label class="col-sm-3 control-label">比赛名称：</label>
                                <div class="col-sm-8">
                                    <select style="font-size:12px" id='game' class="form-control m-b" name="game_name">
                                        <option>请选择比赛</option>
                                        @foreach ($data['game_name'] as $val)                                           
                                            <option value='{{$val->id}}'>{{$val->game_name}}</option>                                           
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">运动员：</label>
                                <div class="col-sm-8">
                                    <select style="font-size:12px" id='user' class="form-control m-b" name="user">
                                        <option>请选择运动员</option>
                                        @foreach ($data['user'] as $val)                                           
                                            <option value='{{ $val-> id}}'>{{$val->user_name}}</option>                                           
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-8">
                                    <button class="btn btn-sm btn-info">搜 索</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="ibox-content">

                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>运动员</th>
                                    <th>局数</th>
                                    <th>得分</th>
                                    <th>失分</th>
                                    <th>发接轮次</th>
                                    <th>拍数</th>
                                    <th>手段</th>
                                    <th>得失分</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                             {{--   @foreach ($data as $item)
                                  <tr class="gradeX">
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->rel->user_name}}</td>
                                    <td>{{$item->class}} </td>
                                    <td>{{$item->score_first}}</td>
                                    <td>{{$item->score_last}}</td>
                                    <td>{{$item->send}}</td>
                                    <td>{{$item->bat_number}}</td>
                                    <td>{{$item->tool}}</td>
                                    <td>{{$item->get_lose}}</td>
                                    <td>
                                    <span ><a class="btn btn-outline btn-info" href="javascript:;" onclick="edit('赛事信息修改','{{ route('math.edit')}}','{{$item->id}}','700','500')" >编辑</a></span>
                                    <span><a class="btn btn-outline btn-danger" href="javascript:;" onclick="dlt('{{$item->id}}')">删除</a></span>
                                    </td>
                                  </tr>
                                @endforeach --}}
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
    <script src="/admin/js/H-ui.js"></script>
    <script src="/admin/js/H-ui.admin.js"></script>

<script>
        $(function(){
            $('button').click(function(even){
                even.preventDefault();
                var user = $('#game option:selected').val();
                var game = $('#user option:selected').val();
                var token1 = '{{ csrf_token() }}';
                console.log(token1)
                $.ajax({
                    type:'POST',
                    url:'',
                    data:"{user:user,game:game,_token:token1}",
                    dataType:'json',
                    success:function(data){
                        alert(data);
                    }
                });
            });
        });
    
    
    </script>





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
