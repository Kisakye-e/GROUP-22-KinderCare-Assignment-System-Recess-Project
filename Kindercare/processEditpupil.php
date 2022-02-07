<?php
session_start();
include_once 'database.php';

$id =$_GET['id'];

            $userCode = $_REQUEST['userCode']; 
            $pupilNumber = $_REQUEST['pupilNumber']; 
            $firstName = $_REQUEST['firstName'];
            $lastName = $_REQUEST['lastName'];
            $phoneNumber = $_REQUEST['phoneNumber'];
            $password = $_REQUEST['password'];

        $update = "UPDATE pupils SET userCode = '$userCode',pupilNumber= '$pupilNumber', firstName = '$firstName', lastName = '$lastName', phoneNumber = '$phoneNumber', password = '$password' WHERE pupilNumber = '$id'";
        
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