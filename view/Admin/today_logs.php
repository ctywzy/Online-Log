<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Online | Memo</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link rel="stylesheet" type="text/css" href="/js/jquery.js">
    <link rel="stylesheet" type="text/css" href="/js/bootstrap.min.js">
</head>
<body background ="#31C5BE">
  <nav class="navbar navbar-default" role="navigation">
       <div class="navbar-header col-sm-3">
          <a class="navbar-brand" href="#">Online | Memo</a>
       </div>
       <div class="navbar-header col-sm-3">
         <form action="/index.php?r=login/login_page" method="POST" class="navbar-form navbar-left">
             <button type="submit" class="btn btn-info">退出</button>
          </form>    
       </div>
       <div class="navbar-header col-sm-3">
         <form action="/index.php?r=Admin/do_tip" method="POST" class="navbar-form navbar-left">
             <button type="submit" class="btn btn-info">提醒</button>
          </form>    
       </div>
       <div class="navbar-header col-sm-3">
          <form class="navbar-form navbar-right" role="search" action="/index.php?r=Admin/do_search" method="POST">
              <input type="text" class="form-control" placeholder="搜索格式yyyy-mm-dd"  name="date">
              <button type="submit" class="btn btn-info">查找备忘信息</button>
          </form>    
       </div>
    </nav>
    <?php
      //echo $getdate;
    ?>
    

    <table class="table table-bordered">

        <tr bgcolor="#31C5BE">
           <th style="text-align: center;width: 400px" class="col-sm-3">邮箱</th>
           <th style="text-align: center;width: 400px" class="col-sm-8">条数</th>
        </tr>
        <?php foreach ($users as $user) : ?>
          <tr class="warning">
            <td style="text-align: center;font-size: 25px;width: 400px" ><?= $user['user_email']  ?></td>
            <td style="text-align: center;font-size: 25px;width: 400px"><?= $user['num'] ?></td>            
          </tr>
            
        <?php endforeach; ?>
    </table>


</body>
</html>