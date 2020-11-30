<?php
session_start();
include_once 'dbConnection.php';
if (isset($_SESSION['username'])) {
	$username=$_SESSION[username];
    mysqli_query($con, "DELETE from online where username= '$username'");	
    session_destroy();
}
$ref = @$_GET['q'];
header("location:index.php");
?>