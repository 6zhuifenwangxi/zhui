<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title> - 数据表格</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                                        <option value="0">请选择比赛</option>
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
                                        <option value="0">请选择运动员</option>
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

                        <table class="table ">
                            <thead>
                                <tr>
                                    <th>ID</th>
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

<script>
        $(function(){
            $('button').click(function(even){
                even.preventDefault();
                var user = $('#user option:selected').val();
                var game = $('#game option:selected').val();
                $.ajax({
                    type:'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                    url:'',
                    data:{user:user,game:game},
                    dataType:'json',
                    success:function(data){
                       if(data['code'] == "0"){
                           alert(data['msg']);
                       }else if(data['code'] == '1'){
                           var str = "<h4>"+data['msg']+"</h4>"
                           $('tbody').empty().append(str);
                       }else{
                        //    console.log(data);
                           var table = '';
                           $.each(data,function(i,val){
                            //    console.log(val.id);
                               table += '<tr class="gradeX">'
                               table += '<td>'+val.id+'</td>';
                               table += '<td>'+val.class+'</td>';
                               table += '<td>'+val.score_first+'</td>';
                               table += '<td>'+val.score_last+'</td>';
                               table += '<td>'+val.send+'</td>';
                               table += '<td>'+val.bat_number+'</td>';
                               table += '<td>'+val.tool+'</td>';
                               table += '<td>'+val.get_lose+'</td>';
                               table += '<td>';
                            //    table += "<span ><a class='btn btn-outline btn-info style' href='javascript:;' onclick=edit('赛事信息修改','{{route('Mdata.edit')}}','"+val.id+"','700','500')>编辑</a></span>";
                               table += "<span ><a class='btn btn-outline btn-info style' href={{route('Mdata.edit')}}?id="+val.id+" >编辑</a></span>";
                               table += '</td>';
                               table += '</tr>';
                            });
                           $('tbody').empty().append(table);
                       }
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
        $(function(){
            function edit(title,url,id,w,h){
                alert("ok");
                layer_show(title,url+'?id='+id,w,h);
            }
        })
        $('.style').click(function(){
            alert("ok");
        })
    </script>
    
    
</body>

</html>
