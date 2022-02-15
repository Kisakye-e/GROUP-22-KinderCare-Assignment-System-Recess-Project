<?php
session_start();
include_once 'database.php';

$id =$_GET['id'];        

        $delete = "DELETE FROM submittedassignment WHERE assignmentnumber = $id";
        
        if (mysqli_query($conn, $delete)) {
            $_SESSION['delete'] = "Assignment deleted successfully";
            header("Location:assignments.php");        
         } 
         else {
            $_SESSION['delete'] = "Failed to delete assignment, please try again.";
            header("Location:assignments.php");
         }

         mysqli_close($conn);
         
       
?>