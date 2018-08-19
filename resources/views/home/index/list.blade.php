<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Document</title>
    <!-- 引入Layui样式 -->
    <link rel="stylesheet" href="/home/css/layui.css" media="all">
    <link rel="stylesheet" href="/home/css/index.css">
</head>

<body>
    <!-- 导航模块 开始 -->
    <div class="layui-container nav_main">    
        <div class="layui-row">
            <div class="layui-col-xs8">
                <div class="layui-col-xs6">
                    <a href="/">
                        <img src="/home/picture/logo_bjtydx.png" alt="">
                    </a>
                </div>
                <div class="layui-col-xs6">
                    <a href="/">
                        <img src="/home/picture/ittf_logo.png" alt="">
                    </a>
                </div>
            </div>
            <!--<div class="layui-col-xs4 nav_lag">
                <div class="layui-inline">
                    <div class="layui-input-inline">
                        <select name="lang">
                            <option value="中文">中文</option>
                             <option value="EN">EN</option>
                        </select>
                    </div>
                </div>
            </div>-->
        </div>
    </div>
   <!-- 导航模块结束 -->
   <!-- 列表页欢迎头 开始 -->
   <!-- 列表页面主体 开始 -->
    <div class="layui-fluid lisg_bg">
        <div class="layui-container list_main_conter">
            <fieldset class="layui-elem-field layui-field-title">
                <legend>整场比赛详情</legend>
            </fieldset>
            <div class="layui-container list_main_conter_in">
                  <div class="match_all layui-row">
                       <div class="layui-col-xs3 img_man">
                            <h3 class="name_name">樊振东</h3>
                            <img src="/home/picture/a_.jpg" alt="" class="img_in">
                            <!-- echarts -->
                            <div class="echars_in">
                                <div id="user_a_s" style="width: 250px;height:160px;"></div>
                            </div>
                            <div class="echars_in">
                                <div id="user_a_d" style="width: 250px;height:160px;"></div>
                            </div>
                       </div>
                       <div class="layui-col-xs6 chars_table_center">
                            <!--  ECharts -->
                            <div id="main" class="chars_table">
                                <table class="layui-table">
                                    <thead>
                                    <tr>
                                        <th style="font-size: 20px;text-align: center">失分</th>
                                        <th style="font-size: 20px;text-align: center">得分</th>
                                        <th style="font-size: 20px;text-align: center">指标</th>
                                        <th style="font-size: 20px;text-align: center">得分</th>
                                        <th style="font-size: 20px;text-align: center">失分</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($count as $item)
                                            <tr style="text-align: center;height: 50px;">
                                                <td style="font-size: 20px">{{$item['lose_a']}}</td>
                                            <td style="font-size: 20px">{{$item['get_a']}}</td>
                                            <td style="font-size: 20px">{{$item['means']}}</td>
                                            <td style="font-size: 20px">{{$item['get_b']}}</td>
                                            <td style="font-size: 20px">{{$item['lose_b']}}</td>
                                            </tr>
                                        @endforeach
                                    
                                     
                                    </tbody>
                                </table>
                            </div>
                       </div>
                       <div class="layui-col-xs3 img_man">
                            <h3 class="name_name">JoaoGERALDO</h3>
                            <img src="/home/picture/b_.jpg" alt="" class="img_in">
                            <div class="echars_in">
                                <div id="user_b_d" style="width: 250px;height:160px;"></div>
                            </div>
                            <div class="echars_in">
                                <div id="user_b_s" style="width: 250px;height:160px;"></div>
                            </div>
                       </div>
                  </div>
            </div>
            <fieldset class="layui-elem-field layui-field-title">
                <legend>各板得失分及得分率</legend>
            </fieldset>
            <div class="layui-container list_main_conter_in defen">
                <div class="match_all layui-row">
                    <div class="layui-col-xs6">
                        <div id="user_a_zhu" style="width: 500px;height:410px;"></div>
                    </div>
                    <div class="layui-col-xs6 margin0">
                        <div id="user_b_zhu" style="width: 500px;height:400px;"></div>
                    </div>
                </div>
            </div>
            <fieldset class="layui-elem-field layui-field-title">
                <legend>各段得失分及雷达图</legend>
            </fieldset>
            <div class="layui-container list_main_conter_in defen">
                <div class="match_all layui-row">
                    <div class="layui-col-xs6">
                        <div id="duan_leida" style="width: 440px;height:400px;"></div>
                    </div>
                    <div class="layui-col-xs6 margin0">
                        <div id="duan_skill" style="width: 440px;height:400px;"></div>
                    </div>
                </div>
            </div>
            <fieldset class="layui-elem-field layui-field-title">
                <legend>每局得分趋势图</legend>
            </fieldset>
            <div class="layui-container list_main_conter_in defen">
                <div class="match_all layui-row">
                    <form class="layui-form" action="">

                        <div class="layui-form-item">
                            <label class="layui-form-label">选择局数</label>
                            <div class="layui-input-inline">
                                <select name="class" lay-verify="required">
                                    <option value=""></option>

                                    <option value="1">第一局</option>
                                    <option value="2">第二局</option>
                                    <option value="3">第三局</option>
                                    <option value="4">第四局</option>
                                    <option value="5">第五局</option>
                                    <option value="6">第六局</option>
                                    <option value="7">第七局</option>
                                </select>
                            </div>
                            <div class="layui-input-inline">
                                <button class="layui-btn" id="submitButton" lay-submit lay-filter="formDemo">立即提交</button>
                            </div>
                        </div>
                        <input type="hidden" name="user_id" value="23">
                        <input type="hidden" name="mess_id" value="16">
                    </form>

                    <div class="layui-col-xs6" style="width: 100%">
                        <div id="danju" style="width: 100%;height:400px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   <!-- 列表页面主体 结束 -->
  <footer class="footer">
         <p>XXXXX有限公司</p>
  </footer>
   <script src="/home/js/echarts.simple.min.js"></script>
   <script src="/home/js/jquery.js"></script>
   <script src="/home/js/layui.all.js"></script>

