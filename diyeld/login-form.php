<?php 
	// if not logged in - show the damn form
	if ( !$_SESSION['logged_in']){
	 ?>

	<h2><a href="#">Log In!</a> | <a href="index.php?page=register">Register</a></h2>

	<?php 
	//if an error triggered, show a message
	if ( $error ) {
	echo 'Wrong Dumbass! Get outta Here!';}
	 ?>

	<form class="clearfix" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
		<label class="username" for="username">Usename:</label>
		<input type="text" name="username" id="username" placeholder="Username">
	
		<label for="password">Password:</label>
		<input type="password" name="password" id="password" placeholder="Password">

		<input type="submit" value="Log In" class="button">
		<input type="hidden" name="did_login" value="1">
	</form>
<?php 
} //end - if not logged in
else{ ?>
<div class="winner">
	<p>Welcome <?php echo $username; ?></br> Start YELLing</p>
	<p class="button"><a href="index.php?action=logout">Log Out</a></p><br />

</div>
<?php }?>