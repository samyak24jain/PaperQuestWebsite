<?php
$loggedin = $j->checkLogin();

if($loggedin == true) {
    $cookie = $_COOKIE['nitkres'];
    $user = $cookie['user'];
    $table = 'users';
    $sql = "SELECT * FROM $table WHERE Email = '" . $user . "'";
    $results = $jdb->select($sql);
    
    $results = mysqli_fetch_assoc($results);
    $firstname = $results['FirstName'];
    $lastname = $results['LastName'];
}
?>