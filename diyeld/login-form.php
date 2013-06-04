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
	<p>Welcome <?php echo $username; ?></br> Here are your Nachos.</p>
	<p><a href="index.php?action=logout">Get Out</a></p><br />

</div>
<?php }?>