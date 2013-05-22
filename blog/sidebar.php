
	<?php 
	//set up query to get the titles and posts-ids of the last 10 posts
	$query_latest = "SELECT title, post_id
					FROM posts
					WHERE is_public = 1
					ORDER BY date DESC
					LIMIT 10";
	//run query and check for results
	if ($result_latest = $db->query($query_latest) ):
	 ?>
	<h2>Latest Posts</h2>
		<ul>
			<?php 
			//from the list of results, go thru each row 1 at a time
			while($row_latest = $result_latest->fetch_assoc()): ?>
				<li><a href="index.php?page=single&amp;post_id=<?php echo $row_latest['post_id']; ?>"><?php echo $row_latest['title']; ?></a></li>
			<?php endwhile; ?>
		</ul>
	<?php endif; ?>



		<?php 
	//set up query to get the titles and posts-ids of the last 10 posts
	$query_latest = "SELECT *
					FROM categories
					LIMIT 10";
	//run query and check for results
	if ($result_latest = $db->query($query_latest) ):
	 ?>
	<h2>Categories</h2>
		<ul>
			<?php 
			//from the list of results, go thru each row 1 at a time
			while($row_latest = $result_latest->fetch_assoc()): ?>
			<li><a href="#"><?php echo $row_latest['name']; ?></a></li>
			<?php endwhile; ?>
		</ul>
	<?php endif; ?>


		<?php 
	//set up query to get the titles and posts-ids of the last 10 posts
	$query_latest = "SELECT *
					FROM links
					LIMIT 10";
	//run query and check for results
	if ($result_latest = $db->query($query_latest) ):
	 ?>
	<h2>Links I like:</h2>
		<ul>
			<?php 
			//from the list of results, go thru each row 1 at a time
			while($row_latest = $result_latest->fetch_assoc()): ?>
			<li><a href="#"><?php echo $row_latest['title']; ?></a></li>
			<?php endwhile; ?>
		</ul>
	<?php endif; ?>
