<?php
include_once 'database.php';
session_start();

if(isset($_POST['change']))
{	 
		$userCode = $_POST["userCode"];
        $sql = "UPDATE pupils set activationStatus = true and where userCode ='$userCode'";
	
            if (mysqli_query($conn, $sql)) {
                
                // header("Location:activationRequests.php"); 
    
            }
            else {
            echo "Error: " . $sql . "
            " . mysqli_error($conn);
            }
}

