<?php
session_start();
include_once 'database.php';
if(isset ($_POST['Update'])){

    $id =$_POST['id'];
    $startDate = $_POST['startDate']; 
    $startTime = $_POST['startTime']; 
    $endTime = $_POST['endTime'];
    
$update = "UPDATE submittedassignment SET startDate = '$startDate',startTime= '$startTime', endTime = '$endTime' WHERE assignmentnumber = '$id'";

if (mysqli_query($conn, $update)) {
    $_SESSION['updateAssignment'] = "Assignment updated successfully";
    header("Location:assignments.php");        
 } 
 else {
    $_SESSION['updateAssignment'] = "Failed to update assignment, please try again.";
    header("Location:assignments.php");
 }

 mysqli_close($conn);
}        
       
?>