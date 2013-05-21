<?php
	session_start();
	
	if (!isset($_SESSION['username'])){
		header('Location: home.php');
	} else {
		$username = $_SESSION['username'];
	}
?>
<!DOCTYPE html>
<html>
<title>Monitoring Page</title>
<link rel="shortcut icon" href="images/top.ico" />
<head>

<meta http-equiv="refresh" content="600">

<script src="js/jquery-1.8.2.min.js"></script>
<script src="js/mySystemJScript.js"></script>
<script src="js/jquery-ui-1.9.0.custom.min.js" ></script>
<script src="bootstrap/js/bootstrap.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="js/jquery-ui.js" ></script>

<link rel="stylesheet" href="bootstrap/css/bootstrap.css" />
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" href="bootstrap/css/bootstrap.responsive.css" />
<link rel="stylesheet" href="bootstrap/css/bootstrap.responsive.min.css" />

<link rel="stylesheet" href="css/jquery-ui-1.9.0.custom.min.css" />
<link rel="stylesheet" href="css/myCSS.css" />

</head>

<body>
<a href="LogOut.php" id="logOut">[LOGOUT]</a>
<br/><h1 id="logo2">My Hospital System</h1>

<br /><br />
<div class="tabbable tabs-left"  id="tbl">
	<ul class="nav nav-tabs" id="myTab">
		<li class="active"><a href="#records" data-toggle="tab">List of Admitted Patients</a></li>
		<li><a href="#dic" data-toggle="tab">List of Doctors Incharge</a></li>
	</ul>

<div class="tab-content">
<div class="tab-pane active" id="records">
<form class="navbar-search pull-right" >
	<input type="text" name="search" class="search-query" placeholder="Search" id="search" />
</form>

<form>
	<input type="hidden" name="id" />
	<input type="button" value="ADD PATIENTS" id="add_button" />
	
	<br /></br />
	<table id="record_table" cellspacing=0; border=1; class="table table-striped">
	<tr>
		<th class="forTheList">Id</th>
		<th class="forTheList">Firstname</th>
		<th class="forTheList">Lastname</th>
		<th class="forTheList">Middle-Initial</th>
		<th class="forTheList">Age</th>
		<th class="forTheList">Gender</th>
		<th class="forTheList">Address</th>
		<th class="forTheList">Department</th>
		<th class="forTheList">Date-Admitted</th>
		<th class="forTheList">Actions</th>
		
	</tr>
	</table>
</form>


</div><!--end tag for records-->

<div class="tab-pane" id="dic">
<form>
	
	<table id="doctors_table" border=1; cellspacing=0;>
	<tr>
		<th class="forTheDoc">Doctor's Name</th>
		<th class="forTheDoc">Room Assigned</th>
	</tr>
	</table>
	
</form>  
</div><!--dic-->
</div><!--tabs-->



<div id="forErrorDialog" title="...oppssss!" class="ui-dialog-titlebar-error">
<p><img src="images/warning.png" class="warning"/>Please filled up all the filleds!</p>
</div>

<div id="forSuccessAddDialog" title="Success!">
<p><img src="images/thumbs.icon" class="thumbs"/>Patient's Information successfully added !</p>
</div>


<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="closing2">x</button>
		<h3 id="myModalLabel">Patient's Information</h3>
	</div>
	<div class="modal-body">
	<form>
		
		<label for="firstname">Firstname</label>
		<input type="text" name="firstname" id="firstname" />
		
		<br />
		
		<label for="lastname">Lastname</label>
		<input type="text" name="lastname" id="lastname" />
		
		<br />
		
		<label for="middle_initial">Middle-Initial</label>
		<input type="text" name="middle_initial" id="middle_initial" />
		
		<br />
		
		<label for="age">Age</label>
		<input type="text" name="age" id="age" />
		
		<br />
		 
		<label for="gender">Gender</label>
		<input type="radio" name="gender" class="gender" value="male" ><img src="images/male.png"></input>
		<input type="radio" name="gender" class="gender" value="female" ><img src="images/female.png"></input>
		
		<br />
		  
		<label for="address">Address</label>
		<input type="text" name="address" id="address" />
		
		<br />
		<label for="department">Department</label>
		<select name="department">
			<option>----Select----</option>
			<option value="Pediatrics">Pediatrics</option>
			<option value="Maternity">Maternity</option>
			<option value="Geriatrics">Geriatrics</option>
			<option value="Psychiatrics">Psychiatrics</option>
			<option value="Cancer Ward">Cancer Ward</option>
			<option value="Medical Unit">Medical Unit</option>
			<option value="Surgical Unit">Surgical Unit</option>
			<option value="Obstretric and Gynecology Unit">Obstretric and Gynecology Unit</option>
			<option value="Neonatal Intensive Care Unit">Neonatal Intensive Care Unit</option>
			<option value="Neurology Unit">Neurology Unit</option>
			<option value="Urulogy Unit">Urulogy Unit</option>
		</select>
		
		<br />
		<label for="date">Date Admitted</label>
		<input type="date" name="date" id="date" />
		
		
		
		</form>
	</div><!--modal body-->
	
	<div class="alert" id="alert">
		<button type="button" class="close"  data-dismiss="alert">&times;</button>
		<strong>Oppps! </strong> You should fill-up all the fields.	
	</div><!--alert-->
	
	<div class="alert alert-success" id="forSuccess">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong>Well Done! </strong>	
	</div><!--alert alert-success-->
	
	
	<div class="modal-footer">
		<button class="btn" id="closing" data-dismiss="modal" aria-hidden="true">Close</button>
		<button class="btn btn-primary" id="saving">Save Changes</button>
		<button class="btn btn-primary" id="add">Add</button>
	</div><!--modal-footer-->

</div><!--myModal-->
</div><!--tababble tabs-left-->


<div id="forSuccessEditDialog" title="Success">
<p><img src="images/thumbs.icon" class="thumbs"/>Patient's Information Successfully Edited!</p>
</div>
<div id="forDeleteDialog" title="Delete?">
<p><img src="images/warning.png" class="warning"/>Are You Sure You Want To Delete Patient's Info?</p>
</div>
</body>
</html>
