<?php
	include 'dao/baseDAO.php';
	
	class mySystemDAO extends baseDAO {
	
		function viewPatients(){
			$this->openConn();
			
			$stmt = $this->dbh->prepare("select * from patients order by firstname");
			$stmt->execute();
			
			$this->closeConn();
			
			while ($row = $stmt->fetch()){
				echo "<tr id=".$row[0]." class='highlight'> ";
				echo "<td>".$row[0]."</td>";
				echo "<td>".$row[1]."</td>";
				echo "<td>".$row[2]."</td>";
				echo "<td>".$row[3]."</td>";
				echo "<td>".$row[4]."</td>";
				echo "<td>".$row[5]."</td>";
				echo "<td>".$row[6]."</td>";
				echo "<td>".$row[7]."</td>";
				echo "<td>".$row[8]."</td>";
				echo "<td><center><img src='images/trash2.png' class='delete' onclick='patients_delete(".$row[0].")' />";
				echo "<img src='images/edit.png' class='edit' onclick='patients_edit(".$row[0].")' /></center></td>";
				echo "</tr>";
			}
			
		}
	
		function addPatients($firstname, $lastname, $middle_initial, $age, $gender, $address, $department, $date){
			$this->openConn();
			
			$sql = "INSERT INTO patients
				(firstname, lastname, middle_initial, age, gender, address, department, date)
				 VALUES
				(?, ?, ?, ?, ?, ?, ?, ?)";
			
			
			$stmt = $this->dbh->prepare($sql);
			$stmt->bindParam (1, $firstname);
			$stmt->bindParam (2, $lastname);
			$stmt->bindParam (3, $middle_initial);
			$stmt->bindParam (4, $age);
			$stmt->bindParam (5, $gender);
			$stmt->bindParam (6, $address);
			$stmt->bindParam (7, $department);
			$stmt->bindParam (8, $date);
			$stmt->execute();
			
			
			$id = $this->dbh->lastInsertId();
			
				
				echo "<tr id=".$id." class='highlight'>";
				echo "<td>".$id."</td>";
				echo "<td>".$firstname."</td>";
				echo "<td>".$lastname."</td>";
				echo "<td>".$middle_initial."</td>";
				echo "<td>".$age."</td>";
				echo "<td>".$gender."</td>";
				echo "<td>".$address."</td>";
				echo "<td>".$department."</td>";
				echo "<td>".$date."</td>";
				echo "<td><center><img src='images/trash2.png' class='delete' onclick='patients_delete(".$id.")' />";
				echo "<img src='images/edit.png' class='edit' onclick='patients_edit(".$id.")' /></center></td>";
				echo "</tr>";
				
			
			$this->closeConn();
		}
		
		function patients_delete($id){
			$this->openConn();
			
			$sql = "DELETE FROM patients WHERE id=?";
			
			$stmt = $this->dbh->prepare($sql);
			$stmt->bindParam (1, $id);
			$stmt->execute();
			
			$this->closeConn();	
		}
		function patients_edit($id){
			$this->openConn();
			
			$sql = "SELECT * FROM patients WHERE id=?";
			
			$stmt = $this->dbh->prepare($sql);
			$stmt->bindParam (1, $id);
			$stmt->execute();
			
			$records = $stmt->fetch();
			
			$patients = array("id"=>$records[0], "firstname"=>$records[1], "lastname"=>$records[2], "middle_initial"=>$records[3], "age"=>$records[4], "gender"=>$records[5], "address"=>$records[6], "department"=>$records[7], "date"=>$records[8]);
			$json_string = json_encode($patients);
			
			echo $json_string;
			
			$this->closeConn();
		}
		
		function patients_save($firstname, $lastname, $middle_initial, $age, $gender, $address,$department, $date, $id){
			$this->openConn();
			
			$sql = "UPDATE patients
				 SET firstname=?, lastname=?, middle_initial=?, age=?, gender=?, address=?, department=?, date=?
				 WHERE id=?";
			
			$stmt = $this->dbh->prepare($sql);
			$stmt->bindParam (1, $firstname);
			$stmt->bindParam (2, $lastname);
			$stmt->bindParam (3, $middle_initial);
			$stmt->bindParam (4, $age);
			$stmt->bindParam (5, $gender);
			$stmt->bindParam (6, $address);
			$stmt->bindParam (7, $department);
			$stmt->bindParam (8, $date);
			$stmt->bindParam (9, $id);
			$stmt->execute();
			
			$this->closeConn();
			
				echo "<td>".$id."</td>";
				echo "<td>".$firstname."</td>";
				echo "<td>".$lastname."</td>";
				echo "<td>".$middle_initial."</td>";
				echo "<td>".$age."</td>";
				echo "<td>".$gender."</td>";
				echo "<td>".$address."</td>";
				echo "<td>".$department."</td>";
				echo "<td>".$date."</td>";
				echo "<td><center><img src='images/trash2.png' class='delete' onclick='patients_delete(".$id.")' />";
				echo "<img src='images/edit.png' class='edit' onclick='patients_edit(".$id.")' /></center></td>";
			
		}
		function patients_search($lastname){
			$this->openConn();
			
			$sql = "SELECT * FROM patients WHERE lastname LIKE '".$lastname."%' ";
			
			$stmt = $this->dbh->prepare($sql);
			$stmt-> bindParam (1, $lastname);
			$stmt->execute();
			
			$this->closeConn();
					
					echo "<tr id='for_result'>
						<th class='forTheList'>Id</th>
						<th class='forTheList'>Firstname</th>
						<th class='forTheList'>Lastname</th>
						<th class='forTheList'>Middle-Initial</th>
						<th class='forTheList'>Age</th>
						<th class='forTheList'>Gender</th>
						<th class='forTheList'>Address</th>
						<th class='forTheList'>Department</th>
						<th class='forTheList'>Date-Admitted</th>
						<th class='forTheList'>Actions</th>
		
					</tr>";
					
			while ($row = $stmt->fetch()){
					
					echo "<tr id=".$row[0]." class=highlight>";
					echo "<td>".$row[0]."</td>";
					echo "<td>".$row[1]."</td>";
					echo "<td>".$row[2]."</td>";
					echo "<td>".$row[3]."</td>";
					echo "<td>".$row[4]."</td>";
					echo "<td>".$row[5]."</td>";
					echo "<td>".$row[6]."</td>";
					echo "<td>".$row[7]."</td>";
					echo "<td>".$row[8]."</td>";
					echo "<td><center><img src='images/trash2.png' class='delete' onclick='patients_delete(".$row[0].")' />";
					echo "<img src='images/edit.png' class='edit' onclick='patients_edit(".$row[0].")' /></center></td>";
					echo "</tr>";
			}
			

		}
		
		function viewDoc(){
			$this->openConn();
			
			$stmt = $this->dbh->prepare("SELECT * FROM doctors_in_charge");	
			$stmt->execute();
			$this->closeConn();
			
			while ($row = $stmt->fetch()){
				echo "<tr>";
				echo "<td class='forTheDoc'>".$row[1]."</td>";
				echo "<td class='forTheDoc'>".$row[2]."</td>";
				echo "</tr>";
			}
				
		}
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
?>
