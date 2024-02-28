<?php
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		session_start();
		include("db.php");
		$id = $_POST["id"];
		$password = $_POST["password"];
		$r = mysqli_query($link, "SELECT `Master_Password` FROM `users` WHERE `Email` = '".$_SESSION["email"]."'");
		$f = mysqli_fetch_array($r);
		if ($password == $f["Master_Password"])
		{
			$r1 = mysqli_query($link, "SELECT * FROM `data` WHERE `Id` = '".$id."'");
			$f1 = mysqli_fetch_array($r1);
			if (file_exists('../certificates/'.$f1["Image"]))
			{
		        unlink('../certificates/'.$f1["Image"]);
		    }
		    $r2 = mysqli_query($link, "INSERT INTO `logs` (`User_Email`, `Type`, `Certificate_Number`, `Lastname`, `Firstname`) VALUES ('".$_SESSION["email"]."', '2', '".$f1["Certificate_Number"]."', '".$f1["Lastname"]."', '".$f1["Firstname"]."')");
			$r3 = mysqli_query($link, "DELETE FROM `data` WHERE `Id` = '".$id."'");

			//del scr img
			unlink("../certificates/$f1[Image]");
			echo "1";
		}
		else
		{
			echo "0";
		}
	}
?>