<?php include('include/config.php');  ?>
<html>
	<head>
		<?php include('include/cFunction.php'); $cFN=new cFunction(); ?>
		<title>Admin Panel</title>
	</head>
	<body>
		<div style="padding-top:200px;">
			<center>
				<form action="./" method="POST" name="f1">
					<table width="350" height="200" cellspacing="0" cellpadding="5" border="2">
						<tr>
							<th colspan="2">USER LOGIN</th>
						</tr>
						<tr>
							<td>USERNAME *</td>
							<td><input type="text" name="username" id="username"></td>
						</tr>
						<tr>
							<td>PASSWORD *</td>
							<td><input type="password" name="password" id="password"></td>
						</tr>
						<tr>
							<td colspan="2">
								<center>
									<button type="submit" onClick="return validation();" name="submit" id="submit">Login</button>
									<button type="reset">Cancel</button>
									<br><br>
									<a href="user-add.php">Add New User</a>
							
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
if(isset($_POST['submit']))
{
	$uname=$_REQUEST['username'];
	$pass=md5($_REQUEST['password']);
	
	$query="select * from users where username='$uname' and password='$pass'";
	$result=mysqli_query($cDB,$query);
	
	if(@mysqli_num_rows($result)>0)
	{
		$row=mysqli_fetch_assoc($result);
		if($uname==$row['username'] && $pass==$row['password'])
		{
			$_SESSION['user_id']=$row['user_id'];
			$_SESSION['username']=$row['username'];
			
			header('location:dashboard.php');
		}
	}
	else
	{
		echo "<center>Incorrect Username / Password...</center>";
	}
}	
?>
<script>
	function validation()
	{
		var uname=document.f1.username.value;
		var pass=document.f1.password.value;
		
		if(uname.length=="" && pass.length=="")
		{
			alert("Enter Username and Password");
			return false;
		}
		else if(uname.length=="")
		{
			alert("Enter Username");
			return false;
		}
		else if(pass.length=="")
		{
			alert("Enter Password");
			return false;
		}	
	}
</script>