<?php include('include/config.php');  ?>
<html>
	<head>
		<?php include('include/cFunction.php'); $cFN=new cFunction(); ?>
		<title>Admin Panel</title>
	</head>
	<body>
		<div style="padding-top:120px;">
			<center>
				<form action="user-add.php" method="POST" name="f1">
					<table width="500" height="300" cellspacing="0" cellpadding="5" border="2">
						<tr>
							<th colspan="2">USER ADD</th>
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
							<td>CONFIRM PASSWORD *</td>
							<td><input type="password" name="confirm_password" id="confirm_password"></td>
						</tr>
						<tr>
							<td colspan="2">
								<center>
									<button type="submit" onClick="return validation();" name="save" id="save">Save</button>
									<button type="reset">Cancel</button>
												
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
	$pass=$_REQUEST['password'];
	$cpass=$_REQUEST['confirm_password'];
	
	if($cpass==$pass)
	{
		$query="INSERT INTO `users`(`username`, `password`, `status`, `date_added`) VALUES ('".$_POST['username']."','".md5($_POST['password'])."',1,'".date('Y-m-d H:i:s')."')";
		$result=mysqli_query($cDB,$query);
		
		header('location:index.php');
	}
	else
	{
		echo "<center style='color:red;'>Password and Confirm Password does not Same</center>";
	}
}	
?>
<script>
	function validation()
	{
		var uname=document.f1.username.value;
		var pass=document.f1.password.value;
		var cpass=document.f1.confirm_password.value;		
		
		if(uname.length=="")
		{
			alert("Enter Username");
			return false;
		}
		else if(pass.length=="")
		{
			alert("Enter Password");
			return false;
		}
		else if(cpass.length=="")
		{
			alert("Enter Confirm Password");
			return false;
		}	
		else if(pass.length<6)
		{
			alert("Enter alteast 6 character Password");
			return false;
		}
	}
</script>