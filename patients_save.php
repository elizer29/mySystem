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
	$id = $_POST['id'];
	
	$action = new mySystemDAO();
	$action->patients_save($firstname, $lastname, $middle_initial, $age, $gender, $address, $department, $date, $id);
?>
