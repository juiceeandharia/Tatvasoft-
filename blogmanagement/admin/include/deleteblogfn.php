<?php
include('cDatabase.php');
$id = $_GET['id'];

$mquery = "delete from blog where blog_id='".$id."'";
$mres = mysqli_query($cDB, $mquery);
return $mres;
								
?>