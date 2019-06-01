<?php
	header("Content-Type: text/html;charset=utf-8");
	date_default_timezone_set("PRC");
	include('model/User.php');
	include('model/Smtp.php');
	include('model/Logs.php');
	class AdminController{
	    public function get_date(){
            $y = date('Y');
            $m = date('m');
            $d = date('d');
            $date = $y."-".$m."-".$d;
            return $date;
        }

		public function home_page(){
			$UserModel = new User();

			$users = $UserModel->find_all(); 


			include('view/Admin/home_page.php');
		}

		public function today_logs(){

			$date = $this->get_date();
			$LogsModel = new Logs();
			$lognum = $LogsModel->get_tnlogs($date);

			include('view/Admin/today_logs.php');
			return $lognum;
		}

		public function do_search(){

			$date=$_POST['date'];
			$logsModel = new User();
            $lognum = $logsModel->get_tnlogs($date);
			include('view/Admin/today_logs.php');
		}

        public function send($uemail,$number,$Allcontent){
	        //echo "sendhello";
            $MailServer = "smtp.exmail.qq.com"; //SMTP服务器
            $MailPort = 25; //SMTP服务器端口
            $smtpMail = "wangzu@phpstudywzy.xyz"; //SMTP服务器的用户邮箱
            $smtpuser = "wangzu@phpstudywzy.xyz"; //SMTP服务器的用户帐号
            $smtppass = "Wzy02130.0"; //SMTP服务器的用户密码
            //创建$smtp对象 这里面的一个true是表示使用身份验证,否则不使用身份验证.
            $smtp = new Smtp($MailServer, $MailPort, $smtpuser, $smtppass, true);
            $smtp->debug = false;
            $mailType = "HTML"; //信件类型，文本:text；网页：HTML
            //$email = $uemail;  //收件人邮箱
            $emailTitle = "亲爱的用户您好，以下是您今天的备忘"; //邮件主题
            $emailBody = $Allcontent;
            $rs = $smtp->sendmail($uemail, $smtpMail, $emailTitle, $emailBody, $mailType);
            //echo $rs;

        }


		public function do_tip(){
            $date = $this->get_date();
            $lognum = $this->today_logs();
            $logModel = new Logs();
            $sends =$logModel->find_by_date($date);//今天的日志
            foreach ($lognum as $log) {
                $number = $log['num'];
                $uemail = $log['user_email'];
                $contents = $logModel->get_log_dateuser($date,$uemail);
                $Allcontent = "您今天一共有".$number."条备忘</br>";
                $i = 1;
                foreach ($contents as $content){
                    $Allcontent = $Allcontent."第".$i."条</br>".$content['content']."</br>";
                    $i = $i+1;
                }
                $this->send($uemail,$number,$Allcontent);
            }
		}

		public function user_search(){
	        $userModel = new User();
	        $keyword = $_POST['keyword'];
	        $users = $userModel->find_keyuser($keyword);
            include('view/Admin/home_page.php');
        }
	}
?>