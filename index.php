<!DOCTYPE html>
<html>
    <head>
        <title>QP</title>
        <link href='http://fonts.googleapis.com/css?family=Indie+Flower' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Orbitron' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
        <style>
        body{
            background-image: url("background.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            text-align: center;
        }
        .main{
            background-color: #CC0000;
            border-radius:70px;
            color:white;
            max-height:150px;
        }
        
        h1 {
            font-size: 75px;
            font-family: 'Kaushan Script', cursive;
        }
        
            .title {
                color:white;
                font-family: 'Orbitron', sans-serif;  
            }
            
            #nitk{
                position:relative;
                bottom: 73px;
                left: 255px;
            }
            
        .navigate{
                padding: 18px;
                font-size: 30px;
        }
        a {
            background-color:rgba(0,0,0,0.8); 
        }
        a:link    {color:#FFA500; border-radius: 10px; font-family: 'Orbitron', sans-serif; text-decoration:none}
        a:visited {color:#FFA500; border-radius: 10px; font-family: 'Orbitron', sans-serif; text-decoration:none}
        a:hover   {color:#CC0000; border-radius: 10px; font-family: 'Orbitron', sans-serif; text-decoration:underline}
        a:active  {color:#CC0000; border-radius: 10px; font-family: 'Orbitron', sans-serif; text-decoration:underline}
        
        .message {
            background-color: white;
            color: white;
            font-size: 25px;
        }
        #contact {
             border-radius: 30px;
             color: #8FBC8F;
             background-color:rgba(0,0,0,0.8);
             width:800px;
        }
            @media (max-width: 450px) {
            h1 {
                font-size: 50px;
                margin-top: 20px;
                line-height: 40px;
            }
            h2 {
                font-size: 20px;
                margin: 20px 0 30px 0;
            }
            div {
                margin: 20px 12px 0 12px;
            }
            body{
                background-image: url("background.jpg");
                background-size: cover;
                background-repeat: no-repeat;
                text-align: center;
            }
            p {
                font-size: 20px;
                line-height: 24px;
            }
        }
        </style>
    </head>
    <body>
        <div class="main">
            <h1>Question Paper Forum</h1>
            <h2 id="nitk" class="title">NITK Surathkal</h2>
        </div>
        <h2 class="title">WELCOME!</h2>
       
        <div class="navigate">
            <a href="download.php">Download</a>
            <a href="upload.php">Upload</a>
            <a href="#report">Report</a>
            <a href="#contact">Contact Us</a>
            <a href="signup.php">Sign Up</a>
            <a href="login.php">Login</a>
        </div>
        <?php
          if(isset($_GET['Message'])){
          echo "<div class='message'>";
                echo "<h3>".$_GET['Message']."</h3>";
            }
          echo "</div>";
        ?>
        <div align="center">
            <div id="contact">
                <h2>About Us</h2>
                <p>Purpose of making such a website. <br> Instructions to upload and report.</p>
                <br>
            </div>
        </div>
        
        <div align="center">
            <div id="contact">
                <h3>Contact Details</h3>
                <p>For further queries and suggestions contact the following:<br>
                    Name : email-id or phone number.
                    <br>
                </p>
            </div>
        </div>
        
    </body>
</html>
