<?php include('include/config.php');  ?>
<html>
	<head>
		<?php
			if(!isset($_SESSION['user_id']))
			{
				header('location:logout');
			}
			include('include/cFunction.php'); $cFN=new cFunction();
			$query=$cFN->getUserByUserID(@$_SESSION['user_id']);
			$result=mysqli_query($cDB,$query);
			$row=mysqli_fetch_array($result);
			?>
		<title>Admin Panel</title>
	</head>
	<body>
		<div style="padding-top:120px;">
			<center>
				<form action="user-update.php" method="POST" name="f1">
					<table width="500" height="300" cellspacing="0" cellpadding="5" border="2">
						<tr>
							<th colspan="2">USER UPDADTE</th>
						</tr>
						<tr>
							<td>USERNAME *</td>
							<td><input type="text" name="username" id="username" value="<?php echo $row['username']; ?>"></td>
						</tr>
						<tr>
							<td>PASSWORD</td>
							<td><input type="password" name="password" id="password"></td>
						</tr>
						<tr>
							<td>CONFIRM PASSWORD</td>
							<td><input type="password" name="confirm_password" id="confirm_password"></td>
						</tr>
						<tr>
							<td colspan="2">
								<center>
									<button type="submit" onClick="return validation();" name="save" id="save">Save</button>
									<input type="hidden" name="userid" value="<?php echo $_SESSION['user_id']; ?>">
									<button type="reset">Cancel</button>
									<br><br>
									<a href="dashboard.php">Dashboard</a>
									<a href="logout.php">Logout</a>									
								</center>
							</td>
						</tr>
					</table>
				</form>
			</center>
		</div>
	</body>
</html>
<?php
if(isset($_POST['save']))
{
	$pass=@$_REQUEST['password'];
	$cpass=@$_REQUEST['confirm_password'];
	
	if(!empty($pass) && !empty($cpass))
	{
		if($cpass==$pass)
		{
			$query="UPDATE `users` SET `username`='".$_POST['username']."' ,`password`='".md5($_POST['password'])."' WHERE user_id='".$_REQUEST['userid']."'";
			//echo $query;exit;
			$result=mysqli_query($cDB,$query);
			
			header('location:logout.php');
		}
	}
	else if($cpass!=$pass)
	{
		echo "<center style='color:red;'>Password and Confirm Password does not Same</center>";
	}
	else
	{
		$query="UPDATE `users` SET `username`='".$_POST['username']."' WHERE user_id='".$_REQUEST['userid']."'";
		$result=mysqli_query($cDB,$query);
		
		header('location:dashboard.php');
	}
}	
?>
<script>
	function validation()
	{
		var uname=document.f1.username.value;
		
		if(uname.length=="")
		{
			alert("Enter Username");
			return false;
		}
	
	}
</script>