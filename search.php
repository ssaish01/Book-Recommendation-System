<?php

$name=$_POST["book_name"];
if($name=='Norwegian Woods')
{
	header('location: norwegianwood.html');
}
else if($name=='Homo Deus')
{
	header('location: homodeus.html');
}
else if($name=='Slaughter House')
{
	header('location: slaughterhouse.html');
}
else if($name=='Kafka')
{
	header('location: kafka.html');
}
else if($name=='Harry Potter')
{
	header('location: harrypotter1.html');
}

?>