<?php include('include/config.php');  ?>
<html>
	<head>
		<?php
			if(!isset($_SESSION['user_id']))
			{
				header('location:logout');
			}
			include('include/cFunction.php'); $cFN=new cFunction(); ?>
		<script src='js/jquery-3.0.0.js' type='text/javascript'></script>
		<title>Admin Panel</title>
	</head>
	<body>
		<div style="padding-top:120px;">
			<center>
				<form action="blog-add.php" method="POST" name="f1" enctype="multipart/form-data">
					<table width="60%" height="300" cellspacing="0" cellpadding="5" border="2">
						<tr>
							<th colspan="2">BLOG ADD</th>
						</tr>
						<tr>
							<td style="text-align:right;">BLOG TITLE *</td>
							<td><input type="text" name="blog_title" id="blog_title" style="width:90%;"></td>
						</tr>
						<tr>
							<td style="text-align:right;">BLOG DESCRIPTION *</td>
							<td><textarea rows="10" cols="25" type="text" name="blog_description" id="blog_description" style="width:90%;"></textarea></td>
						</tr>
						<tr>
							<td style="text-align:right;">TAGS *</td>
							<td>
								<input type="text" id="tags" name="tags[]" style="width:90%;" required>
								<br><br>
								<div class="contents"></div>
								<input type="button" class="add" name="add_item" value="Add More"/><br><br>
							</td>
						</tr>
						<tr>	
							<td style="text-align:right;">IMAGE * (Size Only 1kb)</td>
							<td><input type="file" name="uploadfile" id="uploadfile" accept="image/x-png,image/jpeg,image/jpg" required></td>
						</tr>
						<tr>
							<td colspan="2"><br>
								<center>
									<button type="submit" onClick="return validation();" name="save" id="save">Save</button>
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
		}
		else
		{
				$msg = "Failed to upload image";
		}
		  
		$itemValues=0;
		$blogtags = "";
		
		for($i=0;$i<sizeof($_POST['tags']);$i++) 
		{
			if(!empty($_POST["tags"][$i]))
			{
				print_r($_POST["tags"]);
				$itemValues++;
				if($blogtags!="") {
					$blogtags .= ", ";
				}
				$blogtags .= $_POST["tags"][$i];				
			}	
			echo $blogtags.'<br>';
		}
		//exit;
	
		$query="INSERT INTO `blog`(`blog_title`, `blog_description`, `tags`, `image`, `status`, `date_added`) VALUES ('".$_POST['blog_title']."','".$_POST['blog_description']."','".$blogtags."','$filename',1,'".date('Y-m-d H:i:s')."')";
	//	echo $query;exit;
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

<!--<script>
            $(document).ready(function() {
                $(".add").click(function() {
                     $('<input type="text" style="width:90%;" id="tags" name="tags[]"> <br><br><input type="button" style="background:red;color:white;" class="rem" name="del_item" value="Remove"/>').appendTo(".contents");
                });
            });
</script>
<script>
$('.contents').on('click', '.rem', function() {
  $(this).parent("td").remove();
});
</script>-->