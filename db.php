<?php

global $link;
if(!class_exists('Users')){
    class Users {
        private $options;
        private $algorithm = PASSWORD_DEFAULT;
        
        function __construct() {
            $this->options = array();
            $this->connect();
        }
        
        function connect() {   
            global $link;
            $link = mysqli_connect('localhost:3306', DB_USER, DB_PASS, DB_NAME);
            if (mysqli_connect_error()) {
                die("Database connection failed: " . mysqli_connect_error());
            }
        }
        
        /*function clean_string(){
            global $link;
            return mysqli_real_escape_string($link, $array);
        }*/
        
        /*function clean($array) {
            global $link;
            return array_map('mysqli_real_escape_string',array($link, $array));
        }*/
        
        function hash($password) {
            return md5($password);
        }
        
        /*function verify($password, $hash) {
            return password_verify( $password, $hash);
        }*/
        
        function insert($link, $table, $fields, $values) {
			global $link;
            $fields = implode(", ", $fields);
			$values = implode("', '", $values);
			$sql="INSERT INTO $table (UserID, $fields) VALUES ('', '$values')";
			if (!mysqli_query($link, $sql)) {
				die('Error: ' . mysqli_error($link));
			} else {
				return TRUE;
			}
		}
        
        
        function select($sql) {
			global $link;
            $results = mysqli_query($link, $sql);
			
			return $results;
		}
    }
}

$jdb = new Users;
?>