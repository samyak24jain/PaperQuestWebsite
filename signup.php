<?php 
error_reporting(E_ALL & ~(E_NOTICE|E_DEPRECATED));
require_once('load.php');
?>

<?php 
include('checklogin.php');
$j->register('login.php');
?>

<?php include('header.php'); ?>

        <div id="container">
            <?php if($loggedin == true): ?>
            <div id="signup-msg" style="padding: 20px; width: 900px; text-align: center;">  
                    <p style="background: #A3FF75; width: 600px; margin: 0 auto; position: relative; top: 10px; border: 1px solid black; padding: 7px 10px;">You are already logged in as <?php echo $firstname . ' ' . $lastname; ?>.</p>
            </div>
            <?php else: ?>     
            <div class="form">
                
                    <h2>SIGN UP</h2>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="signupForm">
                            <input class="textfield" size="38" type="text" name="firstname" placeholder="First Name" required/><br/>
                            <input class="textfield" size="38" type="text" name="lastname" placeholder="Last Name" required/><br/>
                            <select style="margin: 10px; border: 2px solid black; padding: 10px; font: 17px 'Slabo 27px', serif; border-radius: 5px; background: white;" name="branch" required>
                                <option value="" disabled selected>Branch</option>
                                <option value="CH">Chemical Engineering</option>
                                <option value="CO">Computer Engineering</option>
                                <option value="CV">Civil Engineering</option>
                                <option value="EC">Electronics and Communication Engineering</option>
                                <option value="EE">Electrical and Electronics Engineering</option>
                                <option value="IT">Information Technology</option>
                                <option value="ME">Mechanical Engineering</option>
                                <option value="MN">Mining Engineering</option>
                                <option value="MT">Metallurgical and Materials Engineering</option>
                            </select><br/>
                            <select style="margin: 10px; border: 2px solid black; padding: 10px; font: 17px 'Slabo 27px', serif; border-radius: 5px; background: white;" name="year" required>
                                <option value="" disabled selected>Year</option>
                                <option value="first">First Year B.Tech</option>
                                <option value="second">Second Year B.Tech</option>
                                <option value="third">Third Year B.Tech</option>
                                <option value="fourth">Fourth Year B.Tech</option>
                            </select><br/>
                            <input class="textfield" size="38" type="password" name="code" placeholder="Code" required/><br/>
                            <input class="textfield" size="38" type="email" name="email" placeholder="E-mail" required/><br/>
                            <input class="textfield" size="38" type="password" id ="pass" name="password" placeholder="Password" required/><br/>
                            <input class="textfield" size="38" type="password" id="pass2" name="confirmpassword" placeholder="Confirm Password" required/><br/>
                            <p id="display" style="color:red; margin: 10px;"></p>
                            <input class="button" type="submit" name="submit" onclick="checkPassword(document.getElementById('pass').value,document.getElementById('pass2').value)"/>
                            <input class="button" type="button" onclick="resetForm()" value="Reset"/>
                </form>
                <?php endif; ?>
            </div>
        </div>

<?php include('footer.php'); ?>