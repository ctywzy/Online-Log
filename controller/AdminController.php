<?php
	header("Content-Type: text/html;charset=utf-8");
	date_default_timezone_set("PRC");
	include('model/User.php');
	class AdminController{
		public function home_page(){
			$UserModel = new User();

			$users = $UserModel->find_all(); 


			include('view/Admin/home_page.php');
		}

		public function today_logs(){
			$y = date('Y');
			$m = date('m');
			$d = date('d');
			$date = $y."-".$m."-".$d;
			$UserModel = new User();
			$users = $UserModel->get_tnlogs($date);

			include('view/Admin/today_logs.php');
			
		}

		public function do_search(){

			$date=$_POST['date'];
			$UserModel = new User();
			$users = $UserModel->get_tnlogs($date);
			include('view/Admin/today_logs.php');
		}

		public function do_tip(){
			$y = date('Y');
			$m = date('m');
			$d = date('d');
			$date = $y."-".$m."-".$d;
			$UserModel = new User();
			$users = $UserModel->get_tnlogs($date);




			include('view/Admin/today_logs.php');
		}



	}
?>