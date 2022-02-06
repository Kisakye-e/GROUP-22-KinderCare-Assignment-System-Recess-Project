<?php
session_start();
include_once 'database.php';
if(isset($_POST['save']))
{	 
	 $userCode = $_POST['userCode'];
	 $pupilNumber = $_POST['pupilNumber'];
	 $firstName = $_POST['firstName'];
	 $lastName = $_POST['lastName'];
     $phoneNumber = $_POST['phoneNumber'];
     $password = $_POST['password'];
	
	 $sql = "INSERT INTO pupils (userCode,pupilNumber,firstName,lastName,phoneNumber,password)
	 VALUES ('$userCode','$pupilNumber','$firstName','$lastName','$phoneNumber','$password')";
	 if (mysqli_query($conn, $sql)) {
		$_SESSION['regstatus'] = "Pupil registered successfully";
        header("Location: registerPupil.php");

	 } 
	 else {
		$_SESSION['regstatus'] = "Failed to register pupil, please try again.";
        header("Location: registerPupil.php");
	 }
	 mysqli_close($conn);
}
?>