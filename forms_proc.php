<html>
<head>
	<title>Suggestions</title>
	<link rel="stylesheet" href="style3.css">
</head>	
<body>


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
$fictiontype=$_POST["fiction_type"];
$booktype=$_POST["book_type"];
$genre=$_POST["genre"];
$author=$_POST["author_name"];
$bookname=$_POST["book"];
$var=0;

$sql = "SELECT book_name FROM books WHERE author_name='{$author}' AND book_name!='{$bookname}'";

$result = $link->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    echo 'Other books of your favourite author -    '.$author;
    echo "<br><br><br><br><br>";

    while($row = $result->fetch_assoc()) {
    	++$var;
        echo  $var.".     ".$row["book_name"]."<br><br>";

    }
} else {
    echo "0 results";
}
echo "<br><br><br><br><br>";
$sql1 = "SELECT book_name,author_name FROM books WHERE genre='{$genre}'  AND author_name!='{$author}'";
$result = $link->query($sql1);
$var=0;
if ($result->num_rows > 0) {
    // output data of each row
    echo 'Similar books which you may like - ';
    echo "<br><br><br><br><br>";
    while($row = $result->fetch_assoc()) {
    	++$var;
        echo  $var.".     ".$row["book_name"]."    "."by    ".$row["author_name"]. "<br><br>";
    }
} else {
    echo "0 results";
}



?>

</body>
</html>


