<?php include('include/config.php');  ?>
<html>
	<head>
		<?php
			if(!isset($_SESSION['user_id']))
			{
				header('location:logout');
			}
			include('include/cFunction.php'); $cFN=new cFunction();
			$query=$cFN->getBlogByBlogID(@$_REQUEST['blog_id']);
			$result=mysqli_query($cDB,$query);
			$row=mysqli_fetch_array($result);
			?>
		<script src='js/jquery-3.0.0.js' type='text/javascript'></script>
		<title>Admin Panel</title>
	</head>
	<body>
		<div style="padding-top:120px;">
			<center>
				<form action="blog-update.php" method="POST" name="f1" enctype="multipart/form-data">
					<table width="60%" height="300" cellspacing="0" cellpadding="5" border="2">
						<tr>
							<th colspan="2">BLOG UPDATE</th>
						</tr>
						<tr>
							<td>BLOG TITLE *</td>
							<td><input type="text" name="blog_title" id="blog_title" value="<?php echo $row['blog_title']; ?>" style="width:90%;"></td>
						</tr>
						<tr>
							<td>BLOG DESCRIPTION *</td>
							<td><textarea rows="10" cols="25" type="text" name="blog_description" id="blog_description" style="width:90%;"><?php echo $row['blog_description']; ?></textarea></td>
						</tr>
						<tr>
							<td>TAGS *</td>
							<td>
							<?php
												$tmp = explode(',',$row['tags']);
												foreach($tmp as $blogtags)
												{										
											?><br>
								<input type="text" name="tags[]" id="tags" value="<?php echo $blogtags; ?>" style="width:90%;" required><br>
							<?php  } ?>
							<br>
								<div class="contents"></div>
								<input type="button" class="add" name="add_item" value="Add More"/><br><br>
							</td>
						</tr>	  
						<tr>	
							<td>IMAGE * (Size Only 1kb)</td>
							<td><input type="file" name="uploadfile" id="uploadfile" accept="image/x-png,image/jpeg,image/jpg">
							<br><img src="images/BLOG/<?php echo $row['image']; ?>" width="80" height="70"></td>
						</tr>
						<tr>
							<td>STATUS</td>
							<td>
								<select name="status" id="status" style="width:30%;">
								<?php 
							  if($row['status'] == 1){
								  ?>
								<option value="1" selected="selected">Active</option>
								<option value="0">Inactive</option>
								<?php }
								else{ ?>
								<option value="0" selected="selected">Inactive</option>
								<option value="1">Active</option>
								<?php } ?>
							  </select>
							</td>
						</tr>
						<tr>
							<td colspan="2"><br>
								<center>
									<button type="submit" onClick="return validation();" name="save" id="save">Save</button>
									<input type="hidden" name="blogid" value="<?php echo $_REQUEST['blog_id']; ?>">
									<button type="reset">Cancel</button>
									<br><br>
									<a href="blog-list.php">List Blog</a> |
									<a href="dashboard.php">Dashboard</a> |
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
	if($_FILES['uploadfile']['size'] > 100000)
	{
	  echo "<center style='color:red;'>You can not upload more than 1kb image file</center>";
	}
	else
	{
		$filename = 'blog-'.$_FILES["uploadfile"]["name"];
		$tempname = $_FILES["uploadfile"]["tmp_name"];    
		$folder = "images/blog/".$filename;
		
		if (move_uploaded_file($tempname, $folder))  {
				$msg = "Image uploaded successfully";
				$query1="UPDATE `blog` SET `image`='$filename' WHERE blog_id='".$_REQUEST['blogid']."'";
				$result1 = mysqli_query($cDB, $query1);
			}else{
				$msg = "Failed to upload image";
		  }
		  
		$itemValues=0;
		$blogtags = "";
		
		for($i=0;$i<sizeof($_POST['tags']);$i++) {			

			if(!empty($_POST["tags"][$i]))
			{
				$itemValues++;
				if($blogtags!="") {
					$blogtags .= ",";
				}
				$blogtags .= $_POST["tags"][$i];
			}
		}
	
		$query="UPDATE `blog` SET `blog_title`='".$_POST['blog_title']."',`blog_description`='".$_POST['blog_description']."',`tags`='".$blogtags."',`status`='".$_POST['status']."' WHERE blog_id='".$_REQUEST['blogid']."'";
		//echo $query;exit;
		$result=mysqli_query($cDB,$query);
		
		header('location:blog-list.php');
	}
}	
?>

<script>
	function validation()
	{
		var blogtitle=document.f1.blog_title.value;
		var blogdescription=document.f1.blog_description.value;
		
		if(blogtitle.length=="")
		{
			alert("Enter Blog Title");
			return false;
		}
		else if(blogdescription.length=="")
		{
			alert("Enter Blog Description");
			return false;
		}
	}
</script>

<script>
            $(document).ready(function() {
                $(".add").click(function() {
                     $('<input type="text" style="width:90%;" id="tags" name="tags[]"><br><br>').appendTo(".contents");
                });
            });
</script>