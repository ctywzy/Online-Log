<?php
	include_once("model/Model.php");
	class Logs extends Model{
		public function find_exact($time, $uemail){//根据事件查找
			$sql = "select * from logs where date = ? and user_email = ?";
			$statement = $this->pdo->prepare($sql);
			$statement->execute([$time, $uemail]);
			$logs = $statement->fetchAll();
			return $logs;
		}

		public function add_judge($date, $uemail, $content){
			$sql = "select * from logs where date=? and user_email= ? and content = ?";
			$statement = $this->pdo->prepare($sql);
			$statement->execute([$date,$uemail,$content]);
			$user = $statement->fetch();
			if($user)	
				return false;
			else return true;
		}


		public function add_log($date, $uemail, $content){
			$bool = $this->add_judge($date, $uemail, $content);
			if($bool==true){
				$sql = "insert into logs(date,user_email, content) values(?,?,?)";
				$statement = $this->pdo->prepare($sql);
				$statement->execute([$date,$uemail,$content]);
			}
			
			//echo $date;
		}

		public function delete_log($id){
			$sql = "delete from logs where id = ?";
			$statement = $this->pdo->prepare($sql);
			$statement->execute([$id]);

		}

		public function search_logs($keyword,$uemail,$getdate){
			$keyword = '%'.$keyword.'%';

			$sql = "select * from logs where user_email = ? and date = ? and content like ?  ";
			//echo $sql;
			$statement = $this->pdo->prepare($sql);
			$statement->execute([$uemail,$getdate,$keyword]);
			//var_export($statement);
			$logs = $statement->fetchAll();
			return $logs;
		}

        public function get_tnlogs($date){
            $sql = "select user_email, count(content) num from logs where date = ? group by user_email";
            $statement = $this->pdo->prepare($sql);
            $statement->execute([$date]);
            return $statement->fetchAll();
        }


		public function find_by_date($date){
		    $sql = "select * from logs where date = ?";
		    $statement = $this->pdo->prepare($sql);
		    $statement->execute([$date]);
		    return $statement->fetchAll();
        }

        public function get_log_dateuser($date,$email){
		    $sql = "select * from logs where date = ? and user_email = ?";
		    $statement = $this->pdo->prepare($sql);
		    $statement->execute([$date,$email]);
		    return $statement->fetchAll();
        }

	}
?>