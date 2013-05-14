<?php
//load our helper functions
include_once('functions.php'); 
//parse the form if submit 
if( $_POST['did_submit']):
	//extract user input data / sanitize
	$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
	$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
	$phone = filter_var($_POST['phone'], FILTER_SANITIZE_NUMBER_INT);
			//strip tags - 'allow certain tags'
	$message = strip_tags( trim( $_POST['message']), '<b><i><strong><em><p>' );
	$newsletter = $_POST['newsletter'];

	//validate
	$valid = true;

	//name is required, check for empty name
	if ( 0 == strlen($name) ) {
		$valid = false;
		$errors['name'] = 'Forgot your Name, Idiot!';
		}
	//email must be valid, not invalid!!
	if ( !filter_var($email, FILTER_VALIDATE_EMAIL ) ) {
		$valid = false;
		$errors['email'] = "That's not an E-Mail, Idiot!";
		}
	//check for message length, to long
		if ( strlen($message) > 250 ) {
		$valid = false;
		$errors['message'] = "I won't read that long message!";
		}


	if (1 == $newsletter): $newsletter = 'Yes!';
	else: $newsletter = 'No!';
	endif;

	//only send mail if form valid
	if (true==$valid):
		//get ready to send mail - setup mail() parameters
		$to = 'droffilcnoslen@yahoo.com';

		$subject = 'Conact WP310 today to win your prize!';

		$body = "Name: $name \n";
		$body .= "Email: $email \n";
		$body .= "Phone#: $phone \n\n";
		$body .= "Add to newsletter list? $newsletter \n\n";
		$body .= "Message: $message \n\n";	

		$header = "Reply-to: $email \r\n";
		$header .= "From: $name \r\n";

			//send it  /  "$did_send" will = 1 if mail sends - 0 if fail to send
		$did_send = mail($to, $subject, $body, $header);

			//handle success/failure user feedback
		if( $did_send ):
			$display_msg = "Thanks $name,<br /> now go away.";
		else:
		$display_msg = "Sorry $name,<br /> something is wrong with you,</br> now go away";

		endif;//did_send

	endif;//still valid

endif;//did_submit

?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Contact Form - Unsanitary</title><link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,700,300,100' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="contact-css.css">

	<style>
	input[type="text"],
	input[type="submit"],
	textarea{
		display: block;
	}
	</style>
</head>

	<body>
		<div class=wrapper>
			<header>
				<h1>Let's Talk</h1>
			</header>

			<main>
				<div class="contactme">
					<?php 
	//hide the form if it sent succesfully
					if(!$did_send): ?>
					<h1>Clifford Nelson</h1><?php endif; ?>
					<h1><?php 
					if ( isset($display_msg) ):
						echo $display_msg;
					endif;
					?></h1>


				</div>
				<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">

	<?php 
	//hide the form if it sent succesfully
	if(!$did_send): ?>

					<label for="name">Name:</label>
					<input type="text" name="name" id="name" value="<?php sticky_field($name);  ?>" />
					<?php display_error($errors, 'name'); ?>

					<label for="email">E-Mail:</label>
					<input type="text" name="email" id="email" value="<?php sticky_field($email);  ?>" />
					<?php display_error($errors, 'email'); ?>

					<label for="phone">Phone#:</label>
					<input type="text" name="phone" id="phone" value="<?php sticky_field($phone);  ?>" />


					<label for="message">Message:</label>
					<textarea name="message" id="message"><?php sticky_field($message);  ?></textarea>
					<?php display_error($errors, 'message'); ?>

					<input type="checkbox" name="newsletter" value="1" id="newsletter" <?php checked( 'Yes!', $newsletter ); ?> />
					<label>Send me stuff.</label>

					<input type="submit" value="Send Message">

					<input type="hidden" name="did_submit" value="1" />
				<?php endif; ?>

			</form>
		</main>
		<footer></footer>
	</div>
</body>
</html>	