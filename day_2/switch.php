<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Switch Navigation Example</title>
</head>

<body>
	<header>	
		<h1>Switch Example</h1>
		<nav> 
			<ul>
				<li><a href="switch.php">Home</a></li>
				<li><a href="switch.php?page=about">About</a></li>
				<li><a href="switch.php?page=contact">Contact</a></li>
			</ul>
		</nav>
	</header>
	<main>
		<?php
		//include aappropriate content based on link clicked
		switch ($_GET['page']) {
			case 'about':
				include('content-about.php');
				break;
			case 'contact':
				include('content-contact.php');
				break;
			default:
				include('content-home.php');
		}
		  ?>	
	</main>
	<footer>
		<p>&copy; 2013 Clifford Nelson</p>
	</footer>	
	
</body>
</html>	