</body>
<!--前4个统计图-->
<script type="text/javascript">
    // 用户1失分比例
    var myChart = echarts.init(document.getElementById('user_a_d'));

    // 指定图表的配置项和数据
    var option = {
        title : {
            text: '各段失分比例',

            x:'center'
        },
        tooltip : {
            trigger: 'item',
            formatter: "{b} : {c} ({d}%)"
        },

        series : [
            {
                name: '',
                type: 'pie',
                radius : '55%',
                center: ['50%', '60%'],
                data:[
                    {value:{{$count[5]['lose_a']}}, name:'发抢段'},
                    {value:{{$count[6]['lose_a']}}, name:'接抢段'},
                    {value:{{$count[7]['lose_a']}}, name:'转换段'},
                    {value:{{$count[8]['lose_a']}}, name:'相持段'},

                ],
                itemStyle: {
                    emphasis: {
                        shadowBlur: 10,
                        shadowOffsetX: 0,
                        shadowColor: 'rgba(0, 0, 0, 0.5)'
                    }
                }
            }
        ]
    };


    // 使用刚指定的配置项和数据显示图表。
    myChart.setOption(option);

    //用户1得分比例
    var myChart1 = echarts.init(document.getElementById('user_a_s'));

    // 指定图表的配置项和数据
    var option = {
        title : {
            text: '各段得分比例',

            x:'center'
        },
        tooltip : {
            trigger: 'item',
            formatter: "{b} : {c} ({d}%)"
        },

        series : [
            {
                name: '',
                type: 'pie',
                radius : '55%',
                center: ['50%', '60%'],
                data:[
                    {value:{{$count[5]['get_a']}}, name:'发抢段'},
                    {value:{{$count[6]['get_a']}}, name:'接抢段'},
                    {value:{{$count[7]['get_a']}}, name:'转换段'},
                    {value:{{$count[8]['get_a']}}, name:'相持段'},

                ],
                itemStyle: {
                    emphasis: {
                        shadowBlur: 10,
                        shadowOffsetX: 0,
                        shadowColor: 'rgba(0, 0, 0, 0.5)'
                    }
                }
            }
        ]
    };


    // 使用刚指定的配置项和数据显示图表。
    myChart1.setOption(option);


    //用户2得分比例
    var myChart2 = echarts.init(document.getElementById('user_b_d'));

    // 指定图表的配置项和数据
    var option = {
        title : {
            text: '各段得分比例',

            x:'center'
        },
        tooltip : {
            trigger: 'item',
            formatter: "{b} : {c} ({d}%)"
        },

        series : [
            {
                name: '',
                type: 'pie',
                radius : '55%',
                center: ['50%', '60%'],
                data:[
                    {value:{{$count[5]['get_b']}}, name:'发抢段'},
                    {value:{{$count[6]['get_b']}}, name:'接抢段'},
                    {value:{{$count[7]['get_b']}}, name:'转换段'},
                    {value:{{$count[8]['get_b']}}, name:'相持段'},

                ],
                itemStyle: {
                    emphasis: {
                        shadowBlur: 10,
                        shadowOffsetX: 0,
                        shadowColor: 'rgba(0, 0, 0, 0.5)'
                    }
                }
            }
        ]
    };


    // 使用刚指定的配置项和数据显示图表。
    myChart2.setOption(option);

    // 用户1失分比例
    var myChart3 = echarts.init(document.getElementById('user_b_s'));

    // 指定图表的配置项和数据
    var option = {
        title : {
            text: '各段失分比例',

            x:'center'
        },
        tooltip : {
            trigger: 'item',
            formatter: "{b} : {c} ({d}%)"
        },

        series : [
            {
                name: '',
                type: 'pie',
                radius : '55%',
                center: ['50%', '60%'],
                data:[
                    {value:{{$count[5]['lose_b']}}, name:'发抢段'},
                    {value:{{$count[6]['lose_b']}}, name:'接抢段'},
                    {value:{{$count[7]['lose_b']}}, name:'转换段'},
                    {value:{{$count[8]['lose_b']}}, name:'相持段'},

                ],
                itemStyle: {
                    emphasis: {
                        shadowBlur: 10,
                        shadowOffsetX: 0,
                        shadowColor: 'rgba(0, 0, 0, 0.5)'
                    }
                }
            }
        ]
    };
    
    // 使用刚指定的配置项和数据显示图表。
    myChart3.setOption(option);
