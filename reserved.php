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
	<body id="tablebody">
		<?php
			$limit = 5;  
			require_once "ProjectConnectToHost.php";
			
			session_start(); // this NEEDS TO BE AT THE TOP of the page before any output etc
			$username = $_SESSION["username"];
			
			$sql3 = "SELECT * FROM reservations INNER JOIN books ON reservations.isbn=books.isbn";
			$raw_result3 = $conn->query($sql3);
			
			$total_rows = $raw_result3->num_rows;
			$total_pages = ceil($total_rows/$limit);
			 if (!isset ($_GET['page']) ) {  

				$page_number = 1;  

			} else {  

				$page_number = $_GET['page'];  

			}    
			$initial_page = ($page_number-1) * $limit;  
			$getQuery = "SELECT * FROM reservations INNER JOIN books ON reservations.isbn=books.isbn LIMIT " . $initial_page . ',' . $limit; 
			$result2 = $conn->query($getQuery);
			
			if ($result2->num_rows > 0) {
						echo "<table border='1'>
						<tr>
						<th>Book title</th>
						<th>Author</th>
						<th>Reserved</th>
						</tr>";
					
					while ($row3 = $result2->fetch_assoc()) {
						if (htmlentities($row3['Username']) == $username)
							{
							// $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
								echo "<tr><td> ";
								echo (htmlentities($row3['BookTitle']));
								echo "</td><td> ";
								echo (htmlentities($row3['Author']));
								echo "</td><td> ";
								echo('<a href="remove_reserve.php?id='.htmlentities($row3['ISBN']).'">Remove Reservation</a>');
								echo "</td></tr>";

								// posts results gotten from database(title and text) you can also show id ($results['id'])
							}
					}
					
				}
				else{ // if there is no matching rows do following
					echo "No results";
				}
				  for($page_number = 1; $page_number<= $total_pages; $page_number++) {  
					echo '<a class="hrefs" href = "reserved.php?page=' . $page_number . '">' . "Page: ". $page_number . ' </a>';  

				}    

		?>
	</body>

<footer><p>Site by: Ryan Deguara &copy; 2021</p></footer>