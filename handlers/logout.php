<?php
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		session_start();
		unset($_SESSION["auth_certif"]);
		unset($_SESSION["email"]);
		unset($_SESSION["count_row"]);
		setcookie("rememberme","",0,"/");
		echo "logout";
	}
?>