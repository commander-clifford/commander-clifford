<?php 
session_start();
require('db_connect.php');

//if user is not logged in, get them away from this page
if( 1 != $_SESSION['logged_in']){
	header('Location:login.php');
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Manage Your Blog</title>
</head>

<body>
	<h1>Protected Admin Panel</h1>
	<a href="login.php?action=logout">Log Out</a>
</body>
</html>	