<?php
	include_once("model/Model.php");

	class User extends Model{
		public function login_judge($uemail, $password){
		
			$sql = "select * from users where uemail = ?";

			$statement = $this->pdo->prepare($sql);
			$statement->execute([$uemail]);
			$user = $statement->fetch();

			if($user['uemail']==$uemail && $user['password']==$password)//解决了sql注入问题
				return $user;
			else 
				return false;
		}

		public function exist_judge($uemail){//判断是否已经注册
			$sql = "select * from users where uemail = ?";
			$statement = $this->pdo->prepare($sql);
			$statement->execute([$uemail]);
			$user = $statement->fetch();
			if($user){
				return false;
			}
			else {
				return true;
			}

		}



		public function insert_user($uemail, $uname, $password){//插入新用户
			$role = "Visitor";
			$sql = "insert into users(uname,password,uemail,role) values(?,?,?,?)";
			$statement = $this->pdo->prepare($sql);

			$statement->execute([$uname,$password,$uemail,$role]);

		}
		
		public function find_all(){
			$sql = "select * from users";
			$statement = $this->pdo->prepare($sql);
			$statement->execute();
			$users = $statement->fetchAll();
			return $users;
		}
		public function exist_judge2($token){//判断是否已经申请
			$sql = "select * from puser where token = ?";
			$statement = $this->pdo->prepare($sql);
			$statement->execute([$token]);
			$user = $statement->fetch();
			if($user){
				return false;
			}
			else {
				return true;
			}

		}

		public function update_status($token_get){
		    //echo $token_get;
			$sql = "select * from puser where token = ?";
			$statement = $this->pdo->prepare($sql);
			$statement->execute([$token_get]);
			$puser = $statement->fetch();
			//var_export($puser);
			$uemail = $puser['pemail'];
			$password = $puser['password'];

			//echo $password." " .$uemail;
			$sql = "update users set password=? where uemail = ?";
			$statement = $this->pdo->prepare($sql);
			$statement->execute([$password,$uemail]);

			$sql = "delete from puser where token =?";
			$statement = $this->pdo->prepare($sql);
			$statement->execute([$token_get]);
		}

		public function insert_user2($uemail, $password, $token){//插入新用户
			$sql = "insert into puser(pemail,password,token) values(?,?,?)";
			$statement = $this->pdo->prepare($sql);
			$statement->execute([$uemail,$password,$token]);

		}

        public function  find_keyuser($keyword){
		    $sql = "select * from users where uemail like ?";
		    $statement = $this->pdo->prepare($sql);
		    $keyword = "%".$keyword."%";
		    $statement->execute([$keyword]);
		    return $statement->fetchAll();
        }

		public function update_uname($uname, $uemail){
		    $sql = "update users set uname = ? where uemail = ?";
		    $statement = $this->pdo->prepare($sql);
		    $statement->execute([$uname,$uemail]);



        }

	}
?>