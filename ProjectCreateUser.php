<html>
    <head>
        <title>Library User Create</title>
		<link rel="stylesheet" type="text/css" href="style2.css">
    </head>
	<header>
		<nav>
			<ul id="ul1">
				<li class = "li1"><a class = "a1" href="Assignment.php">Login</a></li>
				<li class = "li1"><a class = "a1" href="ProjectCreateUser.php">Registration</a></li>
			</ul>
		</nav>
	</header>
	<?php
		if(isset($_GET['Message'])){
			echo $_GET['Message'];
		}
	?>
    <body>
		
        <h2>Registration</h2>
		<div class="form1">
			<form id="form1" action="registration.php" method="post">
				<p>Username:
				<input type="text" name="username" id="Uname"></p>
				<p>Password:
				<input type="password" name="password" placeholder="Please enter your password (6 digits)" id="Pass"></p>
				<p>Re-Enter Password:
				<input type="password" name="password2" placeholder="Please enter your password (6 digits)" id="Pass2"></p>
				<p>First Name:
				<input type="text" name="first_name" id="first_name"></p>
				<p>Surname:
				<input type="text" name="last_name" id="last_name"></p>
				<p>Address Line 1:
				<input type="text" name="add1" id="add1"></p>
				<p>Address Line 2:
				<input type="text" name="add2" id="add2"></p>
				<p>City:
				<input type="text" name="city" id="city"></p>
				<p>Telephone:
				<input type="tel" name="teleph" placeholder="Please enter your Telephone number (10 digits)" id="tele"></p>
				<p>Mobile:
				<input type="tel" name="mobile" placeholder="Please enter your Mobile number (10 digits)" id="mobile"</p>
				<p><input type="submit" value="Add New" id="submit"/> </p>
			</form>
			<a id="res" href="Assignment.php">Already a user?</a>
		</div>
    </body>
	<footer><p>Site by: Ryan Deguara &copy; 2021</p></footer>

</html>
