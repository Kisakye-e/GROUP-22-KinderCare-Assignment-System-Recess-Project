<?php
include_once 'database.php';
session_start();

// if(isset($_POST['changeD']))
// {	 
// 		$userCode = $_POST["userCode"];
//         $sql = "UPDATE pupils set activationStatus = true where userCode ='$userCode'";
	
//             if (mysqli_query($conn, $sql)) {
                
//                 header("Location:home.php"); 
//             }
//             else {
//             echo "Error: " . $sql . "
//             " . mysqli_error($conn);
//             }
// }

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