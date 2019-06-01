<?php


header("Content-Type: text/html;charset=utf-8");

$route = isset($_GET['r']) ? $_GET['r'] : NULL;

set_include_path(get_include_path() . PATH_SEPARATOR . '../');
//var_dump($route);
if ($route) {
	if (!session_id()) session_start();
	$partition = explode("/", $route);	


	$r0  = $partition[0];
	$class_name = ucfirst(strtolower($r0))."Controller";
	$function_name = $partition[1];

	
	if(!in_array(ucfirst(strtolower($r0)), ['Register', 'Login'])){
		if($user['role'] == "Admin"){
		    $user = $_SESSION['user'];
			if(ucfirst(strtolower($r0)) != "Admin"){
				echo '<script>alert("权限不足");window.history.go(-1);</script>';
				exit;
			}

		}

		if($user['role'] == "Visitor"){
			if(ucfirst(strtolower($r0)) == "Admin"){
				echo '<script>alert("权限不足");window.history.go(-1);</script>';
			}
		}

	}
	

	if(!file_exists('../controller/' . $class_name . '.php')){
		echo '<script>alert("err route");window.history.go(-1);</script>';
        exit;
	}
	include('controller/' . $class_name . '.php');
	if(!class_exists($class_name)){
		echo '<script>alert("err route");window.history.go(-1);</script>';
        exit;
	}
	$controller = new $class_name();
	if(!method_exists($controller,$function_name)){
		echo '<script>alert("err route");window.history.go(-1);</script>';
        exit;
	}
	if($function_name=='check_mod'){
		$controller->$function_name($partition[2]);
	}else{
		$controller->$function_name();
	}
	
} else {
	include('controller/LoginController.php');
	$loginController = new LoginController();
	$loginController->login_page();
}
