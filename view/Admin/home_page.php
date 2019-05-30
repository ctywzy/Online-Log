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
          <a class="navbar-brand" href="#">Online Memo</a>
       </div>
       <div class="navbar-header col-sm-3">
        <a class="navbar-brand" href="#">Online Memo</a>

       </div>
       <div class="navbar-header col-sm-3">
         <form action="/index.php?r=Admin/today_logs" method="POST" class="navbar-form navbar-left">
             <button type="submit" class="btn btn-info">Today-Memos</button>
          </form>    
       </div>
       <div class="navbar-header col-sm-3">
          <form class="navbar-form navbar-right" role="search" action="/index.php?r=Visitor/do_search" method="POST">
              <input type="text" class="form-control" placeholder="keyword"  name="keyword">

              
             	<button type="submit" class="btn btn-info">查找用户</button>
          </form>    
       </div>
    </nav>
    <?php
      //echo $getdate;
    ?>
    

    <table class="table table-bordered">

        <tr bgcolor="#31C5BE">
           <th style="text-align: center;width: 400px" class="col-sm-3">注册时间</th>
           <th style="text-align: center;width: 400px" class="col-sm-8">邮箱</th>
           <th style="text-align: center;width: 400px" class="col-sm-1">密码</th>
        </tr>
        <?php foreach ($users as $user) : ?>
          <tr class="warning">
            <td style="text-align: center;font-size: 25px;width: 400px" ><?= $user['create_at']  ?></td>
            <td style="text-align: center;font-size: 25px;width: 400px"><?= $user['uemail'] ?></td>
            <form action="/index.php?r=Visitor/do_delete" method="POST">
              <input type="hidden" name="getdate" value=<?= $user['create_at']?>>
                <input type="hidden" name="id" value=<?= $user['uemail'] ?> >
              <td align="center" style="width: 400px;font-size: 20px"><?= $user['password'] ?>
                
              </td>
            </form>
            
          </tr>
            
        <?php endforeach; ?>
    </table>


</body>
</html>