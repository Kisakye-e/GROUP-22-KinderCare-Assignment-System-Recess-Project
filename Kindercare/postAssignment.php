<?php
session_start();
include_once 'database.php';


if(isset($_POST['submit']))
{
     $teacherNumber=($_SESSION["teacherNumber"]);
     $assignment= $_POST['character'];
	 $startDate = $_POST['startD'];
     $startTime = $_POST['startT'];
     $endTime = $_POST['closeT'];
     $numberOfCharacters = count($assignment);
     $char = "";
     foreach($assignment as $character){
         $char .= $character;
     }

     $sql = "INSERT INTO submittedassignment(teacherNumber,assignment,startDate,startTime,endTime,numberOfCharacters)
	 VALUES ('$teacherNumber','$char','$startDate','$startTime','$endTime','$numberOfCharacters')";
	 if (mysqli_query($conn, $sql)) {
		$_SESSION['status'] = "Assignment submitted successfully";
        header("Location: assignments.php");
	 } 
     else {
        $_SESSION['status'] = "Failed to add assignment, please try again.";
        header("Location: assignments.php");
	 }
	 mysqli_close($conn);
    
}
?>