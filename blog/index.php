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
</head>
<body>
	
		<header class="cf">
			<div class="heading">
				<h1>Commander-Clifford's Blog</h1>
			</div>
			<nav>
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="index.php?page=blog">Blog</a></li>
					<li><a href="index.php?page=links">Links</a></li>
				</ul>
			</nav>
		</header>
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
					default:
						include('content_home.php');
				}
			?>
		</main>
		<aside>
			<?php include('sidebar.php') ?>
		</aside>
		
		<footer>
			<p>footer fetish?</p>
		</footer>

	

</body>
</html>	