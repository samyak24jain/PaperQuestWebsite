<?php 
error_reporting(E_ALL & ~(E_NOTICE|E_DEPRECATED));
require_once('load.php');
?>

<?php include('checklogin.php'); ?>

<?php 

$file_results = $j->upload();

?>
<?php include('header.php'); ?>
        <?php 
            if($loggedin == false):
                $url = "http" . ((!empty($_SERVER['HTTPS'])) ? "s" : "") . "://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
                $redirect = str_replace('upload.php', 'login.php', $url);
                
                header("Location: $redirect?upload=false");   
                exit;
        ?>
        
        <?php 
            else : 
        ?>        
                <div id="container">
                    <div class="form">
                        <h2>UPLOAD</h2>
                        <form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
                            <input name='coursecode' type='text' maxlength="5" class="textfield" size="38" placeholder="Course code" required/><br/>
                            <select style="margin: 10px; border: 2px solid black; padding: 10px; font: 17px 'Slabo 27px', serif; border-radius: 5px; background: white;" name="branch" required>
                                <option value="">Branch</option>
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
                            <input type="text" maxlength="4" class="textfield" size="38" placeholder="Question Paper Year" name="year" required/><br/>
                            <select style="margin: 10px; border: 2px solid black; padding: 10px; font: 17px 'Slabo 27px', serif; border-radius: 5px; background: white;" name="exam" required>
                                <option value="">Exam type</option>
                                <option value="Q1">Quiz-1</option>
                                <option value="Q2">Quiz-2</option>
                                <option value="MS">Mid-Sem</option>
                                <option value="ES">End-Sem</option>
                            </select><br/>
                            <select style="margin: 10px; border: 2px solid black; padding: 10px; font: 17px 'Slabo 27px', serif; border-radius: 5px; background: white;" name="sem" required>
                                <option value="">Sem</option>
                                <option value="odd">Odd Sem</option>
                                <option value="even">Even Sem</option>
                            </select><br/>
                            <input class="button" type="submit" value="Upload" />
                            <input style="margin:10px; cursor:pointer; padding:10px;" type="file" name="file" value="Choose an image" /><br/>
                        </form>

                    </div>
                </div>
                <?php echo $file_results; ?>
        <?php 
            endif; 
        ?>

<?php include('footer.php'); ?>