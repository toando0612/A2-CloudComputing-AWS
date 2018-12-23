<?php
$con = mysqli_connect("s3618861-db.cavq78vobfpn.ap-southeast-1.rds.amazonaws.com","imhikarucat","12345abcde","db_a2_cloud");
//$con = mysqli_connect("localhost","root","root","db_a2_cloud");


mysqli_set_charset($con,"utf8");
// Check connection
	if (mysqli_connect_errno())
  	{
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  	}

?>