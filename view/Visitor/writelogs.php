<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Online | Memo</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link rel="stylesheet" type="text/css" href="/js/jquery.js">
    <link rel="stylesheet" type="text/css" href="/js/bootstrap.min.js">
</head>
<body>
	<nav class="navbar navbar-default" role="navigation">
       <div class="navbar-header ">
          <a class="navbar-brand" href="#">Online Memo</a>
       </div>
       <div class="navbar-header col-xs-offset-4 ">
          <a class="navbar-brand" href="#" style="color: red"><?= $getdate?></a>
       </div>
       <div class="navbar-header col-xs-offset-1  " >
         <form action="/index.php?r=Visitor/home_page" method="POST" class="navbar-form navbar-left">
             <button type="submit" class="btn btn-info">返回日历</button>
          </form>    
       </div>
       <div class="navbar-header" >
         <form action="/index.php?r=login/login_page" method="POST" class="navbar-form navbar-left">
             <button type="submit" class="btn btn-info">切换用户</button>
          </form>    
       </div>
       <div class="navbar-header">
          <form class="navbar-form navbar-right" role="search" action="/index.php?r=Visitor/do_search" method="POST">
                <input type="text" class="form-control" placeholder="keyword"  name="keyword">
              <input type="hidden" name="getdate" value=<?= $getdate?>>
             	<button type="submit" class="btn btn-info">查找备忘</button>
          </form>    
       </div>
    </nav>
    <?php
      //echo $getdate;
    ?>
     <section id="intro" class="section-wrap intro-section text-left color-white">    
        <!--Slider-->
        <div class="container">
            <div class="row">
                <div class="">
                    <div class="contact-cont wow fadeInRightBig">
                        <div class="title pt30" align="center">添加备忘</div>
                        <form action="/index.php?r=Visitor/do_record" method="POST">
                            <div class="row">
                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <div class="inp-icon paper-plane">
                                            <textarea class="form-control inp" placeholder="Message" id="message" required="" name="content"></textarea>
                                        </div>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div  align="center">
                                        <input type="hidden" name="getdate" value=<?= $getdate?>>
                                        <button type="submit" class="button small alt mt35">添加</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <table class="table table-bordered">

        <tr bgcolor="#31C5BE">
           <th style="text-align: center;width: 250px" class="col-sm-3">创建日期</th>
           <th style="text-align: center;width: 1000px" class="col-sm-8">内容</th>
           <th style="text-align: center;width: 150px" class="col-sm-1"></th>
        </tr>
        <?php foreach ($logs as $log) : ?>
          <tr class="warning">
            <td style="text-align: center;font-size: 25px;width: 250px" ><?= $log['create_on']  ?></td>
            <td style="text-align: center;font-size: 25px;width: 1000px"><?= $log['content'] ?></td>
            <form action="/index.php?r=Visitor/do_delete" method="POST">
              <td align="center" style="width: 150px">
                 <input type="hidden" name="getdate" value=<?= $getdate?>>
                <input type="hidden" name="id" value=<?= $log['id']  ?> >
                <button type="submit" class="btn btn-block  btn-danger ">删除</button>
              </td>
            </form>
            
          </tr>
            
        <?php endforeach; ?>
    </table>


</body>
</html>