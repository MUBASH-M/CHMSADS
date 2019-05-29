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
			<li><a href="reject.php">Rejected Patient</a></li>
			</ul>
		</div>
		<div class="content">
			<h1><center>Rejected PATIENT</center></h1>
			<p></p>
			
			<div id="box">
				<div class="box-top">Rejection</div>
				<div class="box-panel">
				<?php
						$query = ("SELECT pid, pname, page,Disease,pmdiagnose,pmedicines,pmedia,phospital,reason FROM reject");
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
							echo "<input type='text' placeholder='enter hospital' name='hos' value=''>";
							echo "<input type='submit' name='re' value='RESEND'>";
							echo "</form>";
							} else {
							echo "0 results";
							}
							if(isset($_POST['re']))
							{
								$sql=("INSERT INTO shift SELECT * FROM reject");
								
								if(mysqli_query($conn,$sql))
								{
								}
									$q=("delete from reject");
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