
<h2>Your Dashboard</h2>

<section class="panel onehalf">
	<h3>Your Stats</h3>
	<ul>
		<li>You have <?php echo count_posts($db, $user_id); ?> published posts</li>
		<li>You have <?php echo count_posts($db, $user_id, 2); ?> post drafts</li>
		<li>You have <?php echo count_user_comments($db, $user_id); ?> approved comments</li>
		<li>You have <?php echo count_user_comments($db, $user_id, 2 ); ?> comments awaiting moderation</li>
	</ul>
</section>


<section class="panel onehalf">
<h3>Latest Comments</h3>
	<ul>
		<li>Comment!</li>
		<li>Comment!</li>
		<li>Comment!</li>
		<li>Comment!</li>
	</ul>
</section>