</script>

<!---->
<script>
    var my1 = echarts.init(document.getElementById('user_a_zhu'));

    option = {
        title : {
        text: '{{$user_aname}}各板得失分及得分率',
            y:'bottom',
            x:'center'
        },
        tooltip: {
            trigger: 'axis',
            axisPointer: {
                type: 'cross',
                crossStyle: {
                    color: '#999'
                }
            }
        },
        legend: {
            data:['得分','失分','得分率']
        },
        xAxis: [
            {
                type: 'category',
                data: ['发球','接发球','第三板','第四板','第五版','第六版','六板后'],
                axisPointer: {
                    type: 'shadow'
                }
            }
        ],
        yAxis: [
            {
                type: 'value',
                name: '分数',
                min: 0,
                max: {{$max_a}},
                interval: 1,
                axisLabel: {
                    formatter: '{value}'
                }
            },
            {
                type: 'value',
                name: '得分率',
                min: 0,
                max: 100,
                interval: 10,
                axisLabel: {
                    formatter: '{value} %'
                }
            }
        ],
        series: [
            {
                name:'得分',
                type:'bar',
            data:[{{$pldata[0]['get_a']}},{{$pldata[1]['get_a']}},{{$pldata[2]['get_a']}},{{$pldata[3]['get_a']}},{{$pldata[4]['get_a']}},{{$pldata[5]['get_a']}},{{$pldata[6]['get_a']}}]
            },
            {
                name:'失分',
                type:'bar',
                data:[{{$pldata[0]['lose_a']}},{{$pldata[1]['lose_a']}},{{$pldata[2]['lose_a']}},{{$pldata[3]['lose_a']}},{{$pldata[4]['lose_a']}},{{$pldata[5]['lose_a']}},{{$pldata[6]['lose_a']}}]
            },
            {
                name:'得分率',
                type:'line',
                yAxisIndex: 1,
            data:[{{$Scoring[0]}},{{$Scoring[2]}},{{$Scoring[4]}},{{$Scoring[6]}},{{$Scoring[8]}},{{$Scoring[10]}},{{$Scoring[12]}}]
            }
        ]
    };
    my1.setOption(option);
</script>

