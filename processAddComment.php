<?php
session_start();
include_once 'database.php';

$id =$_GET['id'];

            $comment = $_REQUEST['comment']; 
            

        $update = "UPDATE attemptedassignment SET comment = '$comment' WHERE id = '$id'";
        
        if (mysqli_query($conn, $update)) {
            $_SESSION['addComment'] = "Comment added successfully";
            header("Location:grades.php");        
         } 
         else {
            $_SESSION['addComment'] = "Failed to add comment, please try again.";
            header("Location:grades.php");
         }

         mysqli_close($conn);
         
       
?>