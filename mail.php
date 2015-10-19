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
        <div style="position: relative; width: 960px; min-height: 200px; background: white; margin: 0 auto; clear: both; height:auto; text-align: center;">

        <?php
            /*$link = mysqli_connect("mysql.2freehosting.com", "u313819847_files", "Mythili4", "u313819847_load");*/
            $link = mysqli_connect("mysql.2freehosting.com", "u928567575_sam", "samyak24jain", "u928567575_sam");
            //$link = mysqli_connect("localhost", "root", "Mythili4", "demo");
            
            // Check connection
            if($link === false){
                echo "<div class='error'>";
                die("ERROR: Could not connect. " . mysqli_connect_error());
                echo "</div>";
            }
            $email = mysqli_real_escape_string($link, $_POST['email']);
            $query = mysqli_query($link, "SELECT Email FROM users WHERE Email='$email'");
            
            if ( mysqli_num_rows ( $query ) > 0 ){

                if(isset($_POST['email'])) {

                    $email_from = "samyakjainnitk@gmail.com";/*insert email here*/
                    $email_subject = "website html form submissions";
    
                    function died($error) {
                        // error sending
                        echo "We're sorry, but there's errors found with the form you submitted.<br /><br />";
                        echo $error."<br /><br />";
                        echo "Please go back and fix these errors.<br /><br />";
                        die();
                    }
                    if(!isset($_POST['email']) ) {
                        died('We are sorry, but there appears to be a problem with the form you submitted.');        
                    }
      
                    $email_to = $_POST['email']; // required
    
                    $error_message = "";
                    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
                    if(!preg_match($email_exp,$email_from)) {
                        $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
                    }
    
                    if(strlen($error_message) > 0) {
                        died($error_message);
                    }
  
                    //generating new password
                    $random = substr(md5(rand(99,999999)),2,8);
                    $result = mysqli_query($link,"SELECT * FROM users WHERE Email='" . $email . "'");
                    $row = mysqli_fetch_array($result);
                    mysqli_query($link,"UPDATE users SET Password = MD5('$random') WHERE Email='" . $email . "'");

                    $email_message = "Since you've forgotten your password it has been changed to - .\n\n".$random;
    
                    function clean_string($string) {
                        $bad = array("content-type","bcc:","to:","cc:","href");
                        return str_replace($bad,"",$string);
                    }
 
                    $email_message .= "This is a mail to: ".clean_string($email_to)."<br>";


                    $headers = 'From: '.$email_from."<br>".
                    'Reply-To: '.$email_from."\r\n" .
                    'X-Mailer: PHP/' . phpversion();
                    if(mail($email_to, $email_subject, $email_message, $headers)){
                        $result = mysqli_query($link,"SELECT * FROM users WHERE Email='" . $email . "'");
                        $row=mysqli_fetch_array($result);
                        $randomhash = md5($random);
                        mysqli_query($link,"UPDATE users SET Password ='" . $randomhash . "' WHERE Email='" . $email . "'");

                    }
                    ?>
    <!-- place your own success html below -->
    <p style="text-align:center;font-size:15px;">
        Thank you for contacting us. The mail has been sent. Please follow the procedure given in the mail. 
    </p>
    <?php
                }
            die();
            }
        else {
            echo "<div class='error'>";
            echo "This email id is not a registered email id. please verify it again!";
            echo "</div>";
        }
    ?>
        </div>
    </body>
</html>
