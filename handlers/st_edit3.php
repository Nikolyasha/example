<?php
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		include("db.php");
		session_start();
		$image = $_POST["image"];
		$result = mysqli_query($link, "UPDATE `search_page_info` SET `Admin_Image` = '".$image."'");
		echo "1";
	}
?>