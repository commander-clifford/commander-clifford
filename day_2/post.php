<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>post Method Example</title>
</head>

<body>
	<form method="post" action="post.php">
		<label for="name">What is your Name</label>
		<input type="text" name="name" id="name" />
		
		<label for="breakfast">What did you eat for Breakfast?</label>
		<input type="text" name="breakfast" id="breakfast" />

		<input type="submit" value="Go!" />	
		<input type="hidden" name="did_submit" value="1" />	
	</form>	

	<?php 
	//only show the message if the form is submitted
	if( $_POST['did_submit'] == 1 ){
	/*
	echo 'Good Morning, ';
	echo $_POST['name']; 
	echo '. ';	
	echo $_POST['breakfast']; 
	echo ' sounds delicious.';

	...this one is the same as below...

	*/

	echo 'Good Morning, '.$_POST['name'].'. '.$_POST['breakfast'].' sounds delicious.';
	}
	?>

</body>
</html>	