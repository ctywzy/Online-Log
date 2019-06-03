<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Online | Memo</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">

    <link rel="stylesheet" href="css/swipebox.min.css" type="text/css">

    <!-- Custom Fonts -->


    <!-- Plugin CSS -->
    <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="css/owl.theme.css" type="text/css">
    <link rel="stylesheet" href="css/owl.transitions.css" type="text/css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/animate.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">

    <script type="text/javascript">
        function chk_form(){

            var email = document.getElementById("uemail");
            echo $email;
            var preg = /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/; 
            if(!preg.test(email.value)){ 
                alert("Email格式错误！");
                return false;
            }
        }
    </script>
  
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
    
    <!-- Navigation -->
    <div class="header-navbar">
        <!-- Main nav panel -->
        <div id="mainNav" class="navbar navbar-default navbar-theme navbar-fixed-top" role="navigation">
            <div class="container">                
                <div class="row">
                    <div class="header_section-container">
                        <div class="col-xs-6 col-sm-3">
                            <a class="site-logo" href="#">
                                Online-Memo
                            </a>    
                        </div>
                        <div class="col-xs-0 col-sm-6">
                            <div class="navbar-header header_side">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse navbar-ex1-collapse text-left header_side menu_line_enable">
                                <ul class="nav navbar-nav menu navbar-left">
                                    <li class="menu-item">
                                        <a href="#intro">登录</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="#direction">介绍</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="#contact">注册</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-3 text-right">
                            <div class="info-inline">
                                <a class="text-right" >123 456 789</a><br>
                                17 Dayang Ave, Taizhou Collage
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </div>
    </div>
    
    <!-- Intro Section -->
    <section id="intro" class="section-wrap intro-section text-left color-white">    
        <!--Slider-->
        <div class="container">
            <div class="row">
                <div class="col-xs-11 col-xs-offset-1  col-sm-offset-4 col-md-6 col-md-offset-6 col-lg-5 col-lg-offset-7">
                    <div class="contact-cont wow fadeInRightBig">
                        <p class="pt40"></p>
                        <div class="title "><strong>Welcome to</strong></br> the <strong>Online-Memo</strong></div>
                        <p class="pb25">
                        <form action="index.php?r=login/do_login" name="sentMessage" method="POST" onsubmit="return chk_form();">
                            <div class="row wow fadeInRightBig">
                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <div class="inp-icon user">
                                            <input type="text" class="form-control inp" placeholder="邮箱" name="uemail" required="">
                                        </div>
                                    </div>
                                </div>
                                <p class="help-block text-danger"></p>
                                <div>
                                   </br>
                                   </br>
                                   </br>
                                   </br>
                                </div>
                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group pb35">
                                        <div class="inp-icon mail">
                                            <input type="password" class="form-control inp" placeholder="密码" name="password" required="">
                                        </div>
                                    </div>
                                </div>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12" align="center">
                                    <button type="submit" class="button small alt ">登录</button>
                                </div>
                            </div>
                        </form>
                        <div class="col-sm-12 col-md-12" align="center">
                            <button type="submit" class="btn btn-link" data-toggle="modal" data-target="#myModal">忘记密码</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End -->
    <form action="index.php?r=Login/find_password" method="POST" onsubmit="return chk_form();">
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="row">
                    <div class="col-md-offset-1 col-md-10 pt25">
                        <div class="form-group">
                            <div class="inp-icon user">
                                <input type="text" class="form-control inp" placeholder="邮箱" id="uemail" name="uemail" required="">
                            </div>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <p class="help-block text-danger"></p>
                    <div class="col-md-offset-1 col-md-10">
                        <div class="form-group">
                            <div class="inp-icon user">
                                <input type="password" class="form-control inp" placeholder="密码 大写字母+小写字母+数字+6位以上"  name="password"  required="">
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
   <section id="direction" class="section-wrap pt0">
        <div class="container">
            <div class="row">
                
                <div class="col-lg-8 col-md-7 col-sm-6">
                    <h2 class="title"><span>Our</span> Direction</h2>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <p>备忘录意指任何一种能够帮助记忆,简单说明主题与相关事件的图片、文字或语音资料。过去人们使用的备忘录往往是纸质备忘录，随着科技的发展，备忘录已经有了相应移动端软件，以及WEB版的应用。</p>
                            <p class="pb35">人类的大脑很强大，能存储很多东西，但让一个成年人回忆起所有童年的事情，很难。与其让大脑存放了这么多信息，不如把信息从脑海里拿出来记在纸上, 让大脑释放出来去思考如何做一件成功的事。传统的备忘就是用来帮助人们将脑海中的信息存储在纸上。</p>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <p>然而，传统的备忘录却无法起到区分事件重要性、合理分配时间以及督促人们将重要事件完成的作用。这就导致了即使事情被记录下来，工作和生活的效率却未必因此而提高，有限的时间和资源可能被分配到了不重要的事情上，重要的事却没有按期完成。</p>
                            <p class="mb20">用我们这款在线备忘录，不仅可以做到对事情的记录，我们还会提醒你隔天即将发生的事情，帮助我们免除了许多烦恼</p>
                            <img src="img/content/signature.png" width="162" height="37" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer-page" id="contact">
        <div class="footer-top" margin="100sp">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-2 wow fadeInRightBig">
                        <h2 class="title"><span>加入 </span>我们</h2>
                        <p class="25pd"></p>
                        <p class="mb10">Use this online memo, and then we will provide you with excellent experience</p>
                        <p class="25pd"></p>
                        <div class="contact-cont wow fadeInRightBig">
                            <form  action="index.php?r=register/do_register" method="POST" onsubmit="return chk_form();">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <div class="inp-icon user">
                                                <input type="text" class="form-control inp" placeholder="邮箱" id="uemail" name="uemail" required="">
                                            </div>
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </div>
                                    </br>
                                    </br>
                                    </br>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <div class="inp-icon mail">
                                                <input type="text" class="form-control inp" placeholder="用户名"  name="uname"  required="">
                                            </div>
                                            <p class="help-block text-danger"></p>
                                        </div>
                                        
                                    </div>
                                    <p class="help-block text-danger"></p>
                                    </br>
                                    </br>
                                    </br>
                                    <div class="col-sm-6 col-md-12">
                                        <div class="form-group">
                                            <div class="inp-icon user">
                                                <input type="password" class="form-control inp" placeholder="密码 大写字母+小写字母+数字+6位以上"  name="password"  required="">
                                            </div>
                                            <p class="help-block text-danger"></p>
                                        </div>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    
                                </div>

                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <div class="text-left">
                                            <div id="success"></div>
                                            <button type="submit" class="button small mt45">注册</button>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom text-left">

            <div class="container pb35">  
                <div class="row">
                    <div class="copyright color-white">
                        <div class="col-sm-6 col-xs-12">
                            <p class="pb10">&copy; 2020 MedLife. All rights reserved.</p>
                        </div>
                        <div class="col-sm-6 col-xs-12 text-right">
                            <p class="pb10" target="_blank">Terms and Conditions | Privacy Policy</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    
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
