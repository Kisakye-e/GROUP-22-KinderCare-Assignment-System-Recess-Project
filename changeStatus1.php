<?php
include_once 'database.php';
session_start();

if(isset($_POST['change']))
{	 
		$userCode = $_POST["userCode"];
        $sql = "UPDATE pupils set requestStatus = 'NULL', activationStatus = true where userCode ='$userCode'";
	
            if (mysqli_query($conn, $sql)) {
                $_SESSION['changeStatus1']="Pupil activated successfully";                
                header("Location:home.php");     
            }
            else {
                $_SESSION['changeStatus1']="Failed to activate pupil,please try again.";                
                header("Location:home.php"); 
            }
            mysqli_close($conn);
}

