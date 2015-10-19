<?php 
if(!class_exists('UsersDb')) {
    class UsersDb {
        
        function register($redirect) {
            global $jdb, $link;
            if(!empty($_POST)) {
                if($_POST['code'] == 'admin') {
                    //Check if E-Mail already exists.
                    require_once('db.php');
                    $qry = "SELECT * FROM users WHERE Email='" .$_POST['email']. "'";
                    $results = mysqli_query($link, $qry);
                    if(mysqli_num_rows($results)==0) { 
                        $current = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
                        $referrer = $_SERVER['HTTP_REFERER'];

                        if($referrer == $current) {

                            $table = 'users';
                            $fields = array('FirstName', 'LastName', 'Email', 'Password', 'Branch', 'Year');

                            $firstname = mysqli_real_escape_string($link, $_POST['firstname']);
                            $lastname = mysqli_real_escape_string($link, $_POST['lastname']);
                            $email = mysqli_real_escape_string($link, $_POST['email']);
                            $branch = mysqli_real_escape_string($link, $_POST['branch']);
                            $year = mysqli_real_escape_string($link, $_POST['year']);
                            $password = mysqli_real_escape_string($link, $_POST['password']);

                            $password = md5($password);

                            $values = array(
                                'firstname' => $firstname,
                                'lastname' => $lastname,
                                'email' => $email,
                                'password' => $password,
                                'branch' => $branch,
                                'year' => $year
                            );

                            $insert = $jdb->insert($link, $table, $fields, $values);

                            if($insert == TRUE) {
                                $url = "http" . ((!empty($_SERVER['HTTPS'])) ? "s" : "") . "://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
                                $redirect = str_replace('signup.php', $redirect, $url);

                                header("Location: $redirect?reg=true");
                                exit;
                            }       
                        }
                        else {
                            die('Your form submission did not come from the correct page.');
                        }
                    } else {
                        die('Entered email already exists! <br/><p><a href="forgot.php">Forgot Password?</a></p><br/>');
                        //echo "<br/><p><a href='forgot.php'>Forgot Password?</a></p><br/>";
                    }
                }
                else {
                    die('Your entered code is wrong.');
                }
            }
        }
        
        
        function login($redirect) {
            global $jdb;
            
            if(!empty($_POST)) {
                
                //$values = $jdb->clean($_POST);
                $values = $_POST;
                $subname = $values['email'];
                $subpass = $values['password'];
                
                $table = 'users';
                
                $sql = "SELECT * FROM $table WHERE Email = '" . $subname . "' AND Password = '" . md5($subpass) . "'";
                $results = $jdb->select($sql);
                
                if(!$results) {
                    die("Sorry, no such e-mail exists");
                }
                
                $results = mysqli_fetch_assoc( $results );
                
                $stopass = $results['Password'];
                $subpass = md5($subpass);
                
                if( $subpass == $stopass ){
                    
                    $authID = md5($subpass . $subname);
                    setcookie('nitkres[user]', $subname, 0, '/', '', '', true);
                    setcookie('nitkres[authID]', $authID, 0, '/', '', '', true);
                    
                    $url = "http" . ((!empty($_SERVER['HTTPS'])) ? "s" : "") . "://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
					$aredirect = str_replace('login.php', $redirect, $url);
                    
                    header("Location: $aredirect");
					exit;	
                } else {
                    return 'invalid';
                }
            } else {
                return 'empty';
            }
        }
        
        
        function logout() {
			 
            $idout = setcookie('nitkres[authID]', '', -3600, '/', '', '', true);
			$userout = setcookie('nitkres[user]', '', -3600, '/', '', '', true);
			
			if ( $idout == true && $userout == true ) {
				return true;
                
			} else {
				return false;
			}
		}
        
        
        function checkLogin() {
            global $jdb;
            
            $cookie = $_COOKIE['nitkres'];
            
            $user = $cookie['user'];
            $authID = $cookie['authID'];
            $results = false;
            if(!empty($cookie)) {
                
                $table = 'users';
                $sql = "SELECT * FROM $table WHERE Email = '" . $user . "'";
                $results = $jdb->select($sql);
                
                if(!$results) {
                    die("Sorry, you're not logged in!");
                }

                $results = mysqli_fetch_assoc($results);
                $stopass = $results['Password'];
                $stoname = $results['Email'];
                $stopass = md5($stopass . $stoname);
                
                if($stopass == $authID) {
                    $results = true;
                } else {
                    $results = false;
                }
            } 
            return $results;
        }
        
        
        function upload() {
            global $jdb;
            $file_results = "";
            
            $filename = strtolower($_FILES['file']['name']);
            $extension = explode( '.' , $filename );
            $extension = $extension[1];
            
            if($_FILES['file']['error']>0) {
                $file_results .= "No file uploaded.<br/>";
                $file_results .= "Error code: " . $_FILES['file']['error'] . "<br/>";
            } else {
                if($extension == 'jpeg' || $extension == 'jpg' || $extension == 'bmp' || $extension == 'gif' || $extension == 'png') {
                    $file_results .= 
                    "Uploaded file: " . $_FILES['file']['name'] . "<br/>" .
                    "Type: " . $_FILES['file']['type'] . "<br/>" .
                    "Size: " . $_FILES['file']['size'] . "<br/>" . 
                    "Temp file: " . $_FILES['file']['tmp_name'] . "<br/>";

                    /*$url = "http" . ((!empty($_SERVER['HTTPS'])) ? "s" : "") . "://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
                    $aredirect = str_replace('upload.php', 'files', $url);*/

                    $course_code = $_POST['coursecode'];
                    $year = $_POST['year'];
                    $exam_type = $_POST['exam'];
                    $sem = $_POST['sem'];
                    $branch = $_POST['branch'];
                    $name = $year . "_" . $course_code . "_" . $exam_type . "_" . $sem . '.' . $extension;
                    $address = "files/" . $_POST['branch'] . "/" . $name;

                    $table = 'papers';
                    $fields = array('filename','course_code','branch','year','exam_type','sem','address');
                    $values = array($name, $course_code, $branch, $year, $exam_type, $sem, $address);

                    $insert = $jdb->insert($link, $table, $fields, $values);

                    move_uploaded_file( $_FILES['file']['tmp_name'], $address);

                    $file_results .= "File Upload Successful! <br/>";
                } else {
                    static $count = 0;
                    $count++;
                    if(count>1){
                        $file_results .= "Invalid extension. Only jpg,jpeg,bmp,gif,png allowed!<br />";
                    }
                }
            }
            return $file_results;
        }

            
    }
}
$j = new UsersDb;
?>