<?php
$host_name = "localhost";
$user_name = "root";
$pwd_name = "";
$dbname = "php_crud_db";

$db_conn  = new mysqli( $host_name, $user_name, $pwd_name, $dbname );
if($db_conn->connect_error){
	die("connection failed");
} else {
    echo "connection success";
}



