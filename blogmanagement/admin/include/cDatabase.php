<?php
	$host="localhost";
	$username="root";
	$password="";
	$db_name="blog_management";
	
	$cDB=mysqli_connect($host,$username,$password,$db_name);
	
	if(mysqli_connect_error())
	{
		echo "Connection Failed...".mysqli_connect_error();
	}
?>