<script>

    var my2 = echarts.init(document.getElementById('user_b_zhu'));

    option = {
        title : {
        text: '{{$user_bname}}各板得失分及得分率',
            y:'bottom',
            x:'center'
        },
        tooltip: {
            trigger: 'axis',
            axisPointer: {
                type: 'cross',
                crossStyle: {
                    color: '#999'
                }
            }
        },
        legend: {
            data:['得分','失分','得分率']
        },
        xAxis: [
            {
                type: 'category',
                data: ['发球','接发球','第三板','第四板','第五版','第六版','六板后'],
                axisPointer: {
                    type: 'shadow'
                }
            }
        ],
        yAxis: [
            {
                type: 'value',
                name: '分数',
                min: 0,
            max: {{$max_b}},
                interval: 1,
                axisLabel: {
                    formatter: '{value}'
                }
            },
            {
                type: 'value',
                name: '得分率',
                min: 0,
                max: 100,
                interval: 10,
                axisLabel: {
                    formatter: '{value} %'
                }
            }
        ],
        series: [
            {
                name:'得分',
                type:'bar',
                data:[{{$pldata[0]['get_b']}},{{$pldata[1]['get_b']}},{{$pldata[2]['get_b']}},{{$pldata[3]['get_b']}},{{$pldata[4]['get_b']}},{{$pldata[5]['get_b']}},{{$pldata[6]['get_b']}}]
            },
            {
                name:'失分',
                type:'bar',
                data:[{{$pldata[0]['lose_b']}},{{$pldata[1]['lose_b']}},{{$pldata[2]['lose_b']}},{{$pldata[3]['lose_b']}},{{$pldata[4]['lose_b']}},{{$pldata[5]['lose_b']}},{{$pldata[6]['lose_b']}}]
            },
            {
                name:'得分率',
                type:'line',
                yAxisIndex: 1,
                data:[{{$Scoring[1]}},{{$Scoring[3]}},{{$Scoring[5]}},{{$Scoring[7]}},{{$Scoring[9]}},{{$Scoring[11]}},{{$Scoring[13]}}]
            }
        ]
    };
    my2.setOption(option);
</script>

<!--雷达图-->
<script>
    var my3 = echarts.init(document.getElementById('duan_leida'));
    option = {
        title: {
            text: '各段得分率',
            x:'center',
            y:'bottom'
        },
        tooltip: {},
        legend: {
            x:'left',
        data: ['{{$user_aname}}', '{{$user_bname}}']

        },
        radar: {
            // shape: 'circle',
            name: {
                textStyle: {
                    color: 'black',
                    backgroundColor: '#999',
                    borderRadius: 6500,
                    padding: [3, 5]
                }
            },
            indicator: [
                { name: '发抢段', max: 100},
                { name: '接抢段', max: 100},
                { name: '转换段', max: 100},
                { name: '相持段', max: 100},
                { name: '综合', max: 100},

            ]
        },
        series: [{
            name: '预算 vs 开销（Budget vs spending）',
            type: 'radar',
            // areaStyle: {normal: {}},
            data : [
                {
                value : [{{$count[5]['get_a']/($count[5]['get_a']+$count[5]['lose_a'])*100 }},
                {{$count[6]['get_a']/($count[6]['get_a']+$count[6]['lose_a'])*100 }}, 
                {{$count[7]['get_a']/($count[7]['get_a']+$count[7]['lose_a'])*100 }},
                {{$count[8]['get_a']/($count[8]['get_a']+$count[8]['lose_a'])*100 }},
                {{($count[5]['get_a']+$count[6]['get_a']+$count[7]['get_a']+$count[8]['get_a'])/($count[5]['get_a']+$count[6]['get_a']+$count[7]['get_a']+$count[8]['get_a']+$count[5]['lose_a']+$count[6]['lose_a']+$count[7]['lose_a']+$count[8]['lose_a'])*100}},
                   ],
                name : '{{$user_aname}}'
                },
                {
                    value : [{{$count[5]['get_b']/($count[5]['get_b']+$count[5]['lose_b'])*100 }},
                    {{$count[6]['get_b']/($count[6]['get_b']+$count[6]['lose_b'])*100 }}, 
                    {{$count[7]['get_b']/($count[7]['get_b']+$count[7]['lose_b'])*100 }},
                    {{$count[8]['get_b']/($count[8]['get_b']+$count[8]['lose_b'])*100 }},
                    {{($count[5]['get_b']+$count[6]['get_b']+$count[7]['get_b']+$count[8]['get_b'])/($count[5]['get_b']+$count[6]['get_b']+$count[7]['get_b']+$count[8]['get_b']+$count[5]['lose_b']+$count[6]['lose_b']+$count[7]['lose_b']+$count[8]['lose_b'])*100}},
                    ],  
                name : '{{$user_bname}}'
                }
            ]
        }]
    };
    my3.setOption(option);
