<link rel="stylesheet" type="text/css" href="style3.css">
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
<?php

	require_once "ProjectConnectToHost.php";
	
	session_start(); // this NEEDS TO BE AT THE TOP of the page before any output etc
	$username = $_SESSION["username"];
	
	$today = date("Y-m-d");  
	
	$query = $_GET['id']; 
	$query2 = $_GET['bookid']; 

	$sql = "SELECT * FROM books";
			
			$raw_result = $conn->query($sql);
			

		if ($raw_result->num_rows > 0) {

			while ($row = $raw_result->fetch_assoc()) {
			// $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
				if (htmlentities($row['ISBN']) == $query)
				{
					
					$sql = "INSERT INTO reservations VALUES ('$query', '$username', '$today');";
					$sql2 = "UPDATE books SET Rese = 'Y' WHERE ISBN = '$query'";
					if($conn->query($sql) === TRUE) {

						if($conn->query($sql2) === TRUE) {
							echo "Book Reserved";
						} else {
							echo "Book not Reserved";
						}
						
					} else {
						echo "Book Already Reserved";   
					}
					
				}

				// posts results gotten from database(title and text) you can also show id ($results['id'])
			}
			
		}
		else{ // if there is no matching rows do following
			echo "No results";
		}
?>
<footer><p>Site by: Ryan Deguara &copy; 2021</p></footer>
