<?php include_once 'layout.php';
include_once 'database.php';
session_start(); 

// Check if id is set or not if true toggle,
    // else simply go back to the page
    if (isset($_GET['userCode'])){
  
        // Store the value from get to a 
        // local variable "course_id"
        $data_id=$_GET['userCode'];
  
        // SQL query that sets the status
        // to 1 to indicate activation.
        $sql="UPDATE `pupils` SET 
             `activationStatus`=Activated WHERE userCode='$data_id'";
  
        // Execute the query
        mysqli_query($conn,$sql);
    }
  
    // Go back to course-page.php
    header('location: activationRequests.php');
?>