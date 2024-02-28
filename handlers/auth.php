<?php
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		include("db.php");
		$email = $_POST["email"];
		$password = $_POST["password"];
		$result = mysqli_query($link, "SELECT * FROM `users` WHERE `Email` = '".$email."'");
	    if (mysqli_num_rows($result) > 0)
	    {
		    $row = mysqli_fetch_array($result);
	    	if ($row["Password"] == $password)
	    	{
    			session_start();
			    if ($_POST["check_rem"] == "true")
			    {
			        setcookie('rememberme',$email.'+'.$password,time()+3600*24*31, "/");
			    }
			    $_SESSION["auth_certif"] = "Yes";
			    $_SESSION["email"] = $row["Email"];
			    $_SESSION["count_row"] = 25;

				//Для проверки на права
				$_SESSION["admin"] = $row["IsAdmin"];
				

				if (intval($_SESSION["admin"])  === 1)
				{      
					echo "Yes(admin)";        
				}
				else {
					echo "Yes(no admin)";
				}
				// echo "Yes";
							    
		    }
	    	else
	    	{
	    		echo "No (password)";
	    	}
	    }
	    else
	    {
	    	echo "No (email)";
	    }
	} 
?>