</script>
<script>
    var my4 = echarts.init(document.getElementById('duan_skill'));
    option = {
        title: {
            text: '各项技术得分率',
            x:'center',
            y:'bottom'
        },
        tooltip: {},
        legend: {
            x:'left',
            data: ['{{$user_aname}}', '{{$user_bname}}']

        },
        radar: {
            // shape: 'circle',
            name: {
                textStyle: {
                    color: 'black',
                    backgroundColor: '#999',
                    borderRadius: 6500,
                    padding: [3, 5]
                }
            },
            indicator: [
                { name: '发球', max: 100},
                { name: '正手', max: 100},
                { name: '反手', max: 100},
                { name: '侧身', max: 100},
                { name: '控制', max: 100},

            ]
        },
        series: [{
            name: '预算 vs 开销（Budget vs spending）',
            type: 'radar',
            // areaStyle: {normal: {}},
            data : [
                {
                    value : [{{$count[0]['get_a']/($count[0]['get_a']+$count[0]['lose_a'])*100 }},
                    {{$count[1]['get_a']/($count[1]['get_a']+$count[1]['lose_a'])*100 }}, 
                    {{$count[2]['get_a']/($count[2]['get_a']+$count[2]['lose_a'])*100 }},
                    {{$count[3]['get_a']/($count[3]['get_a']+$count[3]['lose_a'])*100 }},
                    {{$count[4]['get_a']/($count[4]['get_a']+$count[4]['lose_a'])*100 }},
                   ],
                name : '{{$user_aname}}'
                },
                {
                    value : [{{$count[0]['get_b']/($count[0]['get_b']+$count[0]['lose_b'])*100 }},
                    {{$count[1]['get_b']/($count[1]['get_b']+$count[1]['lose_b'])*100 }}, 
                    {{$count[2]['get_b']/($count[2]['get_b']+$count[2]['lose_b'])*100 }},
                    {{$count[3]['get_b']/($count[3]['get_b']+$count[3]['lose_b'])*100 }},
                    {{$count[4]['get_b']/($count[4]['get_b']+$count[4]['lose_b'])*100 }},
                   ],
                name : '{{$user_bname}}'
                }
            ]
        }]
    };
    my4.setOption(option);
</script>

<!--单局数据-->
<script>
    var a =[];
    var b =[];
    var keys =[];
    @foreach($sum_a as $item)
        a.push({{$item}})
    @endforeach
    @foreach($sum_b as $item)
        b.push({{$item}})
    @endforeach
    @foreach($keycount as $item)
        keys.push({{$item}})
    @endforeach
    var my5 = echarts.init(document.getElementById('danju'));
    option = {

        tooltip: {
            trigger: 'axis'
        },
        legend: {
        data:['{{$user_aname}}','{{$user_bname}}']
        },


        xAxis: {
            type: 'category',
            boundaryGap: true,
            data:keys
        },
        yAxis: {
            type: 'category',


        },
        series: [
            {
            name:'{{$user_aname}}',
                type:'line',
                stack: '总量',
                data:a
            },
            {
            name:'{{$user_bname}}',
                type:'line',
                stack: '总量',
                data:b
            }
        ]
    };
    my5.setOption(option);
    layui.use('form', function(){
            var form = layui.form;

            //监听提交
            form.on('submit(formDemo)', function(data1){


                $.get('{{route('list.find')}}'+'?class='+data1.field.class+'&mess_id='+data1.field.mess_id+'&user_id='+data1.field.user_id).done(function (data) {
                    // 填入数据
                    if (data.code==100){layer.msg(data.msg,{icon:2});return false;}
                    my5.setOption({
                        xAxis: {
                            type: 'category',
                            boundaryGap: true,
                            data:data.c
                        },
                        yAxis: {
                            type: 'category',


                        },
                        series: [
                            {
                                name:'樊振东',
                                type:'line',
                                stack: '总量',
                                data:data.a
                            },
                            {
                                name:'JoaoGERALDO',
                                type:'line',
                                stack: '总量',
                                data:data.b
                            }
                        ]
                    });
                });


            });
        });

        document.getElementById('submitButton').onclick = function() {
            // your code here...
            return false;
        };
</script>

</html>