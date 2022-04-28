<?php include('include/config.php'); ?>
<html>
	<head>
		<?php
			if(!isset($_SESSION['user_id']))
			{
				header('location:logout');
			}
		?>
		<title>Admin Panel</title>
	</head>
	<body>
		<div>
			<center><br>
				Dashboard
				<br>
				<h2>Welcome <?php echo $_SESSION['username']; ?></h2><br>
				<br><br>
				<h2><a href="user-update.php">User Profile Update</a></h2>
				
				<h2><a href="blog-add.php">Add Blog</a></h2>
				<br><br>
				<h3><a href="logout.php">Logout</a></h3>
			</center>									
		</div>
	</body>
</html>