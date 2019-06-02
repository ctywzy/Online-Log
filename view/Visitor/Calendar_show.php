<html lang="en">
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
       <div class="navbar-header ">
          <a class="navbar-brand" href="#">Online | Memo</a>
       </div>
       <div class="navbar-header ">
            <a class="navbar-brand" href="#"><?="用户名".$_SESSION['user']['uname']?></a>
        </div>
        <div class="navbar-header" >
            <div class="navbar-btn">
                <button type="submit" class="btn btn-info" data-toggle="modal" data-target="#myUname">修改用户名</button>
            </div>
        </div>
       <div class="navbar-header col-xs-offset-1">
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
       <div class="navbar-header " >
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
       <div class="navbar-header " align="right">
            <form action="/index.php?r=Visitor/to_weather" method="POST" class="navbar-form navbar-left">
                <button type="submit" class="btn btn-info">一周天气状态</button>
            </form>
        </div>
        <form action="index.php?r=Visitor/change_uname" method="POST">
            <div class="modal fade" id="myUname" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="row">
                            <div class="col-md-offset-1 col-md-10 pt25">
                                <div class="form-group">
                                    <div class="inp-icon user">
                                        <input type="text" class="form-control inp" placeholder="新的用户名" id="uname" name="uname" required="">
                                    </div>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <p class="help-block text-danger"></p>
                            <div class="col-md-offset-1 col-md-10">
                                <div class="form-group">
                                    <div class="inp-icon user">
                                        <input type="password" class="form-control inp" placeholder="输入密码确认修改"  name="password"  required="">
                                    </div>
                                    <p class="help-block text-danger"></p>
                                </div>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        </br>
                        <div align="center">
                            <button type="submit" class="button small"  >修改</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal -->
            </div>
        </form>
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
                    if($k<10) $k="0".$k;
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

    <!-- Custom Theme JavaScript -->
    <script src="js/current.js"></script>
</body>
</html>