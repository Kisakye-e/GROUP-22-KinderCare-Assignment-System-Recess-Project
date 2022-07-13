<?php
$servername='fdb32.awardspace.net';
$username='4138731_kindercare';
$password='#hZVpv5BYymk-Ua';
$dbname = "
4138731_kindercare";
$conn=mysqli_connect($servername,$username,$password,"$dbname");
if(!$conn){
   die('Could not Connect My Sql:' .mysql_error());
}
?>
