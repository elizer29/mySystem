<?php
	include 'dao/mySystemDAO.php';
	
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$middle_initial = $_POST['middle_initial'];
	$age = $_POST['age'];
	$gender = $_POST['gender'];
	$address = $_POST['address'];
	$department = $_POST['department'];
	$date = $_POST['date'];
	
	$action = new mySystemDAO();
	$action->addPatients($firstname, $lastname, $middle_initial, $age, $gender, $address, $department, $date);
?>
