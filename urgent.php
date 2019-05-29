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
				<h1>Details of Shifted Patients</h1>
				<p></p>
				
				<div id="box">
					<div class="box-top">Today's</div>
					<div class="box-panel">
					<?php
						$query = ("SELECT pid,pname,page,Disease,pmdiagnose,pmedicines,pmedia,phospital,reason FROM shift");
					$rslt=mysqli_query($conn,$query);

					if ($rslt) {
						echo "<table><tr><th>PATIENT ID</th>
							<th>PATINET NAME</th><th>AGE</th>
							<th>Disease</th><th>Medical Diaganose</th>
							<th>Given Medicines</th><th>X-Ray & Scans</th>
							<th>Previous Hospital</th><th>Reason</th><th>Approve / Reject</th></tr>";
						// output data of each row
						while($row =mysqli_fetch_array($rslt)) {
							echo "<tr><td>" . $row["pid"]. "</td><td>" . $row["pname"]. "</td>
								<td> " . $row["page"]. "</td><td>" . $row["Disease"]. "</td>
								<td>" . $row["pmdiagnose"]. "</td>
								<td> " . $row["pmedicines"]. 
								"</td><td>" . $row["pmedia"]. "</td>
								<td>" . $row["phospital"]. "</td>
								<td>" . $row["reason"]. "</td><td></td></tr>";
						}
						echo "</table>";
						echo "<form method='post'>";
						echo "<input type='submit' name='act' value='Accept'>";
						echo "<input type='submit' name='rej' value='Reject'>";
						echo "</form>";
						} else {
						echo "0 results";	
						}
						if(isset($_POST['act']))
						{
							$sql=("INSERT INTO new SELECT * FROM shift");
							
							if(mysqli_query($conn,$sql))
							{
							}
								$q=("delete from shift");
								if(mysqli_query($conn,$q))
								{
									$msg="success";
								}	
								else{
									$msg="error";
								}
						}		
						if(isset($_POST['rej']))
						{
							$sql=("INSERT INTO reject SELECT * FROM shift");
							
							if(mysqli_query($conn,$sql))
							{
							}
								$q=("delete from shift");
								if(mysqli_query($conn,$q))
								{
									$msg="success";
								}	
								else{
									$msg="error";
								}
						}		
					?>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>