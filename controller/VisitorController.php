<?php
	include("model/Logs.php");
	include('model/User.php');
	include('model/Smtp.php');
	header("Content-Type:text/html;charset=utf-8");
	date_default_timezone_set("PRC");
	class VisitorController{

		public function home_page(){
			$year=date("Y"); //当前的年
			$month=date("m"); //当前的月
			$week=date("w"); // 每个月的一号是星期几
			$days=date("t"); //每个月的总天数
			$day=date("d"); //获取今天是几号
			include('view/Visitor/Calendar_show.php');
		}

		
		

		
		public function to_write(){
			
			$getdate = $_POST['getdate'];
			if (!session_id()) session_start();
			$user = $_SESSION['user'];
			$LogsModel = new Logs();
			$logs = $LogsModel->find_exact($getdate,$user['uemail']);
			//var_export($logs);
			include('view/Visitor/writelogs.php');
		}



		public function do_record(){
			$content = $_POST['content'];
			$getdate = $_POST['getdate'];
			if (!session_id()) session_start();
				$user = $_SESSION['user'];

			$LogsModel = new Logs();
			$LogsModel->add_log($getdate, $user['uemail'], $content);
			
			$this->to_write();

		}

		public function do_delete(){
			$getdate = $_POST['getdate'];
			$id = $_POST['id'];
				$user = $_SESSION['user'];
			$LogsModel = new Logs();
			$LogsModel->delete_log($id);
			$this->to_write();
		}

		public function do_search(){
			$keyword = $_POST['keyword'];
			$getdate = $_POST['getdate'];
			if (!session_id()) session_start();
			$user = $_SESSION['user'];
			$LogsModel = new Logs();
			$logs = $LogsModel->search_logs($keyword,$user['uemail'],$getdate);
			
			include('view/Visitor/writelogs.php');
		}
		public function  to_weather()
        {

            $getdate = $_POST['getdate'];
            if (!session_id()) session_start();
            $user = $_SESSION['user'];
            $LogsModel = new Logs();
            $logs = $LogsModel->find_exact($getdate,$user['uemail']);
            //var_export($logs);
            include('view/Visitor/Weekweather.php');
        }
        public function  change_uname()
        {
            $uname=$_POST['uname'];
            $password=$_POST['password'];
            if (!session_id()) session_start();
            $Ypassword=$_SESSION['user']['password'];
            $UserModel= new User();
            if($password==$Ypassword)
            {
                $UserModel->update_uname($uname,$_SESSION['user']['uemail']);
                $_SESSION['user']['uname'] = $uname;
            }
            else
            {
                echo '<script>alert("密码错误请重新输入！");</script>';
            }
            $this->home_page();


        }
	}
?>