<?php require('db_connect.php'); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Comm-Cliff PHP BLOBG</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
	<div class="container">
		<header>
			<h1>Commander-Cliff's BloBg</h1>
		</header>
		<div class="wrapper">

		

		<main>

			<?php 
			//set up a query to gett the latest two posts that are public
			$query = 'SELECT title, body, date, category_id, post_id 
						FROM posts
						WHERE is_public = 1
						ORDER BY date DESC
						LIMIT 2';
			//run it and check to make sure the result contains posts
			if($result = $db->query($query)	):		
			 ?>

			<h2>Most Recent Blobs</h2>

				<?php 
					//loop thru the list of results
				while ($row = $result->fetch_assoc() ):
				 ?>

			<article class="posts">
				<h3><?php echo $row['title']; ?></h3>
				<div class="postmeta">Posted on <?php echo $row['date']; ?> | in the category NAME</div>
				<p><?php echo $row['body']; ?></p>
			</article>

				<?php 
				endwhile;
				 ?>



			<?php else: ?>
				<h2>No posts to show</h2>
			<?php endif; ?>
		</main>



		<aside>
			<?php include('sidebar.php') ?>
		</aside>

	

		</div><!-- end class="wrapper" -->
		
		<footer>
			<p>footer fetish?</p>
		</footer>

	</div><!--end div class="container" -->

</body>
</html>	