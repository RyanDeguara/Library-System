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
	<body>
<?php
	require_once "ProjectConnectToHost.php";

	$query = $_GET['id']; 
	
	$sql = "SELECT * FROM books";
			
		$raw_result = $conn->query($sql);
			

		if ($raw_result->num_rows > 0) {

			while ($row = $raw_result->fetch_assoc()) {
			// $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
				if (htmlentities($row['ISBN']) == $query && htmlentities($row['Rese']) == 'Y')
				{
					
					$sql2 = "UPDATE books SET Rese = 'N' WHERE ISBN = '$query'";
					$sql3 = "DELETE FROM reservations WHERE ISBN='$query'";

						if($conn->query($sql2) === TRUE) {
							if($conn->query($sql3) === TRUE) {
								echo "Book Reservation removed";
							}else {
								echo "Book still reserved";							
							}
						} else {
								echo "Book still reserved";   
						}
					

				// posts results gotten from database(title and text) you can also show id ($results['id'])
				}
			}
			
		}
		else{ // if there is no matching rows do following
			echo "No results";
		}

?>
</body>

<footer><p>Site by: Ryan Deguara &copy; 2021</p></footer>