<?php
	session_destroy();
	unset($_SESSION['user_id']);
	unset($_SESSION['username']);
	header('location:index.php');
?>