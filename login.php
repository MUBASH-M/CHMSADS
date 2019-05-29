<!DOCTYPE html>
<html>
	<?php
			include('conn.php');
			session_start();
	?>
	<head>
		<meta charset="utf-8">
		<title>LOGIN FORM</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body id="particles-js">
	<form method="POST">
		<div class="container">
		<h1>LOGIN</h1>
		<form action="index.html" method="post">
		<div class="tbox">
		<input type="text" placeholder="@username" name="username" value="">
		</div>
		<div class="tbox">
		<input type="password" placeholder="password" name="pass" value="">
		</div>
		<input class="btn" type="submit" name="LOGIN" value="LOGIN">
		</form>
		<a class="b1" href="#">FORGOT PASSWORD ?</a>
		</div>
	</form>
		<script type="text/javascript" src="js/particles.min.js"></script>
		<script type="text/javascript" src="js/app.js"></script>
	</body>
</html>

				<?php
					if(isset($_POST['LOGIN']))
					{
						$username=$_POST['username'];
						$passwd=$_POST['pass'];
						$_SESSION["name"]=$username;
						$query=("select * from doclog where emid='$username' and pass='$passwd'");
						$rslt=mysqli_query($conn,$query);
						if(mysqli_num_rows($rslt)==1)
						{
							header("location: user.php");
						}
						else
						{
							$error="error";
						}
					}
			
				?>