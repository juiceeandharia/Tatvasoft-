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
					<?php
						$query=$cFN->getAllBlog();
						$result=mysqli_query($cDB,$query);
						
					?>
					<table style="text-align:center;" width="80%" height="300" cellspacing="0" cellpadding="5" border="2">
						<tr>
							<th colspan="8">BLOG LIST</th>
						</tr>
						<tr>
							<td width="5%">#</td>
							<td>IMAGE</td>
							<td>BLOG NAME</td>
							<td>BLOG DESCRIPTION</td>
							<td>TAGS</td>
							<td>DATE</td>
							<td>STATUS</td>
							<td width="20%">ACTION</td>
						</tr>
						<?php
							$i=1;
						while($row=mysqli_fetch_array($result))
						{ ?>
						<tr>
							<td><?php echo $i; ?></td>							
							<td><img src="images/blog/<?php echo $row['image']; ?>" width="100" height="90"></td>
							<td><?php echo $row['blog_title']; ?></td>
							<td><?php echo $row['blog_description']; ?></td>
							<td><?php echo $row['tags']; ?></td>							
							<td><?php echo date('d-m-Y',strtotime($row['date_added'])); ?></td>							
							<td><?php
								if($row['status']==1)
								{
									echo 'Active';
								}			
								else
								{
									echo 'Inactive';
								}
							?></td>
							<td colspan=2><a href="blog-update.php?blog_id=<?php echo $row['blog_id']; ?>">Update</a> |
							
							<a href="javascript:void(0);" class="delblog" id="<?php echo $row['blog_id']; ?>">Delete</a>
												
						</tr>
						<?php
							$i=$i+1;
						} ?>
					</table>
					<br><br>
									<a href="blog-add.php">Add Blog</a> | 
									<a href="dashboard.php">Dashboard</a> |
									<a href="logout.php">Logout</a>	
			</center>
		</div>
	</body>
</html>


<script>
	$(document).on('click', '.delblog', function()
       {
               var answer = confirm('Are you sure you want to delete?');
               if(answer==true)
               {
					  var id = $(this).attr("id");
					   $.ajax({
                          type: "GET",
                          url: "include/deleteblogfn.php",
                          data: "&id="+id+" ",
                          cache: false,
                          success: function(){
							window.location.reload();
                         }
                        });
               }
       return false;
});
</script>