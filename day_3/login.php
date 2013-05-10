<?php 
// the correct username password combo - database of UN & PWs
$correct_username = 'Beavis';
$correct_password = 'gimmenachos';

// if the form was submitted, try to log them in
if ($_POST['did_login']) {
	
	// extract user input values
	$username = $_POST['username'];
	$password = $_POST['password'];

	//compare user values with correct values, if match then log in
	if ( $username == $correct_username AND $password == $correct_password ) {
		$logged_in = 1;
		}else{
			$error = 1;
		}

}
 ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Log in to your account</title>
</head>

<body>

	<?php 
	// if not logged in - show the damn form
	if ( !$logged_in ) {
	 ?>

	<h1>Log In!</h1>

	<?php 
	//if an error triggered, show a message
	if ( $error ) {
	echo 'Wrong Dumbass!';}
	 ?>

	<form method="post" action="login.php">
		<label for="username">Usename:</label>
		<input type="text" name="username" id="username">
		<br />	
		<label for="password">Password:</label>
		<input type="password" name="password" id="password">
		<br />
		<input type="submit" value="Log In">
		<input type="hidden" name="did_login" value="1">
	</form>
<?php 
} //end - if not logged in
else{
	echo'Welcome! Your Nachos await you!';
}?>

</body>
</html>	