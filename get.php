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
			<li><a class="selected" href="#">Appointments</a></li>
			<li><a href="#">Patient Details</a></li>
			<li><a href="#">Duty</a></li>
			<li><a href="#">Attendance</a></li>
			<li><a href="send.php">Send Details</a></li>
			<li><a href="#"></a></li>
			</ul>
		</div>
		<div class="content">
			<h1><center>Port For Sending Details Of Patients To Other Hospitals</center></h1>
			<p></p>
			
			<div id="box">
				<div class="box-top">Collected Details of Patient</div>
				<div class="box-panel">
				<?php
						$query = ("SELECT pid, pname, page,Disease,pmdiagnose,pmedicines,pmedia,phospital,reason FROM new");
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
							} else {
							echo "0 results";
							}
				?>
				</div>
			</div>
				
		</div>
	</div>
</body>
</html>