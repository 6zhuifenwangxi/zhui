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
    <link rel="stylesheet" href="/admin/webuploader-0.1.5/webuploader.css">
    <style>
        
        .btn1{
            margin-left:0px;
        }
    </style>
</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-max">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <form class="form-horizontal m-t" action="{{ route('excel.template')}}" method="post">
                                <div class="form-group">
                                        <label class="col-sm-3 control-label">下载模板</label>
                                    <div class="col-sm-4 col-sm-offset-3 btn1">
                                    <a href="{{ route('excel.template')}}"><button class="btn btn-info glyphicon glyphicon-cloud-download" type="button">模板</button></a>
                                    </div>
                                </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">比赛名称：</label>
                                <div class="col-sm-4">
                                    <select name="message_id" class="form-control" id="">
                                        <option value="">请选择</option>
                                        @foreach ($game as $item)
                                    <option value="{{$item->id}}">{{$item->game_name}}—{{$item->game_stage}}—{{$item->rel_a->user_name}} VS {{$item->rel_b->user_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                    <label class="col-sm-3 control-label">运动员</label>
                                    <div class="col-sm-4">
                                        <select name="user_id" id="" class="form-control">
                                            <option value="">请选择</option>
                                            @foreach ($name as $item)
                                            <option value="{{ $item->id}}">{{ $item->user_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                             </div>
                             <div class="form-group">
                                    <label class="col-sm-3 control-label">数据上传</label>
                                <div class="col-sm-4 col-sm-offset-3 btn1">
                                        <!-- 替换成webuploader的html示例代码 -->
                                    <div id="uploader-demo">
                                        <!--用来存放item-->
                                        <div id="fileList" class="uploader-list"></div>
                                        <div id="filePicker">选择Excel文件</div>
                                    </div>
                                </div>
                            </div>
                             {{ csrf_field() }}
                             <input type="hidden" name="excelpath" value="" id="excelpath"/>
                             <input type="hidden" value="1" name="show">
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-3">
                                    <a href=""><button class="btn btn-primary" type="submit" id="btn">提交</button></a>
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
   <script src="/admin/webuploader-0.1.5/webuploader.js"></script>
   <script type="text/javascript">
    var _token = "{{csrf_token()}}";
    </script>
    <script>
        $(function() {
        var $ = jQuery,
            $list = $('#fileList'),
            // // 优化retina, 在retina下这个值是2
            // ratio = window.devicePixelRatio || 1,
            // // 缩略图大小
            // thumbnailWidth = 100 * ratio,
            // thumbnailHeight = 100 * ratio,
            // Web Uploader实例
            uploader;
        // 初始化Web Uploader
        uploader = WebUploader.create({
            // 追加自定义参数
            // js获取token值的写方法
            // var _token = $('input[name=_token]').val();
            // formData: {_token: _token},
            formData: {_token: _token},
            // 自动上传。
            auto: true,
            // swf文件路径
            swf: '/admin/webuploader-0.1.5/Uploader.swf',
            // 文件接收服务端。
            server: "{{ route('webuploader') }}",
            // server: "http://0717.com/admin/uploader/qiniu",
            // 选择文件的按钮。可选。
            // 内部根据当前运行是创建，可能是input元素，也可能是flash.
            pick: '#filePicker',
            // 只允许选择文件，可选。
            // accept: {
            //     title: 'Images',
            //     extensions: 'gif,jpg,jpeg,bmp,png',
            //     mimeTypes: 'image/*'
            // }
        });

        // 当有文件添加进来的时候
        // uploader.on( 'fileQueued', function( file ) {
        //     var $li = $(
        //             '<div id="' + file.id + '" class="file-item thumbnail">' +
        //                 '<img>' +
        //                 '<div class="info">' + file.name + '</div>' +
        //             '</div>'
        //             ),
        //         $img = $li.find('img');
        //     // 删除之前上传的图片预览
        //     $('.thumbnail').remove();
        //     $list.append( $li );
        //     // 创建缩略图
        //     uploader.makeThumb( file, function( error, src ) {
        //         if ( error ) {
        //             $img.replaceWith('<span>不能预览</span>');
        //             return;
        //         }
        //         $img.attr( 'src', src );
        //     }, thumbnailWidth, thumbnailHeight );
        // });

        // 文件上传过程中创建进度条实时显示。
        uploader.on( 'uploadProgress', function( file, percentage ) {
            var $li = $( '#'+file.id ),
                $percent = $li.find('.progress span');
            // 避免重复创建
            if ( !$percent.length ) {
                $percent = $('<p class="progress"><span></span></p>')
                        .appendTo( $li )
                        .find('span');
            }
            $percent.css( 'width', percentage * 100 + '%' );
        });

        // 文件上传成功，给item添加成功class, 用样式标记上传成功。
        // 注意，第二个参数才是ajax的返回值
        uploader.on( 'uploadSuccess', function( file , response ) {
            $( '#'+file.id ).addClass('upload-state-done');
            // 写入隐藏域
            // console.log(response);
            if(response.code == 0){
                layer.msg(response.msg,{icon: 1,time: 1500});
                $('#excelpath').val(response.filepath);
            }else{
                layer.msg(response.msg,{icon: 2,time: 2500});
            }
        });

        // 文件上传失败，现实上传出错。
        uploader.on( 'uploadError', function( file ) {
            var $li = $( '#'+file.id ),
                $error = $li.find('div.error');
            // 避免重复创建
            if ( !$error.length ) {
                $error = $('<div class="error"></div>').appendTo( $li );
            }
            $error.text('上传失败');
        });

        // 完成上传完了，成功或者失败，先删除进度条。
        uploader.on( 'uploadComplete', function( file ) {
            $( '#'+file.id ).find('.progress').remove();
        });


        $('.skin-minimal input').iCheck({
            checkboxClass: 'icheckbox-blue',
            radioClass: 'iradio-blue',
            increaseArea: '20%'
        });

        $("#form-member-add").validate({
            rules: {
                excelpath: {
                    required: true,
                },
                paper_id: {
                    required: true,
                },

            },
            onkeyup: false,
            focusCleanup: true,
            success: "valid",
            submitHandler: function(form) {
                $(form).ajaxSubmit({
					type: 'post',
					url: "{{route('excel.template')}}" ,	//提交给当前地址
					success: function(data){
						//判断返回值code
						if(data == '0'){
							//成功
							layer.msg('导入成功！',{icon:1,time:2000},function(){
								var index = parent.layer.getFrameIndex(window.name);
								parent.location.href = parent.location.href;
								parent.layer.close(index);
							});
						}else{
							//失败
							layer.msg('导入失败！',{icon:5,time:2000});
						}
					},
	                error: function(XmlHttpRequest, textStatus, errorThrown){
						layer.msg('error!',{icon:5,time:2000});
					}
				});
            }
        });
    });
    
    </script>
    

</body>

</html>
