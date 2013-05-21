<?php
session_start();

	include 'dao/myUserDAO.php';
	
		$action = new myUserDAO();
			if(!isset($_SESSION['username'])){
				if(isset($_POST['username'])){
					$username = $_POST['username'];
					$password = $_POST['password'];
						if($action->login($username, $password)){
						
							$_SESSION['username'] = $action->getUser($username, $password);
							header('Location: admin.php');
						}
						$errMsg = "...oops! wrong username and/or password";
				}
			}else {
				header('Location: admin.php');
			}
?>


<!DOCTYPE html>
<html>
<title>Hospital System</title>
<link rel="shortcut icon" href="images/top.ico" />
<head>

<script src="js/jquery-1.8.2.min.js"></script>
<script src="js/mySystemJScript.js"></script>
<script src="js/jquery-ui.js" ></script>
<script src="bootstrap/js/bootstrap.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/myCSS.css" type="text/css"/>

<link rel="stylesheet" href="bootstrap/css/bootstrap.css" />
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" href="bootstrap/css/bootstrap.responsive.css" />
<link rel="stylesheet" href="bootstrap/css/bootstrap.responsive.min.css" />

</head>
<body>

<h1 id="logo">My Hospital System</h1>
<br /><br />

<div class="tababble tabs-left" id="tbl">

		<ul class="nav nav-tabs" id="myHomeTab">
			<li class="active"><a href="#home_content" id="home" data-toggle="tab"><i class="icon-home icon-black"></i>Home</a></li>
			<li><a href="#mssn_vssn_content" id="mssn_vssn" data-toggle="tab">Missions & Vissions</a></li>
			<li><a href="#events_content" id="events" data-toggle="tab">Events</a></li>
		</ul>
	
<div class="tab-content">

<div class="tab-pane active" id="home_content">
<button class="btn btn-primary" id="btn_Login">Login To Admin</button>
<h2>HOME</h2>

    <div id="myCarousel" class="carousel slide">
    <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <!-- Carousel items -->
    <div class="carousel-inner">
    <div class="active item"><img src="images/hospital.jpg" class="img"/></div>
    <div class="item"><img src="images/Hospital-Reviews.jpg" class="img"/></div>
    <div class="item"><img src="images/hospital2.jpg" class="img"/></div>
    </div>
    <!-- Carousel nav -->
    <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
    <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
    </div>


<p>
<h3>About Hospital</h3>
A <em>hospital</em> is a health care institution providing patient treatment by specialized staff and equipment.<br />
</p>Hospitals are usually funded by the public sector, by health organizations (for profit or nonprofit), health insurance companies, or charities, including direct charitable donations. Historically, hospitals were often founded and funded by religious orders or charitable individuals and leaders. Today, hospitals are largely staffed by professional physicians, surgeons, and nurses, whereas in the past, this work was usually performed by the founding religious orders or by volunteers. However, there are various Catholic religious orders, such as the Alexians and the Bon Secours Sisters, which still focus on hospital ministry today.<br />

</p>In accord with the original meaning of the word, hospitals were originally "places of hospitality", and this meaning is still preserved in the names of some institutions such as the Royal Hospital Chelsea, established in 1681 as a retirement and nursing home for veteran soldiers.
</p>

</p>
<p>
<h4>Etemology</h4>
During the Middle Ages hospitals served different functions to modern institutions, being almshouses for the poor, hostels for pilgrims, or hospital schools. The word hospital comes from the Latin hospes, signifying a stranger or foreigner, hence a guest. Another noun derived from this, hospitium came to signify hospitality, that is the relation between guest and shelterer, hospitality, friendliness, hospitable reception. By metonymy the Latin word then came to mean a guest-chamber, guest's lodging, an inn.[1] Hospes is thus the root for the English words host (where the p was dropped for convenience of pronunciation) hospitality, hospice, hostel and hotel. The latter modern word derives from Latin via the ancient French romance word hostel, which developed a silent s, which letter was eventually removed from the word, the loss of which is signified by a circumflex in the modern French word hôtel. The German word 'Spital' shares similar roots.

