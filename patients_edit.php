<?php
	include 'dao/mySystemDAO.php';
	
	$id = $_POST['id'];
	
	$action = new mySystemDAO();
	$action->patients_edit($id);
?>
