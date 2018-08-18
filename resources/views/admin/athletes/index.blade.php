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

                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                                <tr>
                                    <th>编号</th>
                                    <th>姓名</th>
                                    <th>性别</th>
                                    <th>年龄</th>
                                    <th>国家</th>
                                    <th>执排手</th>
                                    <th>拿排方式</th>
                                    <th>打法</th>
                                    <th>头像</th>
                                    <th>添加时间</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                   			<tbody>
                                @foreach($data as $val)
                   				 <tr>
                                    <td>{{ $val -> id }}</td>
                                    <td>{{ $val -> user_name }}</td>
                                    <td>{{ $val -> sex }}</td>
                                    <td>{{ $val -> age }}</td>
                                    <td>{{ $val -> state }}</td>
                                    <td>{{ $val -> hand }}</td>
                                    <td>{{ $val -> bat }}</td>
                                    <td>{{ $val -> play }}</td>
                                    <td><img class="center-block" width='80px' src="{{ $val -> image }}"></td>
                                    <td>{{ $val -> add_time }}</td>
                                     <td> 
                                    	<a href='{{route("athletes.edit")}}?id={{$val->id}}' class="btn btn-outline btn-info">修改</a>
                                    	<a href='{{route("athletes.del")}}?id={{$val->id}}' class="btn btn-outline btn-danger">删除</a>
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
    <script>
        jQuery(document).ready(function($) {
    		$('.btn').click(function(event) {
    			if (!confirm("确认删除吗?")) {
    				event.preventDefault();	
    			}
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

    
    

</body>

</html>
