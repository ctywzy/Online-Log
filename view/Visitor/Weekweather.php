<!DOCTYPE html>
<html>
<style>
    body{background:url(img);}
</style>
<head>
    <meta charset='utf-8'>
    <title>未来7天</title>
    <style>
        #divContainer{
            margin-top: 60px;
            text-align: center;
        }
        #cv{
            width: 800px;
            height: 400px;
            border-bottom: 4px solid #beffa2;
            border-left: 4px solid #beffa2;
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
<div id="divContainer">
    一周天气走势<br/>
    <canvas id="cv">你的设备不支持图表数据显示</canvas>
</div>
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
                    yArr.push(tmp_yArr[i] - tmp_minY + 50);//与最小的做比较
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
            //画折线
            for(var i=0 ;i<len; i++){
                var x = xArr[i];
                var y = maxY - yArr[i] + minY;
                if(i === 0){
                    ctx .moveTo(x+1, y+1);
                }
                else{
                    ctx .lineTo(x+1, y+1);
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
                ctx.arc(x, y, 5, 0, 5*Math.PI);//画点
                ctx.fill();
                ctx.fillStyle = "#f9572b";
                ctx.fillText(yMemo, x + 3, y - 10);
                ctx.fillText(xMemo, x + 3, canvas.height - 10, 40); //画文字
            }
        }
    })();
</script>
</body>
</html>