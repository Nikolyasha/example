<?php
	session_start();
	if ($_SESSION["auth_certif"] == "Yes")
	{
		header('Location: homepage');
	}

	// if (intval($_SESSION["admin"])  === 0)
	// {      
	// 	header("Location: ../auth.php");        
	// }
	
	include("handlers/db.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Система верификации - Проверка</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/popper.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	<script type="text/javascript" src="js/clipboard.js"></script>
	<script type="text/javascript" src="js/mask.js"></script>
	<script type="text/javascript" src="js/jquery.ui.totop.js"></script>
</head>
<body>
	<div class="container-fluid no-margin-padding">
		<div class="no-margin-padding" id="head_auth_div">
			<div class="row" style="padding-top: 0.5em;">
				<div class="col-md-12 text-center">
					<h3>Система верификации</h3>	
				</div>
			</div>
			<div class="row" style="padding-bottom: 1em;">
				<div class="col-md-12 text-center">
					<?php
						$r = mysqli_query($link, "SELECT * FROM `search_page_info`");
						$f = mysqli_fetch_array($r);
					?>
					<img src="img/<?php echo $f["Auth_Image"]; ?>" id="head_logo_img">	
				</div>
			</div>
		</div>
		<div class="row" id="body_auth_div">
			<div class="col-md-6 text-center offset-3">
				<div id="login_password_form">
			  		<div class="form-group">
			    		<label for="exampleInputEmail1">Введите E-mail:</label>
			    		<input type="email" class="form-control" id="login_input" placeholder="Введите E-mail">
			    		<div class="invalid-feedback">
				        	Некорректный ввод E-mail
				      	</div>
			  		</div>
			  		<div class="form-group">
			    		<label for="exampleInputPassword1">Введите пароль:</label>
			    		<input type="password" class="form-control" id="password_input" placeholder="Введите пароль">
			    		<div class="invalid-feedback">
				        	Некорректный ввод пароля
				      	</div>
			  		</div>
			  		<div class="form-group" style="margin: 22px 0 7px 0;">
			    		<input type="checkbox" class="checkbox" id="checkbox" />
						<label for="checkbox">Запомнить меня</label>
			  		</div>
			  		<button type="submit" class="btn btn-success btn-block" id="login_password_form_submit">Авторизоваться</button>
			  		<center><img src="img/loader_h.gif" class="text-center" id="login_password_form_loader" /></center>
			  		<div class="alert alert-danger" role="alert" id="login_password_form_message"></div>
		  		</div>
			</div>
		</div>
	</div>
</body>
</html>