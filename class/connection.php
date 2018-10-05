<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "360school";

//Connection
$conn = mysqli_connect($host, $username, $password, $database);

//Test
function mres($conn,$data){
	return mysqli_escape_string($conn,rtrim($data));
}

?>