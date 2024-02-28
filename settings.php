<?php
	session_start();
	if (!($_SESSION["auth_certif"] == "Yes"))
	{
		header('Location: index');
	}
	include("handlers/db.php");
	include_once("handlers/functions.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Система верификации - Настройка страницы поиска</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-select.css">

	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/popper.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	<script type="text/javascript" src="js/clipboard.js"></script>
	<script type="text/javascript" src="js/mask.js"></script>
	<script type="text/javascript" src="js/bootstrap-select.js"></script>
	<script type="text/javascript" src="js/jquery-ui.js"></script>
	<script type="text/javascript" src="js/jquery.ui.totop.js"></script>
</head>
<body>
	<div class="container-fluid">
		<div class="row" style="height: 2.8em;">
			<div class="col-md-2" style="background-color: #23282C;">
				<?php
					$r2 = mysqli_query($link, "SELECT * FROM `search_page_info`");
					$f2 = mysqli_fetch_array($r2);
				?>
				<img src="img/<?php echo $f2["Admin_Image"]; ?>" style="height: 2.5em;">
			</div>
			<div class="col-md-10 text-center" style="background-color: #23282C;">
				<h3 class="text-white" style="margin-top: 4px; font-weight: bold; text-align: center;">Система сертификатов</h3>
			</div>
		</div>
		<div class="row" style="min-height: 93.2vh;">
			<div class="col-md-2 no-margin-padding" style="background-color: #23282C;">
				<div class="text-white left_menu_item vertical-align" id="left_menu_home"><img src="img/home.png" />Главная</div>
				<div class="text-white left_menu_item vertical-align" id="left_menu_logs"><img src="img/logs.png" />Логи</div>
				<div class="text-white left_menu_item vertical-align" id="left_menu_settings"><img src="img/settings.png" />Настройки</div>
				<div class="text-white left_menu_item vertical-align" id="left_menu_exit"><img src="img/exit.png" />Выйти</div>
			</div>
			<div class="col-md-10 no-margin-padding">
				<div class="container-fluid">
					<?php
						$result = mysqli_query($link, "SELECT * FROM `search_page_info`");
						$row = mysqli_fetch_array($result);
					?>
					<div class="row align-items-center text-center" style="margin-top: 1em;">
						<div class="col-md-3 offset-1">
							<h4>Логотип (поиск): </h4>
						</div>
						<div class="col-md-2">
							<img src="img/<?php echo $row["Image"] ?>" style="border: 1px solid #CCCCCC; box-sizing: border-box; height: 60px; width: auto; " id="image1">
						</div>
						<div class="col-md-4 offset-1">
							<input type="file" class="form-control-file" id="settings_image_input">
						</div>
						<div class="col-md-1">
							<div style="height: 30px; width: 30px; display: none;" id="settings_loader1">
								<svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="lds-hourglass"><defs><clipPath ng-attr-id="{{config.cpid}}" id="lds-hourglass-cpid-443985083317f"><rect x="0" y="0.926833" width="100" height="49.0732"><animate attributeName="y" calcMode="spline" values="0;50;0;0;0" keyTimes="0;0.4;0.5;0.9;1" dur="3" keySplines="0.3 0 1 0.7;0.3 0 1 0.7;0.3 0 1 0.7;0.3 0 1 0.7" begin="0s" repeatCount="indefinite"></animate><animate attributeName="height" calcMode="spline" values="50;0;0;50;50" keyTimes="0;0.4;0.5;0.9;1" dur="3" keySplines="0.3 0 1 0.7;0.3 0 1 0.7;0.3 0 1 0.7;0.3 0 1 0.7" begin="0s" repeatCount="indefinite"></animate></rect><rect x="0" y="99.0732" width="100" height="0.926833"><animate attributeName="y" calcMode="spline" values="100;50;50;50;50" keyTimes="0;0.4;0.5;0.9;1" dur="3" keySplines="0.3 0 1 0.7;0.3 0 1 0.7;0.3 0 1 0.7;0.3 0 1 0.7" begin="0s" repeatCount="indefinite"></animate><animate attributeName="height" calcMode="spline" values="0;50;50;0;0" keyTimes="0;0.4;0.5;0.9;1" dur="3" keySplines="0.3 0 1 0.7;0.3 0 1 0.7;0.3 0 1 0.7;0.3 0 1 0.7" begin="0s" repeatCount="indefinite"></animate></rect></clipPath></defs><g transform="translate(50,50)"><g transform="scale(0.9)"><g transform="translate(-50,-50)"><g transform="rotate(0)"><animateTransform attributeName="transform" type="rotate" calcMode="linear" values="0 50 50;0 50 50;180 50 50;180 50 50;360 50 50" keyTimes="0;0.4;0.5;0.9;1" dur="3s" begin="0s" repeatCount="indefinite"></animateTransform><path ng-attr-clip-path="url(#{{config.cpid}})" ng-attr-fill="{{config.sand}}" d="M54.864,50L54.864,50c0-1.291,0.689-2.412,1.671-2.729c9.624-3.107,17.154-12.911,19.347-25.296 c0.681-3.844-1.698-7.475-4.791-7.475H28.908c-3.093,0-5.472,3.631-4.791,7.475c2.194,12.385,9.723,22.189,19.347,25.296 c0.982,0.317,1.671,1.438,1.671,2.729v0c0,1.291-0.689,2.412-1.671,2.729C33.84,55.836,26.311,65.64,24.117,78.025 c-0.681,3.844,1.698,7.475,4.791,7.475h42.184c3.093,0,5.472-3.631,4.791-7.475C73.689,65.64,66.16,55.836,56.536,52.729 C55.553,52.412,54.864,51.291,54.864,50z" clip-path="url(#lds-hourglass-cpid-443985083317f)" fill="#d34c31"></path><path ng-attr-fill="{{config.frame}}" d="M81,81.5h-2.724l0.091-0.578c0.178-1.122,0.17-2.243-0.022-3.333C76.013,64.42,68.103,54.033,57.703,50.483l-0.339-0.116 v-0.715l0.339-0.135c10.399-3.552,18.31-13.938,20.642-27.107c0.192-1.089,0.2-2.211,0.022-3.333L78.276,18.5H81 c2.481,0,4.5-2.019,4.5-4.5S83.481,9.5,81,9.5H19c-2.481,0-4.5,2.019-4.5,4.5s2.019,4.5,4.5,4.5h2.724l-0.092,0.578 c-0.178,1.122-0.17,2.243,0.023,3.333c2.333,13.168,10.242,23.555,20.642,27.107l0.338,0.116v0.715l-0.338,0.135 c-10.4,3.551-18.31,13.938-20.642,27.106c-0.193,1.09-0.201,2.211-0.023,3.333l0.092,0.578H19c-2.481,0-4.5,2.019-4.5,4.5 s2.019,4.5,4.5,4.5h62c2.481,0,4.5-2.019,4.5-4.5S83.481,81.5,81,81.5z M73.14,81.191L73.012,81.5H26.988l-0.128-0.309 c-0.244-0.588-0.491-1.538-0.28-2.729c2.014-11.375,8.944-20.542,17.654-23.354c2.035-0.658,3.402-2.711,3.402-5.108 c0-2.398-1.368-4.451-3.403-5.108c-8.71-2.812-15.639-11.979-17.653-23.353c-0.211-1.191,0.036-2.143,0.281-2.731l0.128-0.308 h46.024l0.128,0.308c0.244,0.589,0.492,1.541,0.281,2.731c-2.015,11.375-8.944,20.541-17.654,23.353 c-2.035,0.658-3.402,2.71-3.402,5.108c0,2.397,1.368,4.45,3.403,5.108c8.71,2.812,15.64,11.979,17.653,23.354 C73.632,79.651,73.384,80.604,73.14,81.191z" fill="#220b09"></path></g></g></g></g></svg>
							</div>
						</div>
					</div>
					<div class="row align-items-center text-center" style="margin-top: 1em;">
						<div class="col-md-3 offset-1">
							<h4>Логотип (авторизация): </h4>
						</div>
						<div class="col-md-2 ">
							<img src="img/<?php echo $row["Auth_Image"] ?>" style="border: 1px solid #CCCCCC; box-sizing: border-box; height: 60px; width: auto;" id="image2">
						</div>
						<div class="col-md-4 offset-1">
							<input type="file" class="form-control-file" id="settings_image_input2">
						</div>
						<div class="col-md-1">
							<div style="height: 30px; width: 30px; display: none;" id="settings_loader2">
								<svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="lds-hourglass"><defs><clipPath ng-attr-id="{{config.cpid}}" id="lds-hourglass-cpid-443985083317f"><rect x="0" y="0.926833" width="100" height="49.0732"><animate attributeName="y" calcMode="spline" values="0;50;0;0;0" keyTimes="0;0.4;0.5;0.9;1" dur="3" keySplines="0.3 0 1 0.7;0.3 0 1 0.7;0.3 0 1 0.7;0.3 0 1 0.7" begin="0s" repeatCount="indefinite"></animate><animate attributeName="height" calcMode="spline" values="50;0;0;50;50" keyTimes="0;0.4;0.5;0.9;1" dur="3" keySplines="0.3 0 1 0.7;0.3 0 1 0.7;0.3 0 1 0.7;0.3 0 1 0.7" begin="0s" repeatCount="indefinite"></animate></rect><rect x="0" y="99.0732" width="100" height="0.926833"><animate attributeName="y" calcMode="spline" values="100;50;50;50;50" keyTimes="0;0.4;0.5;0.9;1" dur="3" keySplines="0.3 0 1 0.7;0.3 0 1 0.7;0.3 0 1 0.7;0.3 0 1 0.7" begin="0s" repeatCount="indefinite"></animate><animate attributeName="height" calcMode="spline" values="0;50;50;0;0" keyTimes="0;0.4;0.5;0.9;1" dur="3" keySplines="0.3 0 1 0.7;0.3 0 1 0.7;0.3 0 1 0.7;0.3 0 1 0.7" begin="0s" repeatCount="indefinite"></animate></rect></clipPath></defs><g transform="translate(50,50)"><g transform="scale(0.9)"><g transform="translate(-50,-50)"><g transform="rotate(0)"><animateTransform attributeName="transform" type="rotate" calcMode="linear" values="0 50 50;0 50 50;180 50 50;180 50 50;360 50 50" keyTimes="0;0.4;0.5;0.9;1" dur="3s" begin="0s" repeatCount="indefinite"></animateTransform><path ng-attr-clip-path="url(#{{config.cpid}})" ng-attr-fill="{{config.sand}}" d="M54.864,50L54.864,50c0-1.291,0.689-2.412,1.671-2.729c9.624-3.107,17.154-12.911,19.347-25.296 c0.681-3.844-1.698-7.475-4.791-7.475H28.908c-3.093,0-5.472,3.631-4.791,7.475c2.194,12.385,9.723,22.189,19.347,25.296 c0.982,0.317,1.671,1.438,1.671,2.729v0c0,1.291-0.689,2.412-1.671,2.729C33.84,55.836,26.311,65.64,24.117,78.025 c-0.681,3.844,1.698,7.475,4.791,7.475h42.184c3.093,0,5.472-3.631,4.791-7.475C73.689,65.64,66.16,55.836,56.536,52.729 C55.553,52.412,54.864,51.291,54.864,50z" clip-path="url(#lds-hourglass-cpid-443985083317f)" fill="#d34c31"></path><path ng-attr-fill="{{config.frame}}" d="M81,81.5h-2.724l0.091-0.578c0.178-1.122,0.17-2.243-0.022-3.333C76.013,64.42,68.103,54.033,57.703,50.483l-0.339-0.116 v-0.715l0.339-0.135c10.399-3.552,18.31-13.938,20.642-27.107c0.192-1.089,0.2-2.211,0.022-3.333L78.276,18.5H81 c2.481,0,4.5-2.019,4.5-4.5S83.481,9.5,81,9.5H19c-2.481,0-4.5,2.019-4.5,4.5s2.019,4.5,4.5,4.5h2.724l-0.092,0.578 c-0.178,1.122-0.17,2.243,0.023,3.333c2.333,13.168,10.242,23.555,20.642,27.107l0.338,0.116v0.715l-0.338,0.135 c-10.4,3.551-18.31,13.938-20.642,27.106c-0.193,1.09-0.201,2.211-0.023,3.333l0.092,0.578H19c-2.481,0-4.5,2.019-4.5,4.5 s2.019,4.5,4.5,4.5h62c2.481,0,4.5-2.019,4.5-4.5S83.481,81.5,81,81.5z M73.14,81.191L73.012,81.5H26.988l-0.128-0.309 c-0.244-0.588-0.491-1.538-0.28-2.729c2.014-11.375,8.944-20.542,17.654-23.354c2.035-0.658,3.402-2.711,3.402-5.108 c0-2.398-1.368-4.451-3.403-5.108c-8.71-2.812-15.639-11.979-17.653-23.353c-0.211-1.191,0.036-2.143,0.281-2.731l0.128-0.308 h46.024l0.128,0.308c0.244,0.589,0.492,1.541,0.281,2.731c-2.015,11.375-8.944,20.541-17.654,23.353 c-2.035,0.658-3.402,2.71-3.402,5.108c0,2.397,1.368,4.45,3.403,5.108c8.71,2.812,15.64,11.979,17.653,23.354 C73.632,79.651,73.384,80.604,73.14,81.191z" fill="#220b09"></path></g></g></g></g></svg>
							</div>
						</div>
					</div>
					<div class="row align-items-center text-center" style="margin-top: 1em;">
						<div class="col-md-3 offset-1">
							<h4>Логотип (панель управления): </h4>
						</div>
						<div class="col-md-2">
							<img src="img/<?php echo $row["Admin_Image"] ?>" style="border: 1px solid #CCCCCC; box-sizing: border-box; height: 60px; width: auto;" id="image3">
						</div>
						<div class="col-md-4 offset-1">
							<input type="file" class="form-control-file" id="settings_image_input3">
						</div>
						<div class="col-md-1">
							<div style="height: 30px; width: 30px; display: none;" id="settings_loader3">
								<svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="lds-hourglass"><defs><clipPath ng-attr-id="{{config.cpid}}" id="lds-hourglass-cpid-443985083317f"><rect x="0" y="0.926833" width="100" height="49.0732"><animate attributeName="y" calcMode="spline" values="0;50;0;0;0" keyTimes="0;0.4;0.5;0.9;1" dur="3" keySplines="0.3 0 1 0.7;0.3 0 1 0.7;0.3 0 1 0.7;0.3 0 1 0.7" begin="0s" repeatCount="indefinite"></animate><animate attributeName="height" calcMode="spline" values="50;0;0;50;50" keyTimes="0;0.4;0.5;0.9;1" dur="3" keySplines="0.3 0 1 0.7;0.3 0 1 0.7;0.3 0 1 0.7;0.3 0 1 0.7" begin="0s" repeatCount="indefinite"></animate></rect><rect x="0" y="99.0732" width="100" height="0.926833"><animate attributeName="y" calcMode="spline" values="100;50;50;50;50" keyTimes="0;0.4;0.5;0.9;1" dur="3" keySplines="0.3 0 1 0.7;0.3 0 1 0.7;0.3 0 1 0.7;0.3 0 1 0.7" begin="0s" repeatCount="indefinite"></animate><animate attributeName="height" calcMode="spline" values="0;50;50;0;0" keyTimes="0;0.4;0.5;0.9;1" dur="3" keySplines="0.3 0 1 0.7;0.3 0 1 0.7;0.3 0 1 0.7;0.3 0 1 0.7" begin="0s" repeatCount="indefinite"></animate></rect></clipPath></defs><g transform="translate(50,50)"><g transform="scale(0.9)"><g transform="translate(-50,-50)"><g transform="rotate(0)"><animateTransform attributeName="transform" type="rotate" calcMode="linear" values="0 50 50;0 50 50;180 50 50;180 50 50;360 50 50" keyTimes="0;0.4;0.5;0.9;1" dur="3s" begin="0s" repeatCount="indefinite"></animateTransform><path ng-attr-clip-path="url(#{{config.cpid}})" ng-attr-fill="{{config.sand}}" d="M54.864,50L54.864,50c0-1.291,0.689-2.412,1.671-2.729c9.624-3.107,17.154-12.911,19.347-25.296 c0.681-3.844-1.698-7.475-4.791-7.475H28.908c-3.093,0-5.472,3.631-4.791,7.475c2.194,12.385,9.723,22.189,19.347,25.296 c0.982,0.317,1.671,1.438,1.671,2.729v0c0,1.291-0.689,2.412-1.671,2.729C33.84,55.836,26.311,65.64,24.117,78.025 c-0.681,3.844,1.698,7.475,4.791,7.475h42.184c3.093,0,5.472-3.631,4.791-7.475C73.689,65.64,66.16,55.836,56.536,52.729 C55.553,52.412,54.864,51.291,54.864,50z" clip-path="url(#lds-hourglass-cpid-443985083317f)" fill="#d34c31"></path><path ng-attr-fill="{{config.frame}}" d="M81,81.5h-2.724l0.091-0.578c0.178-1.122,0.17-2.243-0.022-3.333C76.013,64.42,68.103,54.033,57.703,50.483l-0.339-0.116 v-0.715l0.339-0.135c10.399-3.552,18.31-13.938,20.642-27.107c0.192-1.089,0.2-2.211,0.022-3.333L78.276,18.5H81 c2.481,0,4.5-2.019,4.5-4.5S83.481,9.5,81,9.5H19c-2.481,0-4.5,2.019-4.5,4.5s2.019,4.5,4.5,4.5h2.724l-0.092,0.578 c-0.178,1.122-0.17,2.243,0.023,3.333c2.333,13.168,10.242,23.555,20.642,27.107l0.338,0.116v0.715l-0.338,0.135 c-10.4,3.551-18.31,13.938-20.642,27.106c-0.193,1.09-0.201,2.211-0.023,3.333l0.092,0.578H19c-2.481,0-4.5,2.019-4.5,4.5 s2.019,4.5,4.5,4.5h62c2.481,0,4.5-2.019,4.5-4.5S83.481,81.5,81,81.5z M73.14,81.191L73.012,81.5H26.988l-0.128-0.309 c-0.244-0.588-0.491-1.538-0.28-2.729c2.014-11.375,8.944-20.542,17.654-23.354c2.035-0.658,3.402-2.711,3.402-5.108 c0-2.398-1.368-4.451-3.403-5.108c-8.71-2.812-15.639-11.979-17.653-23.353c-0.211-1.191,0.036-2.143,0.281-2.731l0.128-0.308 h46.024l0.128,0.308c0.244,0.589,0.492,1.541,0.281,2.731c-2.015,11.375-8.944,20.541-17.654,23.353 c-2.035,0.658-3.402,2.71-3.402,5.108c0,2.397,1.368,4.45,3.403,5.108c8.71,2.812,15.64,11.979,17.653,23.354 C73.632,79.651,73.384,80.604,73.14,81.191z" fill="#220b09"></path></g></g></g></g></svg>
							</div>
						</div>
					</div>
					<div class="row align-items-center text-center" style="margin-top: 1em;">
						<div class="col-md-3 offset-1">
							<h4>Заголовок: </h4>
						</div>
						<div class="col-md-6">
							<textarea rows="3" class="form-control" id="settings_title_input"><?php echo $row["Title"]; ?></textarea>
							<div class="invalid-feedback">
				        		Поле "Заголовок" не может быть пустым
				      		</div>
						</div>
					</div>
					<div class="row align-items-center text-center" style="margin-top: 1em;">
						<div class="col-md-3 offset-1">
							<h4>Описание: </h4>
						</div>
						<div class="col-md-6">
							<textarea rows="5" class="form-control" id="settings_description_input"><?php echo $row["Description"]; ?></textarea>
							<div class="invalid-feedback">
				        		Поле "Описание" не может быть пустым
				      		</div>
						</div>
					</div>
					<div class="row align-items-center text-center" style="height: 4em;">
						<div class="col-md-12">
							<button class="btn btn-info" id="settings_save_changes">Сохранить изменения</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>