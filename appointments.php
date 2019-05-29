<?php
	include("conn.php");
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
				<h1>APPOINTMENTS</h1>
				<p></p>
				
				<div id="box">
					<div class="box-top">Today's Appointments</div>
					<div class="box-panel">
					<?php
						$date=date("Y-m-d");
						echo $date;
						$query = ("SELECT tocken, pname, page FROM appo where dat='$date'");
						$rslt=mysqli_query($conn,$query);
						if ($rslt) {
							echo "<table><tr><th>Tocken No</th><th>Patient Name</th><th>Patient Age</th><th>Confirm</th></tr>";
							// output data of each row
							while($row =mysqli_fetch_array($rslt)) {
								echo "<tr><td>" . $row["tocken"]. "</td><td>" . $row["pname"]. "</td><td> 
								" . $row["page"]. "</td>
								<td> " . "<form method='post'> <input type='submit' name='com' value='Confirm'> </form>". "
								</td></tr>";
							}
							echo "</table>";
							} else {
							echo "0 results";
							}
						if(isset($_POST['com']))
						{
							echo "12435";
							$sql=("INSERT (pname,page) INTO spd SELECT (pname,page) FROM appo");
							
							if(mysqli_query($conn,$sql))
							{
								echo "success";
							}
							else{
								echo "not";
							}
								
						}
					?>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>