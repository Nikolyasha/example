<?php
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		include("db.php");
		session_start();
		$title = $_POST["title"];
		$description = $_POST["description"];
		$image = $_POST["image"];
		if ($image != "")
		{
			$img_r = ", `Image` = '".$image."'";
		}
		else
		{
			$img_r = "";
		}
		$result = mysqli_query($link, "UPDATE `search_page_info` SET `Title` = '".$title."', `Description` = '".$description."' $img_r");
		echo "1";
	}
?>