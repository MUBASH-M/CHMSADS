<?php
include('conn.php');
?>
<html>
<head>
<title>admin</title>
<link rel="stylesheet" type="text/css" href="adminstyle.css">
<link rel="stylesheet" type="text/css" href="style.cs">
<link rel="stylesheet" type="text/css" href="tab.css">
<meta name="viewport" content="width=device-width,initial-scale:1.0, user-scale:0"/>
</head>
<body>
	<div id="header">
		<div class="logo"><a herf="#">Admin<span>Source</span></a></div>
	</div>
	<a class="mobile"></a>
	<div id="container">
		<div class="sidebar">
			<ul id="nav">
			<li><a href="asd.php">Add & Search Doctor</a></li>
			<li><a href="#">Add Nurse</a></li>
			<li><a href="#">Duty Assinging</a></li>
			<li><a href="#">Attendance</a></li>
			<li><a href="#">Hospital Management</a></li>
			<li><a href="#">DASHBOARD</a></li>
			</ul>
		</div>
		<div class="content">
			<h1>Dashboard</h1>
			<p></p>
			
			<div id="box">
				<div class="box-top">Admin</div>
				<div class="box-panel">
						<div class="container">
							<h1>Add Doctor</h1>
							<form method="post">
								<div class="tbox">
								<input type="text" placeholder="name" name="name"value="">
								</div>
								<div class="tbox">
								<input type="text" placeholder="@mailid" name="mail"value="">
								</div>
								<div class="tbox">
								<input type="text" placeholder="department" name="department" value="">
								</div>
								<input class="btn" type="submit" name="add" value="ADD">
							</form>
						</div>
						<?php
							if(isset($_POST['add']))
							{
									$name=$_POST['name'];
									$dep=$_POST['department'];
									$mal=$_POST['mail'];
									$sql=("insert into doclog(docname,emid,department) values('$name','$mal','$dep')");
									if(mysqli_query($conn,$sql))
									{
										$msg="success";
									}
									else
									{
										$msg="Reenter correct password";
									}		
							}
						?>
				</div>
			</div>
			<div id="box">
				<div class="box-top">Admin</div>
				<div class="box-panel">
					<div class="container">
					<h1>Search Doctor</h1>
						<form method="post">
							<div class="tbox">
							<input type="text" placeholder="Sepcialisation" name="spe" value="">
							</div>
							<div class="tbox">
							<input type="text" placeholder="department" name="dep" value="">
							</div>
							<input class="btn" type="submit" name="sea" value="Search">
						</form>
					</div>
					<?php
						if(isset($_POST['sea']))
						{
							$specia=$_POST['spe'];
							$depart=$_POST['dep'];
							$query = ("SELECT docid,docname,dochospital FROM doclog where specialisation='$specia' and department='$depart' ");
							$rslt=mysqli_query($conn,$query);
							
							if ($rslt) {
								echo "<table><tr><th>DOCTOR ID</th>
								<th>DOCTOR NAME</th><th>DOCTOR Hospital</th>
								<th>CONFIRM</th></tr>";
								// output data of each row
								while($row =mysqli_fetch_array($rslt)) {
									echo "<tr><td>" . $row["docid"]. "</td><td>" . $row["docname"]. "</td>
									<td> " . $row["dochospital"]. "</td><td> ". "<input type='submit' name='send' value='CONFIRM'>". "</td></tr>";
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
						?>
				</div>
			</div>
		</div>
	</div>
</body>
</html>