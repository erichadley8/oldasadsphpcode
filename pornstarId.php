<?php

$servername = "localhost";
$username = "gif";
$password = "Scbwd2blah123";
$database = "porngifs";

$conn = mysqli_connect($servername, $username, $password, $database);


for ($x = 1; $x<=1977;$x++){
	$random = rand(1,2000);
	$sql = "UPDATE gifs SET views=".$random." WHERE id=".$x;

	if(mysqli_query($conn, $sql)){
	    echo "Records inserted successfully.";
	} else{
	    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
	}

}
	

?>