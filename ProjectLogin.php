

<!DOCTYPE html>

<html>

<head>

    <title>LOGIN</title>

    <link rel="stylesheet" type="text/css" href="style3.css">
	

</head>
	<header>
		<nav>
			<ul id="ul1">
				<li class = "li1"><a class = "a1" href="Assignment.php">Login</a></li>
				<li class = "li1"><a class = "a1" href="ProjectCreateUser.php">Registration</a></li>
				<li class = "li1"><a class = "a1" href="ProjectLogin.php">Book Search</a></li>
				<li class = "li1"><a class = "a1" href="reserved.php">Reservations</a></li>
			</ul>
		</nav>
	</header>
<body>
	<h2>Search by Book Title/ Author</h2>
	<div class="form1">
		<form id="form1" action="search.php" method="GET">
			<p>Search for book/author:</p>
			<input type="text" name="query" id="input">
			<input type="submit" name="submit" value="Search" id="submit">
		</form>
		<form id="form1" action="search2.php" method="GET">
		  <p>Search by category:</p>
		  <select name="id" value="id">
			<option disabled selected>-- Select Category --</option>
			<?php
				include "ProjectConnectToHost.php";  // Using database connection file here

				$sql = "SELECT * FROM category";
				$result = $conn->query($sql); 

				if ($result->num_rows > 0) {

				while ($row = $result->fetch_assoc()) {
					
					echo "<option value='". $row['CategoryID'] ."'>" .$row['CategoryName'] ."</option>";  // displaying data in option menu
				}	
				}
			?>  
		  </select>
		  <input type="submit" name="submit" value="Search" id="submit">
		</form>
	
	
	</div>
	

</body>
<footer><p>Site by: Ryan Deguara &copy; 2021</p></footer>
</html>