<?php
	include 'dao/baseDAO.php';
	
	class myUserDAO extends baseDAO {
	
		function login($username, $password){
			$this->openConn();
			
			$stmt = $this->dbh->prepare("select * from user where username=? and password=?");
			$stmt->bindParam (1, $username);
			$stmt->bindParam (2, $password);
			$stmt->execute();
			
			if($row = $stmt->fetch()){
				return true;
			} else {
				return false;
			}
			
			$this->closeConn();
		}
		
		function getUser($username, $password){
			$this->openConn();
			
			$stmt = $this->dbh->prepare("select username from user where username=? and password=?");
			$stmt->bindParam (1, $username);
			$stmt->bindParam (2, $password);
			$stmt->execute();
			
			$row = $stmt->fetch();
			return $row[0];
			
			$this->closeConn();
		}
	}
?>
