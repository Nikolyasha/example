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
	<title>Система верификации - Логи</title>
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
	<script type="text/javascript">
		document.addEventListener('DOMContentLoaded', () => {

		    const getSort = ({ target }) => {
		        const order = (target.dataset.order = -(target.dataset.order || -1));
		        const index = [...target.parentNode.cells].indexOf(target);
		        const collator = new Intl.Collator(['en', 'ru'], { numeric: true });
		        const comparator = (index, order) => (a, b) => order * collator.compare(
		            a.children[index].innerHTML,
		            b.children[index].innerHTML
		        );
		        
		        for(const tBody of target.closest('table').tBodies)
		            tBody.append(...[...tBody.rows].sort(comparator(index, order)));

		        for(const cell of target.parentNode.cells)
		            cell.classList.toggle('sorted', cell === target);
		    };
		    
		    document.querySelectorAll('.table_sort thead').forEach(tableTH => tableTH.addEventListener('click', () => getSort(event)));
		});
	</script>
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
					<div class="row" style="margin-top: 0.5em;">
						<div class="col-md-12 table-responsive">
							<table class="table table-dark table-striped text-center table_sort">
								<thead>
									<tr>
										<th>ID</th>
										<th>Кто изменил</th>
										<th>Дата</th>
										<th>Что делал</th>
										<th>№ сертификата</th>
										<th>Фамилия</th>
										<th>Имя</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$months = array(1 => 'Января', 'Февраля', 'Марта', 'Апреля', 'Мая', 'Июня', 'Июля', 'Августа', 'Сентября', 'Октября', 'Ноября', 'Декабря');
										$r = mysqli_query($link, "SELECT * FROM `logs` ORDER BY `Id` DESC");
										if (mysqli_num_rows($r) > 0)
										{
											while ($f = mysqli_fetch_array($r))
											{
												if ($f["Type"] == 1)
												{
													$type = "<span style='color: green; font-weight: bold;'>Добавление</span>";
												}
												else
												{
													$type = "<span style='color: red; font-weight: bold;'>Удаление</span>";
												}
												echo '
													<tr>
														<td>'.$f["Id"].'</td>
														<td>'.$f["User_Email"].'</td>
														<td>'.date("j ".$months[date("n")]." Y в G:i", strtotime($f["Date"])).'</td>
														<td>'.$type.'</td>
														<td>'.$f["Certificate_Number"].'</td>
														<td>'.$f["Lastname"].'</td>
														<td>'.$f["Firstname"].'</td>
													</tr>
												';
											}
										}
										else
										{
											echo '
												<tr>
													<td colspan="7">В данном разделе пока что отсутствуют записи</td>
												</tr>
											';
										}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>