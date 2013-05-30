<?php 
session_start();
require('db_connect.php');
include_once('functions.php');

//parse the form!
if( 1 == $_REQUEST['did_register'] ):
	//extract and clean all the data from the form
	$username = clean_input( $_REQUEST['username'], $db );
	$email = clean_input( $_REQUEST['email'], $db );
	$password = clean_input( $_REQUEST['password'], $db );
	$repassword = clean_input( $_REQUEST['repassword'], $db );
	$policy = clean_input( $_REQUEST['policy'], $db );

	//hashed version of the password
	$sha_password = sha1($password);

	//validate
	$valid = true;

	//make sure username is long enuf
	if(strlen($username) < 5 ):
		$valid = false;
		$msg = 'At least 5 characters Please<br>';
	else:
		// check for duplicate username
		$query_username = "SELECT username
							FROM users 
							WHERE username = '$username'
							LIMIT 1 ";
		$result_username = $db->query($query_username);
		//if one result found, username is taken
		if( $result_username->num_rows == 1 ):
			$valid = false;
			$msg .= 'That name is taken.<br>';
		endif;
	endif;

	//check for email pattern
	if(!filter_var( $email, FILTER_VALIDATE_EMAIL ) ):
		$valid = false;
		$msg .= 'Double check your E-Mail.<br>';
	else:
		//check for duplicate email
		$query_email = "SELECT email
						FROM users
						WHERE email = '$email'
						LIMIT 1";
		$result_email = $db->query($query_email);
		//if one record found, email is taken
		if( $result_email->num_rows == 1 ):
			$valid = false;
			$msg .= 'That email is taken.<br>';
		endif;
	endif;

	//is the password too short
	if (strlen($password) < 5): 
		$valid = false;
		$msg = 'At least 5 characters Please.<br>';
	endif;

	//matching passwords
	if ($password != $repassword):
		$valid = false;
		$msg .= 'The Passwords do NOT match.<br>';
	endif;

	//check policy box
	if( 1 != $policy ):
		$valid = false;
		$msg .= 'You must agree with my beliefs to become a member. <br>';
	endif;

	//if the form is still valid, add user
	if ( true == $valid ):
		$query_insert = "INSERT INTO users
						(username, password, email, join_date, is_admin)
						VALUES 
						( '$username','$sha_password','$email',now(),1 ) ";
		$result_insert = $db->query($query_insert);
		//check to make sure one row was added
		if(1 == $db->affected_rows): 
			//use cookies and sessions to remember the user
			$_SESSION['logged_in'] = 1;
			setcookie( 'logged_in', 1, time() + 60 * 10 );
			//direct logged in user to admin panel
			header( 'location:admin.php' );
		else:
			$msg .= 'Oops, Something is wrong.  My Bad.';
		endif;

	endif;
endif;


 ?>



<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="style.css">
<title>Sign Up for an Account</title>
</head>

<body>
	<h1>Sign Up!</h1>
	
	<?php 
	//error message reporting
	if(isset($msg)):
		echo $msg;
	endif;?>

	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

	<label for="username">Choose your Alias:</label>
	<input type="text" name="username" id="username" required="required" />

	<label for="email">Email:</label>
	<input type="email" name="email" id="email" required="required" />

	<label for="password">Password:</label>
	<input type="password" name="password" id="password" required="required" />

	<label for="repassword">Repeat Password:</label>
	<input type="password" name="repassword" id="repassword" required="required" />

	<input type="checkbox" name="policy" id="policy" value="1" required="required" />
	<label for="policy">I agree to the <a href="#">terms of service and privacy policy</a></label>

	<input type="submit" value="Sign Up!" />
	<input type="hidden" name="did_register" value="1" />


</body>
</html>	