<?php 
require_once "ProjectConnectToHost.php";
if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['password2']) && isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['add1']) && isset($_POST['add2']) && isset($_POST['city']) && isset($_POST['teleph']) && isset($_POST['mobile'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
	$password2 = $_POST['password2'];
    $first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
    $add1 = $_POST['add1'];
	$add2 = $_POST['add2'];
	$city = $_POST['city'];
	$teleph = $_POST['teleph'];
	$mobile = $_POST['mobile'];
	
	if (strlen($password) != 6 || strlen($mobile) != 10 || strlen($first_name) < 1 || strlen($last_name) < 1 || strlen($add1) < 1 || strlen($add2) < 1 || strlen($city) < 1 || strlen($teleph) < 1 || $password != $password2)
	{
		if (strlen($password) != 6)
		{
			$Message = urlencode("Password entered not 6 digits long");
			header("Location:ProjectCreateUser.php?Message=".$Message);
			die;
		}
		else if ($password != $password2)
		{
			$Message = urlencode("Password confirmation entered incorrectly");
			header("Location:ProjectCreateUser.php?Message=".$Message);
			die;
		}
		else if (strlen($mobile) != 10)
		{
			$Message = urlencode("Mobile number entered not 10 digits long");
			header("Location:ProjectCreateUser.php?Message=".$Message);
			die;
		}
		else
		{
			$Message = urlencode("Field not filled");
			header("Location:ProjectCreateUser.php?Message=".$Message);
			die;
		}
	}
	else{
		$sql = "INSERT INTO Users (`UserName`, `Password`, `FirstName`, `Surname`, `AddressLine1`, `AddressLine2`, `city`, `telephone`, `mobile`) VALUES ('$username', '$password ', '$first_name', '$last_name', '$add1', '$add2', '$city', $teleph, $mobile);";
		if($conn->query($sql) === TRUE) {
			$Message = urlencode("Account created successfully");
			header("Location:Assignment.php?Message=".$Message);
		}
		else{
			$Message = urlencode("Username or phone number is already taken or incorrectly entered");
			header("Location:ProjectCreateUser.php?Message=".$Message);
			die;
		}
	}
}
?>