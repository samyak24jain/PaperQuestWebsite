<?php 
error_reporting(E_ALL & ~(E_NOTICE|E_DEPRECATED));
require_once('load.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <title>NITK Question Bank</title>
        <link href='http://fonts.googleapis.com/css?family=Slabo+27px' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Indie+Flower' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Orbitron:400,900' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="style.css" />
    </head>
    <body>
        <div id="header">    
            <div id="title">
                <h1>Question Paper Forum</h1>
                <h2 id="tagline" style="width:450px;">NITK Surathkal</h2>
            </div>
        </div>
        <div id="navigation">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="download.php">Download</a></li>
                <li><a href="upload.php">Upload</a></li>
                <li><a href="#">Report</a></li>
                <li><a href="#">Contact Us</a></li>
                <li><a href="signup.php">Sign Up</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </div>
        <div style="position: relative; width: 960px; min-height: 200px; background: white; margin: 0 auto; clear: both; height:auto;">
            <div id="form" style="padding:30px;text-align: center;">
                <h2>FORGOT PASSWORD</h2>    
                <div style="margin: 0 auto;">
                    <form action="mail.php" method="POST">
                        <input class="textfield" type="text" name="email" placeholder="Enter Your E-mail ID">
                        <input class="button" type="submit" name="submit" value="Send"><br>
                    </form>
                </div>
            </div>
        </div>

<?php include('footer.php'); ?>