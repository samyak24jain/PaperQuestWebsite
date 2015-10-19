<?php 
error_reporting(E_ALL & ~(E_NOTICE|E_DEPRECATED));
require_once('load.php');
?>

<?php

if($_GET['action'] == 'logout') {
   
    $loggedout = $j->logout();
}

$logged = $j->login('upload.php');
?>

<?php include('checklogin.php'); ?>


<?php include('header.php'); ?>

    <div id="container">     
        
        <div class="form" style="text-align: center;">
			<?php if ( $logged == 'invalid' ) : ?>
				<p style="background: #e49a9a; width: 600px; margin: 0 auto; position: relative; top: 10px; border: 1px solid #c05555; padding: 7px 10px;">
					The username password combination you entered is incorrect. Please try again.
				</p>
			<?php endif; ?>
			<?php if ( $_GET['reg'] == 'true' ) : ?>
				<p style="background: #fef1b5; width: 600px; margin: 0 auto; position: relative; top: 10px; border: 1px solid #eedc82; padding: 7px 10px;">
					Your registration was successful, please login below.
				</p>
			<?php endif; ?>
            <?php if ( $_GET['upload'] == 'false' ) : ?>
				<p style="background: #fef1b5; width: 600px; margin: 0 auto; position: relative; top: 10px; border: 1px solid #eedc82; padding: 7px 10px;">
					You need to login to upload a question paper.
				</p>
			<?php endif; ?>
			<?php if ( $_GET['action'] == 'logout' ) : ?>
				<?php if ( $loggedout == true ) : ?>
					<p style="background: #fef1b5; width: 600px; margin: 0 auto; position: relative; top: 10px; border: 1px solid #eedc82; padding: 7px 10px;">
						You have been successfully logged out.
					</p>
				<?php else: ?>
					<p style="background: #e49a9a; width: 600px; margin: 0 auto; position: relative; top: 10px; border: 1px solid #c05555; padding: 7px 10px;">
						There was a problem logging you out.
					</p>
				<?php endif; ?>
			<?php endif; ?>
            <?php if($loggedin == false): ?>
            <div id="loginform" style="width: 400px; height: 200px; padding:10px; position: relative; top: 10px; margin: 0 auto;">
                <h2>LOGIN</h2>
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" id="loginForm">
                    <input class="textfield" size="38" type="email" name="email" placeholder="Enter e-mail"/><br/>
                    <input class="textfield" size="38" type="password" name="password" placeholder="Enter password"/><br/>
                    <input class="button" type="submit" name="submit" value="Submit"/>
                    <input class="button" type="button" value="Reset" onClick="document.getElementById('loginForm').reset()"/>
                </form>
                <p>Not a member? <a href="signup.php">Register here.</a></p>
                <p><a href="forgot.php">Forgot Password?</a></p>
            </div>
            <?php else: ?>
            <p style="background: #A3FF75; width: 600px; margin: 0 auto; position: relative; top: 10px; border: 1px solid black; padding: 7px 10px;">You are already logged in as <?php echo $firstname . ' ' . $lastname; ?>.</p>
            <?php endif; ?>
        </div> 
        
    </div>

<?php include('footer.php'); ?>