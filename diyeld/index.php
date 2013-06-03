<!DOCTYPE html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>FreeRideSD</title>
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
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Trails</a></li>
                    <li><a href="#">Shops</a></li>
                    <li><a href="#">Gallery</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Members</a></li>                    
                </ul>
            </nav>
        </header>
    </div><!--end div class="header-container"-->


    <div class="masthead-container">
        <header class="clearfix wrapper">
            <h1><span>Get out there</span><br />
            and ride a trail that <br />
            that <span>you</span> helped build
            </h1>
            <p>DiYELD is a community of riders dedicated to building quality trails for evryone to ride safely</p>
            <ul>
                <li>Login</li>
                <li> | </li>
                <li>Register</li>
            </ul>
            <div class="button">Login</div>
        </header>
    </div><!--masthead container-->

    <div class="main-container">
        
        <?php 
                //logic to load the correct page contents.
                //URI will look like domain/index.php?page=something
                switch( $_GET['page'] ){
                    case 'trail':
                        include('content-trail.php');
                    break;
                    
                    default:
                        include('content-home.php');
                }
            ?>


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
