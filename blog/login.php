<?php 
//open a new session or resume existing session
session_start();
require('db_connect.php');
include_once('functions.php');

//if the user is already logged in, push them to thier admin panel
if($_SESSION['logged_in']){
	header('Location:admin.php');
}


// if the form was submitted, try to log them in
if ($_POST['did_login']) {
	// extract user input values, then (sanitize)
	$username_orig = $_POST['username'];
	$password_orig = $_POST['password'];
	$username_clean = clean_input($_POST['username'], $db);
	$password_clean = clean_input($_POST['password'], $db);

	//apply a hash to the password
	$sha_password = sha1($password_clean);

	//check to see if minimum length met (validate)
	if (strlen($username_clean) >= 5 AND strlen($password_clean) >= 5 ) {

		//look for a user that matches in the database
		$query = "SELECT user_id
					FROM users 
					WHERE username = '$username_clean'
					AND password = '$sha_password'
					LIMIT 1 ";
		$result = $db->query($query);

	
	//if one record is found, log in
	if ( 1 == $result->num_rows ) {
		$row = $result->fetch_assoc();
			//use cookies and sessions to remember the user
		$_SESSION['logged_in'] = 1;
		setcookie( 'logged_in', 1, time() + 60 * 60 * 24 * 14);
		//Who is logged  in 
		$_SESSION['user_id'] = $row['user_id'];
		setcookie('user_id', $row['user_id'], time() + 60 * 60 * 24 * 14); 
		//direct logged in user to admin panel
		header( 'location:admin.php' );
		}else{
			$error = 1;
		}
	}else{
		//Username or pass too short
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

	<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
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
	<p><a href="login_cookie_session.php?action=logout">Get Out</a></p><br />
		<p><?php  echo $username_orig .'<br />'. $username_clean;?><p>

</div>
<?php }?>
 

</body>
</html>	