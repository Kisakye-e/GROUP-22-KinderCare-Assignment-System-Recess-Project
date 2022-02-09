<?php
session_start();
include_once 'database.php';
if(isset($_POST['save']))
{	 
	 $userCode = $_POST['userCode'];
	 
	 $firstName = $_POST['firstName'];
	 $lastName = $_POST['lastName'];
     $phoneNumber = $_POST['phoneNumber'];
     $password = $_POST['password'];
	 $teacherNumber=($_SESSION["teacherNumber"]);
	
	 $sql = "INSERT INTO pupils (userCode,firstName,lastName,phoneNumber,password,teacherNumber)
	 VALUES ('$userCode','$firstName','$lastName','$phoneNumber','$password','$teacherNumber')";
	 if (mysqli_query($conn, $sql)) {
		$_SESSION['regstatus'] = "Pupil registered successfully";
        header("Location: home.php");

	 } 
	 else {
		$_SESSION['regstatus'] = "Failed to register pupil, please try again.";
        header("Location: home.php");
	 }
	 mysqli_close($conn);
}
?>