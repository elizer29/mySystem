<?php
	class baseDAO {
		protected $username = "root";
		protected $password = "";
		protected $db_name = "akonSystem";
		protected $dbh = null;
		
		function openConn(){
			$this->dbh = new PDO("mysql:host=localhost;dbname=".$this->db_name, $this->username, $this->password);
		}
		function closeConn(){
			$this->dbh = null;
		}
	}
?>
