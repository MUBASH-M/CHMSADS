<?php
include("conn.php");
session_start();
?>
<html>
<head>
<title>user</title>
<link rel="stylesheet" type="text/css" href="tab.css">
<meta name="viewport" content="width=device-width,initial-scale:1.0, user-scale:0"/>
</head>
<body>
	<div id="header">
		<div class="logo"><a href="user.php">Doctor<span>Source</span></a></div>
	</div>
	<a class="mobile"></a>
	<div id="container">
		<div class="sidebar">
			<ul id="nav">
			<li><a href="appointments.php">Appointments</a></li>
			<li><a href="patient.php">Patient Details</a></li>
			<li><a href="duty.php">Duty</a></li>
			<li><a href="attendance.php">Attendance</a></li>
			<li><a href="send.php">Send Details</a></li>
			<li><a href="urgent.php">Urgent Details</a></li>	
			</ul>
		</div>
		<div class="content">
			<h1><center>Port For Sending Details Of Patients To Other Hospitals</center></h1>
			<p></p>
			
			<div id="box">
				<div class="box-top">Collect Details Of Patient</div>
				<div class="box-panel" >
				<form method="post" action="#">
					<input type="text" placeholder="patient id" name="patientid">
					
					<input  class="btn" type="submit" name="collect" value="Collect Data">
				</form>
				</div>
			</div>
			<div id="box">
				<div class="box-top">Collected Details of Patient</div>
				<div class="box-panel">
				<?php
					$patientid="";	
					
					if(isset($_POST['collect']))
					{
						$patientid=$_POST['patientid'];
						$_SESSION["paid"]=$patientid;
						$query = ("SELECT pid, pname, page,Disease,pmdiagnose,pmedicines,pmedia,phospital,reason FROM spd where pid='$patientid'");
						$rslt=mysqli_query($conn,$query);
						
						if ($rslt) {
							echo "<table><tr><th>PATIENT ID</th>
							<th>PATINET NAME</th><th>AGE</th>
							<th>Disease</th><th>Medical Diaganose</th>
							<th>Given Medicines</th><th>X-Ray & Scans</th>
							<th>Previous Hospital</th><th>Reason</th></tr>";
							// output data of each row
							while($row =mysqli_fetch_array($rslt)) {
								echo "<tr><td>" . $row["pid"]. "</td><td>" . $row["pname"]. "</td>
								<td> " . $row["page"]. "</td><td>" . $row["Disease"]. "</td>
								<td>" . $row["pmdiagnose"]. "</td>
								<td> " . $row["pmedicines"]. 
								"</td><td>" . $row["pmedia"]. "</td>
								<td>" . $row["phospital"]. "</td>
								<td>" . $row["reason"]. "</td></tr>";
							}
							echo "</table>";
							echo "<form method='post'>";
							echo "<input type='submit' name='send' value='SEND'>";
							echo "</form>";
							} else {
							echo "0 results";
							}
					}
					else{
						$error="error";
					}
					if(isset($_POST['send']))
					{
							$patientid=$_SESSION["paid"];
							$sql=("INSERT INTO shift (SELECT * FROM spd where pid='$patientid')");
							if(mysqli_query($conn,$sql))
							{
								$msg="success";
								echo "success";
							}
							else
							{
								$msg="Error";
								echo "not success";
							}
					}								
				?>
				</div>
			</div>
				
		</div>
	</div>
</body>
</html>