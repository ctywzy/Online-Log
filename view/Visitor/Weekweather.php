<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title> Online | Memo</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/js/jquery.js">
    <link rel="stylesheet" type="text/css" href="/js/bootstrap.min.js">
    <link rel="stylesheet" href="css/swipebox.min.css" type="text/css">

    <!-- Custom Fonts -->


    <!-- Plugin CSS -->
    <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="css/owl.theme.css" type="text/css">
    <link rel="stylesheet" href="css/owl.transitions.css" type="text/css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/animate.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">

    <!-- CSS 部分 -->
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <!-- Bootstrap table -->
    <link rel="stylesheet" href="/css/booststrap-table.min.css">
    <style>
        #divContainer{
            margin-top: 20px;
            text-align: left;
        }
        #cv{
            width: 700px;
            height: 400px;
            border-bottom: 8px solid #beffa2;
            border-left: 8px solid #beffa2;
        }
    </style>
</head>
<body>
    <?php
    error_reporting(E_ALL || ~E_NOTICE);
    function findNum($str='')
    {
        $str=trim($str);
        if(empty($str)){return '';}
        $result='';
        for($i=0;$i<=strlen($str);$i++)
        {
            if(is_numeric($str[$i]))
            {
                $result.=$str[$i];
            }
        }
        return $result;
    }
    $version = 'v1';//v1: 7天 / v2: 15天  / v3: 40天
    $url = 'https://www.tianqiapi.com/api/?version=' . $version;
    $data = file_get_contents($url);
    $json = json_decode($data, true);
    $list = $json['data'];
    $tempa=array();
    for($i=0;$i<7;$i++)
    {
        $tempa[$i]=(int)findNum($list[$i]['tem']);
    }
    ?>
    <nav class="navbar navbar-default" role="navigation">
        <div class="navbar-header ">
            <a class="navbar-brand" href="#">Online Memo</a>
        </div>
        <div class="navbar-header ">
            <a class="navbar-brand" href="#"><?="用户名:".$_SESSION['user']['uname']?></a>
        </div>
        <div class="navbar-header navbar-right " >
            <form action="/index.php?r=Visitor/home_page" method="POST" class="navbar-form navbar-left">
                <button type="submit" class="btn btn-info">返回日历</button>
            </form>
        </div>
        <div class="navbar-header navbar-right" >
            <form action="/index.php?r=login/login_page" method="POST" class="navbar-form navbar-left">
                <button type="submit" class="btn btn-info">切换用户</button>
            </form>
        </div>
    </nav>
    <table class="table">
        <thead>
        <tr>
            <th>日期</th>
            <th>天气</th>
            <th>最高温度</th>
            <th>最低温度</th>
            <th>平均温度</th>
            <th>空气质量</th>
            <th>风向、风速</th>
            <th>紫外线指数</th>
        </tr>
        </thead>
        <tbody>
        <tr class="active">
            <td><?= $list[0]['date']?></td>
            <td><?= $list[0]['wea']?></td>
            <td><?= $list[0]['tem1']?></td>
            <td><?= $list[0]['tem2']?></td>
            <td><?= $list[0]['tem']?></td>
            <td><?= $list[0]['air_level']?></td>
            <td><?= $list[0]['win'][0]."    ".$list[0]['win_speed']?></td>
            <td><?= $list[0]['index'][0]['level']?></td>
        </tr>
        <tr class="success">
            <td><?= $list[1]['date']?></td>
            <td><?= $list[1]['wea']?></td>
            <td><?= $list[1]['tem1']?></td>
            <td><?= $list[1]['tem2']?></td>
            <td><?= $list[1]['tem']?></td>
            <td>——</td>
            <td><?= $list[1]['win'][0]."    ".$list[1]['win_speed']?></td>
            <td><?= $list[1]['index'][0]['level']?></td>
        </tr>
        <tr  class="warning">
            <td><?= $list[2]['date']?></td>
            <td><?= $list[2]['wea']?></td>
            <td><?= $list[2]['tem1']?></td>
            <td><?= $list[2]['tem2']?></td>
            <td><?= $list[2]['tem']?></td>
            <td>——</td>
            <td><?= $list[2]['win'][0]."    ".$list[2]['win_speed']?></td>
            <td><?= $list[2]['index'][0]['level']?></td>
        </tr>
        <tr  class="danger">
            <td><?= $list[3]['date']?></td>
            <td><?= $list[3]['wea']?></td>
            <td><?= $list[3]['tem1']?></td>
            <td><?= $list[3]['tem2']?></td>
            <td><?= $list[3]['tem']?></td>
            <td>——</td>
            <td><?= $list[3]['win'][0]."    ".$list[3]['win_speed']?></td>
            <td><?= $list[3]['index'][0]['level']?></td>
        </tr>
        <tr class="active">
            <td><?= $list[4]['date']?></td>
            <td><?= $list[4]['wea']?></td>
            <td><?= $list[4]['tem1']?></td>
            <td><?= $list[4]['tem2']?></td>
            <td><?= $list[4]['tem']?></td>
            <td>——</td>
            <td><?= $list[4]['win'][0]."    ".$list[4]['win_speed']?></td>
            <td><?= $list[4]['index'][0]['level']?></td>
        </tr>
        <tr class="success">
            <td><?= $list[5]['date']?></td>
            <td><?= $list[5]['wea']?></td>
            <td><?= $list[5]['tem1']?></td>
            <td><?= $list[5]['tem2']?></td>
            <td><?= $list[5]['tem']?></td>
            <td>——</td>
            <td><?= $list[5]['win'][0]."    ".$list[5]['win_speed']?></td>
            <td><?= $list[5]['index'][0]['level']?></td>
        </tr>
        <tr  class="warning">
            <td><?= $list[6]['date']?></td>
            <td><?= $list[6]['wea']?></td>
            <td><?= $list[6]['tem1']?></td>
            <td><?= $list[6]['tem2']?></td>
            <td><?= $list[6]['tem']?></td>
            <td>——</td>
            <td><?= $list[6]['win'][0]."    ".$list[6]['win_speed']?></td>
            <td><?= $list[6]['index'][0]['level']?></td>
        </tr>
        </tbody>
    </table>

    <div class="row">
        <div class="col-xs-6 col-sm-6">
            <h3 align="center">
                <span class="label label-default">一周天气状况</span>
            </h3>
            <div id="divContainer">
                <canvas id="cv">你的设备不支持图表数据显示</canvas>
            </div>
        </div>
        <div class="col-xs-6 col-sm-6">
            <!--
            <div style="padding: 100px 100px 10px;">
                <form class="bs-example bs-example-form" role="form">
                    <div class="input-group">
                        <div class="input-btn-group">
                            <button type="button" class="btn btn-default" id="weight_select">请选择你想知道一周内的一天的详细信息</button>
                            <button type="button" class="btn btn-default dropdown-toggle"
                                    data-toggle="dropdown">
                                <span class="caret"></span>
                                <span class="sr-only">切换下拉菜单</span>
                            </button>
                            <ul class="dropdown-menu "
                                style="height:250px;overflow:scroll" id="menu_width">
                                <p value="0"><a herf="#"><?=$list[0]['date']?><a></p>
                                <p value="1"><a herf="#"><?=$list[1]['date']?><a></p>
                                <li value="2"><a herf="#"><?=$list[2]['date']?><a></li>
                                <li value="3"><a herf="#"><?=$list[3]['date']?><a></li>
                                <li value="4"><a herf="#"><?=$list[4]['date']?><a></li>
                                <li value="5"><a herf="#"><?=$list[5]['date']?><a></li>
                                <li value="6"><a herf="#"><?=$list[6]['date']?><a></li>
                            </ul>
                            <input type="text" class="form-control" placeholder="选择的日期" >
                        </div>
                    </div>
                </form>
            </div>
            -->
            <table class="table">
                <thead>
                <tr>
                    <th>今日天气详情</th>
                </tr>
                </thead>
                <tbody>
                <tr class="active">
                    <td>日期</td>
                    <td><?= $list[0]['day']?></td>
                    <td>星期</td>
                    <td><?= $list[0]['week']?></td>
                    <td>天气状态</td>
                    <td><?= $list[0]['air_level']?></td>
                    <td>最高温</td>
                    <td><?= $list[0]['tem1']?></td>

                </tr>
                <tr  class="warning">
                    <td>最低温</td>
                    <td><?= $list[0]['tem2']?></td>
                    <td>平均温度</td>
                    <td><?= $list[0]['tem']?></td>
                    <td>风向</td>
                    <td><?= $list[0]['win'][0]?></td>
                    <td>风速</td>
                    <td><?= $list[0]['win_speed']?></td>
                </tr>

                <tr class="success">
                    <td>星期</td>
                    <td><?= $list[0]['week']?></td>
                    <td>天气状态</td>
                    <td><?= $list[0]['air_level']?></td>
                    <td>最高温</td>
                    <td><?= $list[0]['tem1']?></td>
                    <td>最低温</td>
                    <td><?= $list[0]['tem2']?></td>
                </tr>
                </tbody>
                <tobody>
                    <table class="table">
                        <tr  class="danger">
                            <td><?= $list[0]['index'][0]['title']?></td>
                            <td><?= $list[0]['index'][0]['level']?></td>
                            <td>建议</td>
                            <td><?= $list[0]['index'][0]['desc']?></td>
                        </tr>
                        <tr  class="warning">
                            <td><?= $list[0]['index'][1]['title']?></td>
                            <td><?= $list[0]['index'][1]['level']?></td>
                            <td>建议</td>
                            <td><?= $list[0]['index'][1]['desc']?></td>
                        </tr>
                        <tr  class="active">
                            <td><?= $list[0]['index'][2]['title']?></td>
                            <td><?= $list[0]['index'][2]['level']?></td>
                            <td>建议</td>
                            <td><?= $list[0]['index'][2]['desc']?></td>
                        </tr>
                        <tr  class="active">
                            <td><?= $list[0]['index'][3]['title']?></td>
                            <td><?= $list[0]['index'][3]['level']?></td>
                            <td>建议</td>
                            <td><?= $list[0]['index'][3]['desc']?></td>
                        </tr>
                        <tr  class="active">
                            <td><?= $list[0]['index'][4]['title']?></td>
                            <td><?= $list[0]['index'][4]['level']?></td>
                            <td>建议</td>
                            <td><?= $list[0]['index'][4]['desc']?></td>
                        </tr>
                        <tr  class="active">
                            <td><?= $list[0]['index'][5]['title']?></td>
                            <td><?= $list[0]['index'][5]['level']?></td>
                            <td>建议</td>
                            <td><?= $list[0]['index'][5]['desc']?></td>
                        </tr>
                </tobody>
                <tobody>
                    <table class="table">
                        <tr class="success">
                            <td>空气质量建议</td>
                            <td><?= $list[0]['air_tips']?></td>
                        </tr>
                </tobody>
            </table>
        </div>
    </div>
    <script>
        $('.menu_width > li').on('click', function() {
            $('#weight_select').text($(this).text());
        })
    </script>
    <script>
        (function(){
            window.onload = function(){
                //数据源
                var dict = [
                    {x: "<?= substr($list[0]['date'],5,5);?>", y: <?=$tempa[0]?>},
                    {x: "<?= substr($list[1]['date'],5,5);?>", y: <?=$tempa[1]?>},
                    {x: "<?= substr($list[2]['date'],5,5);?>", y: <?=$tempa[2]?>},
                    {x: "<?= substr($list[3]['date'],5,5);?>", y: <?=$tempa[3]?>},
                    {x: "<?= substr($list[4]['date'],5,5);?>", y: <?=$tempa[4]?>},
                    {x: "<?= substr($list[5]['date'],5,5);?>", y: <?=$tempa[5]?>},
                    {x: "<?= substr($list[6]['date'],5,5);?>", y: <?=$tempa[6]?>},
                ]
                //数据源提取
                var len = dict.length;
                var xArr = [], yArr = [], tmp_yArr = [];
                for(var i=0; i<len; i++){
                    xArr.push(i * 40);
                    tmp_yArr.push(dict[i].y);
                }
                var tmp_minY = Math.min.apply(Math, tmp_yArr);//最小值
                var tmp_maxY = Math.max.apply(Math, tmp_yArr);//最大值
                if(tmp_maxY - tmp_minY <= 100){
                    for(var i=0; i<len; i++){
                        yArr.push(tmp_yArr[i] - tmp_minY + 60);//与最小的做比较
                    }
                }
                else{//如果相差太大会导致图表不美观
                    for(var i=0; i<len; i++){
                        yArr.push(tmp_yArr[i] / 500);
                    }
                }
                var minY = Math.min.apply(Math, yArr);
                var maxY = Math.max.apply(Math, yArr);
                //canvas 准备
                var canvas = document.getElementById("cv");//获取canvas画布
                var ctx = canvas.getContext("2d");
                ctx.font = "10px '微软雅黑'";
                ctx.lineWidth=3;
                //画折线
                for(var i=0 ;i<len; i++){
                    var x = xArr[i]+20;

                    var y = maxY - yArr[i] + minY;
                    if(i === 0){
                        ctx .moveTo(x, y);
                    }
                    else{
                        ctx .lineTo(x, y);
                    }
                }
                ctx .stroke();

                //画点
                for(var i=0; i<len; i++){
                    var x = xArr[i];
                    var y = maxY - yArr[i] + minY;
                    var xMemo = dict[i].x;
                    var yMemo = dict[i].y+"℃";
                    ctx.beginPath();
                    ctx.fillStyle = "#273bff";
                    ctx.arc(x+20, y, 3, 0, 3*Math.PI);//画点
                    ctx.fill();
                    ctx.fillStyle = "#f9572b";
                    ctx.fillText(yMemo, x + 3, y - 10);

                    ctx.fillText(xMemo, x + 3, canvas.height-5, 30); //画文字
                }
            }
        })();
    </script>

    <!-- jQuery -->
    <script data-cfasync="false" src="js/email-decode.min.js"></script><script src="js/jquery.js"></script>

    <!-- Bootstrap JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/sticky.js"></script>
    <script src="js/jquery.swipebox.min.js"></script>
    <script src="js/sorting.js"></script>

    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/current.js"></script>
    <!-- JS 部分 -->
    <!-- jQuery 3 -->
    <script src="/js/jquery.slmin.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="/js/bootstrap.min.js"></script>
    <!-- bootstrap-table -->
    <script src="/js/bootstrap-table.js"></script>
    <script src="/js/bootstrap-table-zh-CN.js"></script>
    <!--<script>
        $('#table').bootstrapTable({
            <?php
            $version = 'v1';//v1: 7天 / v2: 15天  / v3: 40天
            $url = 'https://www.tianqiapi.com/api/?version=' . $version;
            $data = file_get_contents($url);
            $json = json_decode($data, true);
            $list = $json['data'];
            ?>
            url: 'https://www.tianqiapi.com/api/?version=v1',  // 表格数据来源
            dataType:"json",
            method:"post",
            columns: [{
                field: 'id',
                title: 'Item ID'
            }, {
                field: 'name',
                title: 'Item Name'
            }, {
                field: 'price',
                title: 'Item Price'
            },{
                field: 'column1',
                title: '列1'
            },{
                field: 'column2',
                title: '列2'
            },{
                field: 'column3',
                title: '列3'
            },{
                field: 'column4',
                title: '列4'
            } ]
        });
    </script>
    -->
</body>
</html>