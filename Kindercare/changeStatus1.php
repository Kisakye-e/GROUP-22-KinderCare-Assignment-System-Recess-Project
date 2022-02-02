<?php
include_once 'database.php';
session_start();

if(isset($_POST['change']))
{	 
		$userCode = $_POST["userCode"];
        $sql = "UPDATE pupils set requestStatus = 'NULL', activationStatus = true where userCode ='$userCode'";
	
            if (mysqli_query($conn, $sql)) {
                
                header("Location:home.php"); 
    
            }
            else {
            echo "Error: " . $sql . "
            " . mysqli_error($conn);
            }
}

