<?php 
//open a new session or resume existing session
session_start();
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
			//use cookies and sessions to remember the user
		$_SESSION['logged_in'] = 1;
		setcookie( 'logged_in', 1, time() + 60 * 10 );
		}else{
			$error = 1;
		}

}

// if the user is trying to log out - unset and destroy the session and cookie
if ( $_GET['action'] == 'logout' ){
	unset($_SESSION['logged_in']);
	session_destroy();
	setcookie('logged_in', '', time() -60*60*24*365);
}


// if the user visits the page and the cookie is still valid - recreate the session variable
elseif ( $_COOKIE['logged_in'] == 1 ) {
	$_SESSION['logged_in'] = 1;
}

 ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Log in to your account</title>
<link rel="stylesheet" type="text/css" href="css.css">
<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,700,300,100' rel='stylesheet' type='text/css'>
</head>

<body>

	<?php 
	// if not logged in - show the damn form
	if ( !$_SESSION['logged_in']){
	 ?>
<div class="h1">
	<h1>Log In!</h1>
</div>
	<?php 
	//if an error triggered, show a message
	if ( $error ) {
	echo 'Wrong Dumbass! Get outta Here - NO Nachos for YOU!!';}
	 ?>

	<form method="post" action="login_cookie_session.php">
		<label class="username" for="username">Usename:</label>
		<input type="text" name="username" id="username" placeholder="Username">
		<br />	
		<label for="password">Password:</label>
		<input type="password" name="password" id="password" placeholder="Password">
		<br />
		<input type="submit" value="Log In" class="button">
		<input type="hidden" name="did_login" value="1">
	</form>
<?php 
} //end - if not logged in
else{ ?>
<div class="winner">
	<p>Welcome Beavis!</br> Here are your Nachos.</p>
	<p><a href="login_cookie_session.php?action=logout">Get Out</a></p>
</div>
<?php }?>

</body>
</html>	