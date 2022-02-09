<?php
session_start();
include_once 'database.php';

            $id =$_GET['id'];
            $userCode = $_POST['userCode'];              
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $phoneNumber = $_POST['phoneNumber'];
            $password = $_POST['password'];

        $update = "UPDATE pupils SET userCode = '$userCode', firstName = '$firstName', lastName = '$lastName', phoneNumber = '$phoneNumber', password = '$password' WHERE userCode = '$id'";
        
        if (mysqli_query($conn, $update)) {
            $_SESSION['updatePupil'] = "Pupil details updated successfully";
            header("Location:home.php");        
         } 
         else {
            $_SESSION['updatePupil'] = "Failed to update pupil details, please try again.";
            header("Location:home.php");
         }

         mysqli_close($conn);
         
       
?>