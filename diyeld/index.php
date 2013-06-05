<?php 
session_start();
require('db-connect.php');
include_once('functions.php');
include('login-parse.php');
include('register-parse.php');

//get all info about logged in user
if( $_SESSION['logged_in'] ):
    $user_id = $_SESSION['user_id'];
    $query_user = "SELECT * FROM users WHERE user_id = $user_id";
    $result_user = $db->query($query_user);
    $row_user = $result_user->fetch_assoc();
    //handy variables we can use anywhere in our admin panel
    $username = $row_user['username'];
    $user_pic = $row_user['avatar_link'];
endif;
?>
<!DOCTYPE html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Di-Yeld</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">

    <link rel="stylesheet" href="css/normalize.min.css">
    <link rel="stylesheet" href="css/main.css">

    <script src="js/vendor/modernizr-2.6.2.min.js"></script>
</head>
<body class="home">
    <div class="header-container">
        <header class="clearfix wrapper">
            <h1>DiYeld</h1>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="index.php?page=trails">Trails</a></li>
                    <li><a href="index.php?page=shops">Shops</a></li>
                    <li><a href="index.php?page=gallery">Gallery</a></li>
                    <li><a href="index.php?page=about">About</a></li>
                    <li><a href="index.php?page=members">Members</a></li>                    
                </ul>
            </nav>
        </header>
    </div><!--end div class="header-container"-->


    <div class="masthead-container">
        <header class="clearfix wrapper">
            <h1>Where Mountain Bikers Yell<br> about the Trails They Ride</h1> 
            <div class="login-form quarter" ><?php include('login-form.php') ?></div>
        </header>
    </div><!--masthead container-->

    <div class="main-container">
        <div class="wrapper clearfix gradi">
        <?php include('breadcrumb.php'); ?>
        <?php 
            //logic to load the correct page contents.
            //URI will look like domain/index.php?page=something
            switch( $_GET['page'] ){
                case 'trails':
                    include('content-trails.php');
                break;
                case 'gallery':
                    include('content-gallery.php');
                break;
                case 'shops':
                    include('content-shops.php');
                break;
                case 'register':
                    include('content-register-form.php');
                break;
                case 'search':
                    include('content-search.php');  
                break;
                case 'about':
                    include('content-about.php');  
                break;
                case 'terms':
                    include('content-terms.php');  
                break;
                default:
                    include('content-home.php');
            }
        ?>

        </div>
    </div><!--main-container-->

    <div class="recent-posts-container">
        <div class="wrapper clearfix">
            <figure>
                <h5>Trail Name</h5>
                <p>Comments on this trail</p>
            </figure>
             <figure>
                <h5>Trail Name</h5>
                <p>Comments on this trail</p>
            </figure>
             <figure>
                <h5>Trail Name</h5>
                <p>Comments on this trail</p>
            </figure>
             <figure>
                <h5>Trail Name</h5>
                <p>Comments on this trail</p>
            </figure>
             <figure>
                <h5>Trail Name</h5>
                <p>Comments on this trail</p>
            </figure>
        </div>
    </div>
    
    <div class="recent-pics-container">
        <div class="wrapper clearfix">
            <figure>
                <img src="#" alt="pic">
                <p>Comments on this trail</p>
            </figure>
             <figure>
                <img src="#" alt="pic">
                <p>Comments on this trail</p>
            </figure>
             <figure>
                <img src="#" alt="pic">
                <p>Comments on this trail</p>
            </figure>
             <figure>
                <img src="#" alt="pic">
                <p>Comments on this trail</p>
            </figure>
             <figure>
                <img src="#" alt="pic">
                <p>Comments on this trail</p>
            </figure>
        </div>
    </div>


    <div class="footer-container">
        <div class="wrapper clearfix">
                <nav>
                    <ul>
                        <li><a href="rss.php">Subscribe to RSS Feed</a></li>
                        <li> | </li>
                        <li><a href="#">Home</a></li>
                        <li> | </li>
                        <li><a href="#">Trails</a></li>
                        <li> | </li>
                        <li><a href="#">Shops</a></li>
                        <li> | </li>
                        <li><a href="#">Gallery</a></li>
                        <li> | </li>
                        <li><a href="#">About</a></li>
                        <li> | </li>
                        <li><a href="#">Members</a></li>
                    </ul>
                </nav>
        </div>
    </div>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>

    <script src="js/main.js"></script>
</body>
</html>
