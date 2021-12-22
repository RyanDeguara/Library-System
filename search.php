<link rel="stylesheet" type="text/css" href="style4.css">
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
<?php
	$limit = 5;  
	require_once "ProjectConnectToHost.php";

	$query = $_GET['query']; 
	// gets value sent over search form
	

		$query = htmlspecialchars($query); 
		

		$sql = "SELECT * FROM books
			WHERE (`BookTitle` LIKE '%".$query."%') OR (`Author` LIKE '%".$query."%')" or die(mysql_error());
			
		$raw_result = $conn->query($sql);
	
	
		$total_rows = $raw_result->num_rows;
		$total_pages = ceil($total_rows/$limit);
		 if (!isset ($_GET['page']) ) {  

			$page_number = 1;  

		} else {  

			$page_number = $_GET['page'];  

		}    
		$initial_page = ($page_number-1) * $limit;  
		$getQuery = "SELECT * FROM books WHERE (`BookTitle` LIKE '%".$query."%') OR (`Author` LIKE '%".$query."%') LIMIT " .  $initial_page . ',' . $limit; 
		$result2 = $conn->query($getQuery);

		if ($result2->num_rows > 0) {
				echo "<table border='1'>
				<tr>
				<th>BookTitle</th>
				<th>Author</th>
				<th>Edition</th>
				<th>Year</th>
				<th>Category</th>
				<th>Reserved</th>
				<th>Reserve?</th>
				</tr>";

			while ($row = $result2->fetch_assoc()) {
				echo "<tr><td> ";
				echo (htmlentities($row['BookTitle']));
				echo "</td><td> ";
				echo (htmlentities($row['Author']));
				echo "</td><td> ";
				echo (htmlentities($row['Edition']));
				echo "</td><td> ";
				echo (htmlentities($row['Year']));
				echo "</td><td> ";
				echo (htmlentities($row['Categories']));
				echo "</td><td> ";
				echo (htmlentities($row['Rese']));
				echo "</td><td> ";
				echo('<a href="reserve.php?id='.htmlentities($row['ISBN']).'&bookid='.htmlentities($row['BookTitle']).'">Reserve</a>');
				echo "</td></tr>";

			}
			
		}
		else{ 
			echo "No results";
		}
		for($page_number = 1; $page_number<= $total_pages; $page_number++) {  
					echo '<a class="hrefs" href = "search.php?page=' . $page_number .'&query='.$query.'">' . "Page: ". $page_number . ' </a>';  

				}    
?>
<footer><p>Site by: Ryan Deguara &copy; 2021</p></footer>

