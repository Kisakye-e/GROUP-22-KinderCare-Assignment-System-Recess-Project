<?php
include_once 'database.php';
session_start();

if(isset($_POST['changeA']))
{	 
		$userCode = $_POST["userCode"];
            $sql = "UPDATE pupils set activationStatus = false where userCode ='$userCode'";
	
            if (mysqli_query($conn, $sql)) {
                $_SESSION['changeStatus']="Pupil deactivated successfully";
                header("Location:home.php"); 
    
            }
            else {
                $_SESSION['changeStatus']="Failed to deactivate pupil,please try again.";
                header("Location:home.php"); 
            }
            mysqli_close($conn);
}
?>