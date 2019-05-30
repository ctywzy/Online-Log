<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Online | Memo</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/js/jquery.js">
    <link rel="stylesheet" type="text/css" href="/js/bootstrap.min.js">
</head>

<body>
    <?php 
      $version = 'v1';//v1: 7天 / v2: 15天  / v3: 40天
      $url = 'https://www.tianqiapi.com/api/?version=' . $version;
      $data = file_get_contents($url);
      $json = json_decode($data, true);
      $list = $json['data'];
    ?>
    <nav class="navbar navbar-default" role="navigation">
       <div class="navbar-header col-sm-4">
          <a class="navbar-brand" href="#">Online | Memo</a>
       </div>
       <div class="navbar-header col-sm-">
          <a class="navbar-brand" style="color: red"><?="今天是".$list[0]['date']?></a>
       </div>
       <div class="navbar-header">
          <a class="navbar-brand" ><?= $list[0]['wea']?></a>
       </div>
       <div class="navbar-header">
          <a class="navbar-brand" ><?= $list[0]['tem1']?></a>
       </div>
       <div class="navbar-header">
          <a class="navbar-brand"><?= $list[0]['tem2']?></a>
       </div>
       <div class="navbar-header col-sm-3" >
          <a class="navbar-brand"><?= $list[0]['win'][0] . ' ' . $list[0]['win_speed']?></a>
       </div>
       <div class="navbar-header" align="right">
         <form action="/index.php?r=Visitor/home_page" method="POST" class="navbar-form navbar-left">
             <button type="submit" class="btn btn-info">今天</button>
          </form>    
       </div>
       <div class="navbar-header" align="right">
          <form class="navbar-form navbar-right" role="search" action="/#" method="POST">
             <button type="submit" class="btn btn-info">切换用户</button>
          </form>    
       </div>
    </nav>
    <table class="table table-bordered">
  
      <tr bgcolor="#f0ad4e">

          <form action="/index.php?r=Calendar/last_year" method="POST">
            <th >
              <input type="hidden" name="year" value=<?= $year ?>   >
              <input type="hidden" name="month" value=<?= $month ?>>
              <button class="btn-block btn btn-warning">
                <b style="font-size: 20px"><上一年</b>
              </button>
            </th>
          </form>
          <form action="/index.php?r=Calendar/last_month" method="POST">
            <th>
              <input type="hidden" name="year" value=<?= $year ?> >
              <input type="hidden" name="month" value=<?= $month ?>>
              <button class="btn-block btn btn-warning">
                <b style="font-size: 20px"><上一月</b>
              </button>
            </th>
          </form>
          <form action="/index.php?r=Visitor/home_page" method="POST">
            <th>
              <input type="hidden" name="year" value=<?= $year ?> >
              <input type="hidden" name="month" value=<?= $month ?>>
              <button class="btn-block btn btn-warning">
                <b style="font-size: 20px"><?php echo $year."-".$month."-".$day ?><b>
                  
              </button>
            </th>
          </form>
          <form action="/index.php?r=Calendar/next_month" method="POST">
            <th>
              <input type="hidden" name="year" value=<?= $year ?> >
              <input type="hidden" name="month" value=<?= $month ?>>
              <button class="btn-block btn btn-warning">
                <b style="font-size: 20px">下一月></b>
              </button>
            </th>
          </form>
          <form action="/index.php?r=Calendar/next_year" method="POST">
            <th>
              <input type="hidden" name="year" value=<?= $year ?> >
              <input type="hidden" name="month" value=<?= $month ?>>
              <button class="btn-block btn btn-warning">
                <b style="font-size: 20px">下一年>>
                  
                </b>
              </button>
            </th>
          </form>
        </tr>

    </table>
    <table class="table table-bordered">
      
      <tr bgcolor="#31C5BE">
           <th style="text-align: center">星期日</th>
           <th style="text-align: center">星期一</th>
           <th style="text-align: center">星期二</th>
           <th style="text-align: center">星期三</th>
           <th style="text-align: center">星期四</th>
           <th style="text-align: center">星期五</th>
           <th style="text-align: center">星期六</th>
        </tr>
        <tr class="bg_warning">
            <?php
                //var_export($noe);

                for($i=0;$i<$week;$i++){
                  echo "<td bgcolor='#F5F5F5'></td>";
                }
                for($k=1;$k<=$days;$k++){
                  if($k==$day && $year==date('Y') && $month==date('m') ){
            ?>
                  <form action="/index.php?r=Visitor/to_write" method="POST"> 
                      <td align="center" bgcolor="#D9534F" >
                        <input type="hidden" name="getdate" value=<?= $year."-".$month."-".$k?>  >
                        <button class="btn-block btn btn-danger" style="font-size: 30px; height: 95px" type="submit" >
                          <?=$k?>
                        </button>
                      </td>
                  </form>
                <?php 
                }else {
            ?>
            <form action="/index.php?r=Visitor/to_write" method="POST"> 
                <td align="center" bgcolor="#337AB7">
                  <input type="hidden" name="getdate" value=<?= $year."-".$month."-".$k?>  >
                  <button class="btn-block btn btn-primary" style="font-size: 30px ; height: 95px" type="submit" >
                    <?=$k?>
                  </button>
                </td>
            </form>
            <?php }
                    if(($k+$week)%7==0){
                      echo "<tr></tr>"; // 一周七天换行
                    }
                }
            ?>
        </tr>

    </table>

    <table>
          



    </table>
    
</body>
</html>