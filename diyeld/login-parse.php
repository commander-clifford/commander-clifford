<?php 

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
		//header( 'location:admin.php' );
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