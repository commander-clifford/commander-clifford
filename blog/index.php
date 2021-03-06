<?php require('db_connect.php');
include_once('functions.php');
 ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Comm-Cliff PHP BLOG</title>
<link rel="stylesheet" type="text/css" href="style.css">
<link href='http://fonts.googleapis.com/css?family=Special+Elite|Amatic+SC|Marvel:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
<link rel="alternate" type="application/rss+xml" title="RSS Feed of Blog Posts" href="rss.php"/>
</head>
<body>

	<div class="cf header">
		<header class="heading cf">
			<h1>Clifford's Blog</h1>
		</header>
		<nav class="cf">
			<ul class="cf">
				<li><a href="index.php">Home</a></li>
				<li><a href="index.php?page=blog">Blog</a></li>
				<li><a href="index.php?page=links">Links</a></li>
			</ul>
		</nav>
	</div>

	<div class="container cf">
		<div class="main-area cf">
			<main>
			<?php 
				//logic to load the correct page contents.
				//URI will look like domain/index.php?page=something
				switch( $_GET['page'] ){
					case 'links':
						include('content_links.php');
					break;
					case 'blog':
						include('content_blog.php');
					break;	
					case 'single':
						include('content-single.php');	
					break;
					case 'search':
						include('content-search.php');	
					break;
					default:
						include('content_home.php');
				}
			?>
		</main>
		<aside>
			<?php include('sidebar.php') ?>
		</aside>
	</div><!--end main area-->
		
	</div><!--end first container-->
		<footer>
			<p>footer fetish?</p>
		</footer>

	

</body>
</html>	