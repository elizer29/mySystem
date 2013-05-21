<?php
	include 'dao/mySystemDAO.php';
	
	$lastname = $_POST['lastname'];
	
	$action = new mySystemDAO();
	$action->patients_search($lastname);
?>
