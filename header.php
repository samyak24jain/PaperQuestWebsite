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
            
            <div id="logInfo">
                <?php if($loggedin == true): ?>
                <p id="logtext" style="color: black; font-weight: bold; margin: 10px;"><?php echo 'Hi ', $firstname, '!  ' ;?><a href="login.php?action=logout"><button class="button">Logout</button></a></p>
                <?php endif; ?>
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