Grammar of the word differs slightly depending on the dialect. In the U.S., hospital usually requires an article; in Britain and elsewhere, the word normally is used without an article when it is the object of a preposition and when referring to a patient ("in/to the hospital" vs. "in/to hospital"); in Canada, both uses are found.[citation needed]
</p>
<h4>Types</h4>
<h5>* General</h5>
<p>
The best-known type of hospital is the general hospital, which is set up to deal with many kinds of disease and injury, and normally has an emergency department to deal with immediate and urgent threats to health. Larger cities may have several hospitals of varying sizes and facilities. Some hospitals, especially in the United States, have their own ambulance service.
</p>
<h5>* District</h5>
<p>
A district hospital typically is the major health care facility in its region, with large numbers of beds for intensive care and long-term care;
</p>
<h5>* Specialized</h5>
<p>
Types of specialized hospitals include trauma centers, rehabilitation hospitals, children's hospitals, seniors' (geriatric) hospitals, and hospitals for dealing with specific medical needs such as psychiatric problems (see psychiatric hospital), certain disease categories such as cardiac, oncology, or orthopedic problems, and so forth.

A hospital may be a single building or a number of buildings on a campus. Many hospitals with pre-twentieth-century origins began as one building and evolved into campuses. Some hospitals are affiliated with universities for medical research and the training of medical personnel such as physicians and nurses, often called teaching hospitals. Worldwide, most hospitals are run on a nonprofit basis by governments or charities. There are however a few exceptions, e.g. China, where government funding only constitutes 10% of income of hospitals.
</p>
<h5>* Teaching</h5>
<p>
A teaching hospital combines assistance to patients with teaching to medical students and nurses and often is linked to a medical school, nursing school or university.
</p>
<h5>* Clinics</h5>
<p>
The medical facility smaller than a hospital is generally called a clinic, and often is run by a government agency for health services or a private partnership of physicians (in nations where private practice is allowed). Clinics generally provide only outpatient services.
</p>
<h4>Departments</h4>
<p>
Hospitals vary widely in the services they offer and therefore, in the departments (or "wards") they have. Each is usually headed by a Chief Physician. They may have acute services such as an emergency department or specialist trauma centre, burn unit, surgery, or urgent care. These may then be backed up by more specialist units such as:<br /><br />

    *  Emergency department<br />
    *  Cardiology<br />
    *  Intensive care unit<br />
        --  Paediatric intensive care unit<br />
        --  Neonatal intensive care unit<br />
        --  Cardiovascular intensive care unit<br />
    *  Neurology<br />
    *  Oncology<br />
    *  Obstetrics and gynaecology<br /><br />

Some hospitals will have outpatient departments and some will have chronic treatment units such as behavioral health services, dentistry,<br /> dermatology, psychiatric ward, rehabilitation services, and physical therapy.<br /><br />

Common support units include a dispensary or pharmacy, pathology, and radiology, and on the non-medical side, there often are medical records departments, release of information departments, Information Management (IM)(aka IT or IS), Clinical Engineering (aka Biomed), Facilities Management, Plant Ops (aka Maintenance), Dining Services, and Security departments.
</p><br /><br /><br /><br /><br /><br /><br /><br />





<div id="user" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="ttle" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="closing2">x</button>
		<h3 id="ttle">Login</h3>
		<div class="modal-body">
			<form method="POST" >
				
				
				<input type="text" name="username" id="username" placeholder="input username"/><br />
				<input type="password" name="password" id="password" placeholder="input password"/>
	
				<br /><br />
	
				<button class="btn btn-primary" id="login_button">Log In</button>
				<br /><br />
	
				<div id="forErrMsg">
				<?php
					if(isset($errMsg)) echo $errMsg;
				?>
				</div>
			</form>
		</div>
		
		<div class="modal-footer">
			<button class="btn" id="closing" data-dismiss="modal" aria-hidden="true">Close</button>
			
		</div><!--end tag of .modal-footer-->
		
	</div><!--end tag of .modal-header-->
</div><!--end tag of #user-->

</div>

<div class="tab-pane" id="mssn_vssn_content">
<h2>Mission and Vission</h2>
</div><!--end tag of mssn_vssn_content-->

<div class="tab-pane" id="events_content">
<h2>Events</h2>
</div><!--end tag of events_content-->


</div><!--end tag of tab-content-->
</div><!--myHomeTab-->

</body>
</html>
