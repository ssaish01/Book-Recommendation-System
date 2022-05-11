<?php
define('DB_SERVER', 'localhost:8889');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'book');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


$name = $_POST["username"];
$pass = $_POST["password"];
$s = "select * from users where username = '$name'";
$result = mysqli_query($link, $s);
$num = mysqli_num_rows($result);

if($num == 1){
	if($name =='admin')
    {
        header("location: crud.html");
    }
    else
    {
        header("location: home.html");
    }
	
}
else{
	header('location: signup.html');
}
?>