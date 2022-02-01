<?php
include_once 'database.php';
if(isset($_POST['save']))
{	 
	 $userCode = $_POST['userCode'];
	 $firstName = $_POST['firstName'];
	 $lastName = $_POST['lastName'];
     $phoneNumber = $_POST['phoneNumber'];
     $password = $_POST['password'];
	
	 $sql = "INSERT INTO pupils (userCode,firstName,lastName,phoneNumber,password)
	 VALUES ('$userCode','$firstName','$lastName','$phoneNumber','$password')";
	 if (mysqli_query($conn, $sql)) {
		echo "Submitted for approval!";
		header("Location:home.php");

	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}
?>