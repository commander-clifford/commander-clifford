<section id="comment-form">
	<h3>Leave a Damn Comment:</h3>

	<?php 
	//error/success reporting
	if(isset($message)):
		echo '<div class="message">' .$message. '</div>';
	endif;
	 ?>

	<form method="post" action="#comment-form">
		<label for="name">Name:</label>
		<input type="text" name="name" id="name" required="required" placeholder="required"/> 
		
		<label for="email">eMail:  <span>(we might not sell your info to spammers)</span></label>
		<input type="email" name="email" id="email" required="required" placeholder="required"/>
		
		<label for="url">Website:</label>
		<input type="url" name="url" id="url"/>
		
		<label for="comment">Comment:</label>
		<textarea name="comment" id="comment" required="required" placeholder="required"></textarea>
		
		<input type="submit" value="Post Comment" />

		<input type="hidden" name="did_comment" value="1" />
	</form>



</section>
