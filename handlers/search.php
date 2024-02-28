<?php
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		session_start();
		include("db.php");
		$type_search = $_POST["type_search"];
		$text_search = $_POST["text_search"];
		switch ($type_search) {
		    case 1:
		        $r1 = mysqli_query($link, "SELECT * FROM `data` WHERE `Certificate_Number` = '".$text_search."'");
		        if (mysqli_num_rows($r1) > 0)
		        {
		        	while ($f1 = mysqli_fetch_array($r1))
					{
						if ($f1["Image"] == "")
						{
							$img = "no_photo.jpg";
						}
						else
						{
							$img = $f1["Image"];
						}
						echo '
							<tr>
								<td>'.$f1["Certificate_Number"].'</td>
								<td>'.$f1["Topic"].'</td>
								<td>'.date("j.m.Y", strtotime($f1["Date_Of_Receiving"])).'</td>
								<td>'.$f1["Lastname"].'</td>
								<td>'.$f1["Firstname"].'</td>
								<td><img src="certificates/'.$img.'" class="image_cert" style="height: 75px; width: 75px;" /></td>
							</tr>
						';
					}
		        }
		        else
		        {
		        	echo '
						<tr>
							<td colspan="6">Поиск не дал результатов ...</td>
						</tr>
					';
		        }
		        break;
		    case 2:
		        $r3 = mysqli_query($link, "SELECT * FROM `data` WHERE `Lastname` LIKE '%$text_search%'");
		        if (mysqli_num_rows($r3) > 0)
		        {
		        	while ($f3 = mysqli_fetch_array($r3))
					{
						if ($f3["Image"] == "")
						{
							$img = "no_photo.jpg";
						}
						else
						{
							$img = $f3["Image"];
						}
						echo '
							<tr>
								<td>'.$f3["Certificate_Number"].'</td>
								<td>'.$f3["Topic"].'</td>
								<td>'.date("j.m.Y", strtotime($f3["Date_Of_Receiving"])).'</td>
								<td>'.$f3["Lastname"].'</td>
								<td>'.$f3["Firstname"].'</td>
								<td><img src="certificates/'.$img.'" class="image_cert" style="height: 75px; width: 75px;" /></td>
							</tr>
						';
					}
		        }
		        else
		        {
		        	echo '
						<tr>
							<td colspan="6">Поиск не дал результатов ...</td>
						</tr>
					';
		        }
		        break;
		}
	}
?>