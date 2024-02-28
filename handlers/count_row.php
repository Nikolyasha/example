<?php
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		include("db.php");
		session_start();
		$index = $_POST["index"];
		$_SESSION["count_row"] = $index;
		echo "1";
	}
?>