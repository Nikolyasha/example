<?php
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		session_start();
		include("db.php");
		$type_search = $_POST["type_search"];
		$text_search = $_POST["text_search"];
		switch ($type_search) {
		    case 1:
		        $r1 = mysqli_query($link, "SELECT * FROM `data` WHERE `Certificate_Number` LIKE '%$text_search%'");
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
								<td>'.$f1["Id"].'</td>
								<td>'.$f1["Certificate_Number"].'</td>
								<td>'.$f1["Topic"].'</td>
								<td>'.date("j.m.Y", strtotime($f1["Date_Of_Receiving"])).'</td>
								<td>'.$f1["Lastname"].'</td>
								<td>'.$f1["Firstname"].'</td>
								<td><img src="certificates/'.$img.'" class="image_cert" style="height: 75px; width: 75px;" /></td>
								<td><button class="btn btn-danger btn-block data_delete" data-src="'.$f1["Id"].'" style="font-weight: bold;">Удалить</button></td>
							</tr>
						';
					}
		        }
		        else
		        {
		        	echo '
						<tr>
							<td colspan="8">Поиск не дал результатов ...</td>
						</tr>
					';
		        }
		        break;
		    case 2:
		        $r2 = mysqli_query($link, "SELECT * FROM `data` WHERE `Topic` LIKE '%$text_search%'");
		        if (mysqli_num_rows($r2) > 0)
		        {
		        	while ($f2 = mysqli_fetch_array($r2))
					{
						if ($f2["Image"] == "")
						{
							$img = "no_photo.jpg";
						}
						else
						{
							$img = $f2["Image"];
						}
						echo '
							<tr>
								<td>'.$f2["Id"].'</td>
								<td>'.$f2["Certificate_Number"].'</td>
								<td>'.$f2["Topic"].'</td>
								<td>'.date("j.m.Y", strtotime($f2["Date_Of_Receiving"])).'</td>
								<td>'.$f2["Lastname"].'</td>
								<td>'.$f2["Firstname"].'</td>
								<td><img src="certificates/'.$img.'" class="image_cert" style="height: 75px; width: 75px;" /></td>
								<td><button class="btn btn-danger btn-block data_delete" data-src="'.$f2["Id"].'" style="font-weight: bold;">Удалить</button></td>
							</tr>
						';
					}
		        }
		        else
		        {
		        	echo '
						<tr>
							<td colspan="8">Поиск не дал результатов ...</td>
						</tr>
					';
		        }
		        break;
		    case 3:
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
								<td>'.$f3["Id"].'</td>
								<td>'.$f3["Certificate_Number"].'</td>
								<td>'.$f3["Topic"].'</td>
								<td>'.date("j.m.Y", strtotime($f3["Date_Of_Receiving"])).'</td>
								<td>'.$f3["Lastname"].'</td>
								<td>'.$f3["Firstname"].'</td>
								<td><img src="certificates/'.$img.'" class="image_cert" style="height: 75px; width: 75px;" /></td>
								<td><button class="btn btn-danger btn-block data_delete" data-src="'.$f3["Id"].'" style="font-weight: bold;">Удалить</button></td>
							</tr>
						';
					}
		        }
		        else
		        {
		        	echo '
						<tr>
							<td colspan="8">Поиск не дал результатов ...</td>
						</tr>
					';
		        }
		        break;
		    case 4:
		    	$r4 = mysqli_query($link, "SELECT * FROM `data` WHERE `Firstname` LIKE '%$text_search%'");
		        if (mysqli_num_rows($r4) > 0)
		        {
		        	while ($f4 = mysqli_fetch_array($r4))
					{
						if ($f4["Image"] == "")
						{
							$img = "no_photo.jpg";
						}
						else
						{
							$img = $f4["Image"];
						}
						echo '
							<tr>
								<td>'.$f4["Id"].'</td>
								<td>'.$f4["Certificate_Number"].'</td>
								<td>'.$f4["Topic"].'</td>
								<td>'.date("j.m.Y", strtotime($f4["Date_Of_Receiving"])).'</td>
								<td>'.$f4["Lastname"].'</td>
								<td>'.$f4["Firstname"].'</td>
								<td><img src="certificates/'.$img.'" class="image_cert" style="height: 75px; width: 75px;" /></td>
								<td><button class="btn btn-danger btn-block data_delete" data-src="'.$f4["Id"].'" style="font-weight: bold;">Удалить</button></td>
							</tr>
						';
					}
		        }
		        else
		        {
		        	echo '
						<tr>
							<td colspan="8">Поиск не дал результатов ...</td>
						</tr>
					';
		        }
		    	break;
		}
	}
?>