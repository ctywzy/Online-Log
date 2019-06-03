<?php
	header("Content-Type:text/html;charset=utf-8");
	date_default_timezone_set("PRC");
	class CalendarController{
		
		public function last_month(){
			$year=@$_POST["year"];
			$month=@$_POST["month"];
			if($month == 1){
				$month = 12;
			 	$year = $year-1;
			 }else{
			 	$month = $month -1;
			 }
			$noe=mktime(0,0,0,$month,1,$year);
			$week=date("w",$noe); 
			$days=date("t",$noe);
			$day=date("d");
			include('view/Visitor/Calendar_show.php');
		}

		public function last_year(){
			$year=@$_POST["year"];
			$month=@$_POST["month"];
			$year = $year-1;
			$noe=mktime(0,0,0,$month,1,$year);
			$week=date("w",$noe); 
			$days=date("t",$noe);
			$day=date("d");
			include('view/Visitor/Calendar_show.php');
		}

		public function next_month(){
			$year=@$_POST["year"];
			$month=@$_POST["month"];
			if($month == 12){
				$month = 1;
			 	$year = $year+1;
			}else{
			 	$month = $month + 1;
			}
			$noe=mktime(0,0,0,$month,1,$year);
			$week=date("w",$noe); 
			$days=date("t",$noe);
			$day=date("d");
			include('view/Visitor/Calendar_show.php');


		}

		public function next_year(){
			$year=@$_POST["year"];
			$month=@$_POST["month"];
			$year = $year+1;
			$noe=mktime(0,0,0,$month,1,$year);
			$week=date("w",$noe); 
			$days=date("t",$noe);
			$day=date("d");
			include('view/Visitor/Calendar_show.php');
		}
		
	}
?>