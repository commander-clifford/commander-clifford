	<?php //create status vars - possible values are 'success' or 'error'
	$status = 'success';
	$message = 'Hello World';
	//Logic to control the message text based on the status
	if($status == 'success'){$message = 'You\'re Successfull';}
	else{$message = 'Sorry, but you suck!';} 
	?>
<!DOCTYPE>
<html>
<head>
	<style>
	.error {background-color: #F00;}
	.success {background-color: #0F0;}
	</style>
</head>
<body>
	<div class="<?php echo $status; ?>">
		<h2>
		<?php 
		//comment secret
		echo $message; ?>
		</h2>
	</div>
</body>
</html>