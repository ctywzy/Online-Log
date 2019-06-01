<?php
header("Content-Type: text/html;charset=utf-8");
	include('model/Logs.php');
	include('model/User.php');
	include('model/Smtp.php');
	class LoginController{
		public function login_page() {
			include('view/login.php');
		}


		public function do_login() {
			$uemail = $_POST['uemail'];	
			$password = $_POST['password'];	
			$userModel = new User();
			$user = $userModel->login_judge($uemail, $password);
			//var_export($user);
			if($user){
				if (!session_id()) session_start();
				$_SESSION['user'] = $user;
				if($user['role']=='Admin'){
					echo "hello";
					header("Location: /index.php?r=Admin/home_page");
				}else{
					header("Location: /index.php?r=Visitor/home_page");
				}
			}else{
				echo '<script>alert("邮箱或密码错误");window.history.go(-1);</script>';
        			exit;
			}
		}


		public function find_password(){
			$uemail = $_POST['uemail'];
			$password = $_POST['password'];
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
			$token = md5($uemail.$password);

			$UserModel = new User();
			$bool = $UserModel->exist_judge2($uemail);
			if($bool==true){
				$UserModel->insert_user2($uemail,$password,$token);
			}
			
			
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
	        $emailBody = "请点击下方链接确定修改密码<br/><a href='http://local.final.com/index.php?r=Login/check_mod/$token'>$token</a>
	        <br/>如果以上链接无法点击，请将它复制到你的浏览器地址栏中进入访问，或重新请求修改密码。<br/>如果此次验证请求非你本人所发，请忽略本邮件。<br/>";
	        $rs = $smtp->sendmail($uemail, $smtpMail, $emailTitle, $emailBody, $mailType);
		        
			if($rs==true){
	            //echo '<script>alert("请求成功！");window.history.go(-1);</script>';
	        }else{
	            echo "请求失败";
	        }

	        header("Location:/index.php?r=Login/login_page");

		}

		public function check_mod($token_get){//修改密码
			$UserModel = new User();
			$UserModel->update_status($token_get);
			header("Location: /index.php");
		}

	}
?>