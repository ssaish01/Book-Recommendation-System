<?php
session_start();
$con = mysqli_connect('localhost:8889','root','root');
mysqli_select_db($con, 'book');
$name = $_POST["username"];
$pass = $_POST["password"];
$s = "select * from users where username = '$name'";
$result = mysqli_query($con, $s);
$num = mysqli_num_rows($result);
if($num == 1){
    echo "Username Already Taken";
}
else{
    $reg= "insert into users(username , password) values ('$name' , '$pass')";
    mysqli_query($con, $reg);
    header('location: login.html');
}


?>