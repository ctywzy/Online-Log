<?php
	header("Content-Type: text/html;charset=utf-8");
	include('model/User.php');
	Class RegisterController{



		public function do_register(){
			echo $_POST['uemail'];
			$uemail = $_POST['uemail'];	
			$uname = $_POST['uname'];	
			$password = $_POST['password'];	
			$UserModel = new User();

			if(strlen($password)<6){echo '<script>alert("密码长度过短");window.history.go(-1);</script>'; exit;}
			$x=0;
			$y=0;
			$z=0;
			for ($i=0; $i < strlen($password); $i++) {
				$ch = $password[$i];
				if(preg_match('/^[a-z]+$/', $ch)){
			      $x=1;
			   }elseif(preg_match('/^[A-Z]+$/', $ch)){
			      $y=1;
			   }else if( $ch>='0'&&$ch<='9'){
			   		$z=1;
			   }
			}
			if($x+$y+$z<3){
				echo '<script>alert("密码强度不够");window.history.go(-1);</script>'; exit;
			}

			$bool = $UserModel->exist_judge($uemail);
			if($bool == true){
				$UserModel->insert_user($uemail, $uname, $password);
				include("model/Smtp.php");
		        $MailServer = "smtp.exmail.qq.com"; //SMTP服务器
		        $MailPort = 25; //SMTP服务器端口
		        $smtpMail = "wangzu@phpstudywzy.xyz"; //SMTP服务器的用户邮箱
		        $smtpuser = "wangzu@phpstudywzy.xyz"; //SMTP服务器的用户帐号
		        $smtppass = "Wzy02130.0"; //SMTP服务器的用户密码
		            //创建$smtp对象 这里面的一个true是表示使用身份验证,否则不使用身份验证.
		        $smtp = new Smtp($MailServer, $MailPort, $smtpuser, $smtppass, true); 
		        $smtp->debug = false; 
		        $mailType = "HTML"; //信件类型，文本:text；网页：HTML
		        $emailTitle = "您好"; //邮件主题
		        $token = md5($uname.$password);
		        $emailBody = "亲爱的".$uname."：<br/>感谢您在我站注册了新帐号。<br/>。<br/><a href='http://local.final.com/'>Welcome!</a><br/>如果以上链接无法点击，请将它复制到你的浏览器地址栏中进入访问。<br/>如果此次激活请求非你本人所发，请忽略本邮件。<br/><p style='text-align:right'>-------- 在线便签组 敬上</p>";

		        $rs = $smtp->sendmail($uemail, $smtpMail, $emailTitle, $emailBody, $mailType);
		        if($rs==true){
		            echo '<script>alert("恭喜您，注册成功！请登录到您的邮箱及时激活您的帐号！");window.history.go(-1);</script>';
		        }else{
		            echo "注册失败";
		        }
			}else{
				echo '<script>alert("该邮箱已经被注册了");window.history.go(-1);</script>';
        		exit;
			}


		}



	}



?>