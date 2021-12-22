<html>
    <head>
        <title>Library User Create</title>
		<link rel="stylesheet" type="text/css" href="style.css">
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
		
        <h2>Login</h2>
		<div class="login">
			<form id="login" action="login.php" method="post">
				<p>Username:
				<input type="text" name="username" id="Uname"></p>
				<p>Password:
				<input type="password" name="password" id="Pass"></p><p>
				<button type="submit" value = "Submit" name="submit" id="submit">Login</button>
			</form>
			<a id="res" href="ProjectCreateUser.php">Not Already a user?</a>
		</div>
    </body>
<footer><p>Site by: Ryan Deguara &copy; 2021</p></footer>
</html>
