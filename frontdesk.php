<?php
include("conn.php");
?>
<html>
<head>
<title>user</title>
<link rel="stylesheet" type="text/css" href="tab.css">
<link rel="stylesheet" type="text/css" href="rstyle.css">
<meta name="viewport" content="width=device-width,initial-scale:1.0, user-scale:0"/>
</head>
<body>
	<div id="header">
		<div class="logo"><a herf="#">Front<span>Desk</span></a></div>
	</div>
	<a class="mobile"></a>
	<div id="container">
		<div class="sidebar">
			<ul id="nav">
			<li><a href="asd.php">New Patient Appointment</a></li>
			<li><a href="#">Patient Appointment</a></li>
			<li><a href="#">Check Doctors Availability</a></li>
			<li><a href="#">Attendance</a></li>
			<li><a href="#">Appointment Cancellation</a></li>
			<li><a href="#"></a></li>
			</ul>
		</div>
		<div class="content">
			<h1>WELCOME</h1>
			<p></p>
			
			<div id="box">
				<div class="box-top">Register Please</div>
				<div class="box-panel">
					<div class="simple-form">
						<form method="post">
						<input type="text" name="name" id="button" placeholder="enter patient name"><br><br>
						<input type="text" name="age" id="button" placeholder="enter patient age"><br><br>
						<input type="text" name="docid" id="button" placeholder="enter doc id"><br><br>
						<input type="text" name="place" id="button" placeholder="enter patient place"><br><br>
						<input type="date" name="date" id="button" placeholder="appointment date"><br><br>
						<input type="number" name="num" placeholder="enter patient mobile number" id="button"><br><br>
						<input type="radio" name="gender" value="male"id="rd">&nbsp;&nbsp;&nbsp;&nbsp;<span id="but">MALE</span>&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="radio" name="gender" value="female" id="rd">&nbsp;&nbsp;&nbsp;&nbsp;<span id="but">FEMALE</span><br></br>
						<input type="submit" name="reg" value="Confirm" id="butt">
						</form>
					</div>
				</div>
			</div>
			<div id="box">
				<div class="box-top">Confirm Registration</div>
				<div class="box-panel">
				<?php
					if(isset($_POST['reg']))
					{
						$name=$_POST['name'];
						$dep=$_POST['age'];
						$id=$_POST['docid'];
						$pla=$_POST['place'];
						$dat=$_POST['date'];
						$pho=$_POST['num'];
						$gen=$_POST['gender'];
						$sql=("insert into appo(pname,page,place,doctorid,dat,mobile,gender) values('$name','$dep','$id','$pla','$dat','$pho','$gen')");
						if(mysqli_query($conn,$sql))
						{
						}
							$msg="success";
							echo "success";
							$query = ("SELECT * FROM appo ");
							$rslt=mysqli_query($conn,$query);
							
							if ($rslt) {
								echo "<table><tr><th>Tocken No</th><th>Patient Name</th><th>Patient Age</th><th>Patient Place</th>
								<th>Doctor ID</th><th>Appointment Date</th><th>Patient Phone Number</th><th>Patient Gender</th><th>Confirm</th></tr>";
								// output data of each row
								while($row =mysqli_fetch_array($rslt)) {
									echo "<tr><td>" . $row["tocken"]. "</td><td>" . $row["pname"]. "</td><td> 
									" . $row["page"]. "</td><td>" . $row["doctorid"]. "</td><td>" . $row["place"]. "</td>
									<td>" . $row["dat"]. "</td><td>" . $row["mobile"]. "</td><td>" . $row["gender"]. "</td>
									<td> " . "<form method='post'><input type='submit' name='com' value='Confirm'></form>". "
									</td></tr>";
								}
								echo "</table>";
								} else {
								echo "0 results";
								}		
					}
					
				?>
				
					</div>
				</div>
			</div>
				</div>
			</div>
				
		</div>
	</div>
</body>
</html>