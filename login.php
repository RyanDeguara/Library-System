<?php

require_once "ProjectConnectToHost.php";

if(isset($_POST["username"]) && isset($_POST["password"])) 
    {     

        $username = $_POST["username"]; 
		
		session_start();
		$_SESSION["username"] = $username;
		
        $password = $_POST["password"]; 

        $sql = "SELECT UserName, Password FROM users";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {

			while ($row = $result->fetch_assoc()) {
				if (htmlentities($row['UserName']) == $username)
				{
					$password2 = str_replace(' ', '', (htmlentities($row['Password'])));
					
					$username2 = $username;

					if ($password2 == $password)
					{
						header("Location: ProjectLogin.php");
						exit();
					}
					else
					{
						$Message = urlencode("Username or password incorrect");
						header("Location:Assignment.php?Message=".$Message);
					}
				}
				else
				{
					$Message = urlencode("Username or password incorrect");
					header("Location:Assignment.php?Message=".$Message);
				}
			}
		}
	}

?>
