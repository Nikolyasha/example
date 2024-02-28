<?php
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		include("db.php");
		session_start();
		$number_cert = $_POST["number_cert"];
		$topic = $_POST["topic"];
		$date_receiving = $_POST["date_receiving"];
		$lastname = $_POST["lastname"];
		$firstname = $_POST["firstname"];
		$image = $_POST["image"];
		if ($image != "")
		{
			$img_r = ", '".$image."'";
			$r = mysqli_query($link, "INSERT INTO `data` (`Certificate_Number`, `Topic`, `Date_Of_Receiving`, `Lastname`, `Firstname`, `Image`) VALUES ('".$number_cert."', '".$topic."', '".$date_receiving."', '".$lastname."', '".$firstname."' $img_r)");
		}
		else
		{
			$img_r = "";
			$r1 = mysqli_query($link, "INSERT INTO `data` (`Certificate_Number`, `Topic`, `Date_Of_Receiving`, `Lastname`, `Firstname`) VALUES ('".$number_cert."', '".$topic."', '".$date_receiving."', '".$lastname."', '".$firstname."')");
		}
		$r2 = mysqli_query($link, "INSERT INTO `logs` (`User_Email`, `Type`, `Certificate_Number`, `Lastname`, `Firstname`) VALUES ('".$_SESSION["email"]."', '1', '".$number_cert."', '".$lastname."', '".$firstname."')");
		echo "1";
	}
?>