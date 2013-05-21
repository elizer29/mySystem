<?php
session_start();

if(!(($_POST['username']=="") && ($_POST['password']==""))){
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$user = "root";
	$pass = "";
	$d_name = "mySystem";
	
	$dbh = new PDO("mysql:host=localhost; dbname=".$d_name, $user, $pass); 
	
	$stmt = $dbh->prepare("select * from user where username like ?");
	$stmt->bindParam (1, $_POST['username']);
	$stmt->execute();
	
	$row = $stmt->fetch();
	
	if(isset($_SESSION['username'])){
		header('Location: admitting.php');
	} else {
		if(isset($_POST['username']) && isset($_POST['password'])){
			if(($row[2] == $_POST['username']) && ($row[3] == $_POST['password'])){
				$_SESSION['username'] = $_POST['username'];
				header('Location: admitting.php');
			} else {
				header('Location: LogIn.php');
			}
		}
	}
} else {
	header('Location: LogIn.php');

}	
?>
