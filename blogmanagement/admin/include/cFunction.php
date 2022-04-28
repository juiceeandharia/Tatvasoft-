<?php
include('cDatabase.php');

class cFunction
{
	public function getAllUsers()
	{
		$query="select * from users order by user_id";
		return $query;
	}
	public function getUserByUserID($id)
	{
		$query="select * from users where user_id='".$id."'";
		return $query;
	}
	public function getAllBlog()
	{
		$query="select * from blog order by date_added,blog_id";
		return $query;
	}
	public function getBlogByBlogID($id)
	{
		$query="select * from blog where blog_id='".$id."'";
		return $query;
	}
}
?>