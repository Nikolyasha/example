<?php
	session_start();
	if (!($_SESSION["auth_certif"] == "Yes"))
	{
		header('Location: index');
	}

	if (intval($_SESSION["admin"])  === 0)
	{   unset($_SESSION["auth_certif"]);
		unset($_SESSION["email"]);
		unset($_SESSION["count_row"]);
		unset($_SESSION["admin"]);
		setcookie("rememberme","",0,"/");   
		header("Location: auth.php");        
	}

	include("handlers/db.php");
	include_once("handlers/functions.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Система верификации - Главная страница</title>
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
				<div class="text-center" style="margin-top: 2em;" id="count_row_div">
					<h6 style="font-weight: bold; color: white; text-align: center;">Количество записей:</h6>
					<select class="selectpicker show-tick form-control" id="select_group2" data-width="fit">
						<?php
							switch ($_SESSION["count_row"]) {
							    case 25:
							    	echo '
							    		<option value="25" selected="selected">25</option>
										<option value="50">50</option>
										<option value="100">100</option>
										<option value="200">200</option>
							    	';
							    	break;
							    case 50:
							    	echo '
							    		<option value="25">25</option>
										<option value="50" selected="selected">50</option>
										<option value="100">100</option>
										<option value="200">200</option>
							    	';
							    	break;
							    case 100:
							    	echo '
							    		<option value="25">25</option>
										<option value="50">50</option>
										<option value="100" selected="selected">100</option>
										<option value="200">200</option>
							    	';
							    	break;
							    case 200:
							    	echo '
							    		<option value="25">25</option>
										<option value="50">50</option>
										<option value="100">100</option>
										<option value="200" selected="selected">200</option>
							    	';
							    	break;
							}
						?>
					</select>
				</div>
			</div>
			<div class="col-md-10 no-margin-padding">
				<div class="container-fluid">
					<div class="row text-center">
						<div class="col-md-3">
							<button class="btn btn-info btn-block" id="create_data" style="margin-top: 0.5em; font-weight: bold;">Добавить запись</button>
						</div>
						<div class="col-md-3" style="margin-top: 0.5em;">
							<select class="selectpicker show-tick form-control" id="select_group1" title="Тип поиска">
								<option value="1">№ сертификата</option>
								<option value="2">Тема</option>
								<option value="3">Фамилия</option>
								<option value="4">Имя</option>
							</select>
						</div>
						<div class="col-md-4" style="margin-top: 0.5em;">
							<input type="text" class="form-control" id="data_search" disabled="disabled" />
						</div>
						<div class="col-md-2" style="margin-top: 0.5em;">
							<button class="btn btn-danger btn-block" id="clear_search" disabled="disabled" style="font-weight: bold;">Очистить</button>
						</div>
					</div>
					<div class="row" style="margin-top: 0.5em;">
						<div class="col-md-12 table-responsive">
							<table class="table table-dark table-striped text-center table_sort" id="data_table">
								<thead>
									<tr>
										<th>ID</th>
										<th>№ сертификата</th>
										<th>Тема</th>
										<th>Дата получения</th>
										<th>Фамилия</th>
										<th>Имя</th>
										<th>Изображение</th>
										<th>Действие</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$num = $_SESSION["count_row"];
									    $page = (int)$_GET["page"];              
										$count = mysqli_query($link, "SELECT COUNT(*) FROM `data`");
									    $temp = mysqli_fetch_array($count);
										If ($temp[0] > 0)
										{  
											$tempcount = $temp[0];
											$total = (($tempcount - 1) / $num) + 1;
											$total =  intval($total);
											$page = intval($page);
											if (empty($page) or $page < 0)
											{
												$page = 1;
											}    
											if ($page > $total)
											{
												$page = $total;
											}
											$start = $page * $num - $num;
											$query_start_num = " LIMIT $start, $num"; 
										}
										$r = mysqli_query($link, "SELECT * FROM `data` ORDER BY `Id` DESC $query_start_num");
										if (mysqli_num_rows($r) > 0)
										{
											while ($f = mysqli_fetch_array($r))
											{
												if ($f["Image"] == "")
												{
													$img = "no_photo.jpg";
												}
												else
												{
													$img = $f["Image"];
												}
												echo '
													<tr>
														<td>'.$f["Id"].'</td>
														<td>'.$f["Certificate_Number"].'</td>
														<td>'.$f["Topic"].'</td>
														<td>'.date("j.m.Y", strtotime($f["Date_Of_Receiving"])).'</td>
														<td>'.$f["Lastname"].'</td>
														<td>'.$f["Firstname"].'</td>
														<td><img src="certificates/'.$img.'" class="image_cert" style="height: 75px; width: 75px;" /></td>
														<td><button class="btn btn-danger btn-block data_delete" data-src="'.$f["Id"].'" style="font-weight: bold;">Удалить</button></td>
													</tr>
												';
											}
										}
										else
										{
											echo '
												<tr>
													<td colspan="8">В данном разделе пока что отсутствуют записи</td>
												</tr>
											';
										}
									?>
								</tbody>
							</table>
						</div>
					</div>
					<?php
						if ($page != 1) $pstr_prev = '<li class="page-item"><a class="page-link" href="homepage.php?&page='.($page - 1).'"><<</a></li>';
						if ($page != $total) $pstr_next = '<li class="page-item"><a class="page-link" href="homepage.php?&page='.($page + 1).'">>></a></li>';

						if($page - 5 > 0) $page5left = '<li class="page-item"><a class="page-link" href="homepage.php?&page='.($page - 5).'">'.($page - 5).'</a></li>';
						if($page - 4 > 0) $page4left = '<li class="page-item"><a class="page-link" href="homepage.php?&page='.($page - 4).'">'.($page - 4).'</a></li>';
						if($page - 3 > 0) $page3left = '<li class="page-item"><a class="page-link" href="homepage.php?&page='.($page - 3).'">'.($page - 3).'</a></li>';
						if($page - 2 > 0) $page2left = '<li class="page-item"><a class="page-link" href="homepage.php?&page='.($page - 2).'">'.($page - 2).'</a></li>';
						if($page - 1 > 0) $page1left = '<li class="page-item"><a class="page-link" href="homepage.php?&page='.($page - 1).'">'.($page - 1).'</a></li>';

						if($page + 5 <= $total) $page5right = '<li class="page-item"><a class="page-link" href="homepage.php?&page='.($page + 5).'">'.($page + 5).'</a></li>';
						if($page + 4 <= $total) $page4right = '<li class="page-item"><a class="page-link" href="homepage.php?&page='.($page + 4).'">'.($page + 4).'</a></li>';
						if($page + 3 <= $total) $page3right = '<li class="page-item"><a class="page-link" href="homepage.php?&page='.($page + 3).'">'.($page + 3).'</a></li>';
						if($page + 2 <= $total) $page2right = '<li class="page-item"><a class="page-link" href="homepage.php?&page='.($page + 2).'">'.($page + 2).'</a></li>';
						if($page + 1 <= $total) $page1right = '<li class="page-item"><a class="page-link" href="homepage.php?&page='.($page + 1).'">'.($page + 1).'</a></li>';

						if ($page+5 < $total)
						{
						    $strtotal = '<li class="page-item"><p class="page-link">...</p></li><li class="page-item"><a class="page-link" href="homepage.php?&page='.$total.'">'.$total.'</a></li>';
						}
						else
						{
						    $strtotal = ""; 
						}

						if ($total > 1)
						{
						    echo '
							    <nav id="pagination_menu">
  									<ul class="pagination pagination-lg justify-content-center">
						    ';
						    echo $pstr_prev.$page5left.$page4left.$page3left.$page2left.$page1left."<li class='page-item'><a class='page-link' href='homepage.php?&page=".$page."'>".$page."</a></li>".$page1right.$page2right.$page3right.$page4right.$page5right.$strtotal.$pstr_next;
						    echo '
							    	</ul>
								</nav>
						    ';
						}
					?>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="Modal1" tabindex="-1" role="dialog" aria-labelledby="Modal1" aria-hidden="true">
		<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Создание записи</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
					<div class="row text-right vertical-align" style="min-height: 3.5em;">
						<div class="col-md-4 offset-1">
							<h5>Введите № сертификата:</h5>
						</div>
						<div class="col-md-6">
							  <input type="text" class="form-control" id="data_number_cert" />
							  <div class="invalid-feedback">
					        	Поле "№ сертификата" не может быть пустым
					      	</div>
						</div>
					</div>
					<div class="row text-right vertical-align" style="min-height: 3.5em;">
						<div class="col-md-4 offset-1">
							<h5>Введите тему:</h5>
						</div>
						<div class="col-md-6">
							  <input type="text" class="form-control" id="data_topic" />
							  <div class="invalid-feedback">
					        	Поле "Тема" не может быть пустым
					      	</div>
						</div>
					</div>
			      	<div class="row text-right vertical-align" style="min-height: 3.5em;">
						<div class="col-md-4 offset-1">
							<h5>Введите дату получения:</h5>
						</div>
						<div class="col-md-6">
							  <input type="date" class="form-control" id="data_date_receiving" />
							  <div class="invalid-feedback">
					        	Поле "Дата получения" не может быть пустым
					      	</div>
						</div>
					</div>
					<div class="row text-right vertical-align" style="min-height: 3.5em;">
						<div class="col-md-4 offset-1">
							<h5>Введите фамилию:</h5>
						</div>
						<div class="col-md-6">
							  <input type="text" class="form-control" id="data_lastname" />
							  <div class="invalid-feedback">
					        	Поле "Фамилия" не может быть пустым
					      	</div>
						</div>
					</div>
					<div class="row text-right vertical-align" style="min-height: 3.5em;">
						<div class="col-md-4 offset-1">
							<h5>Введите имя:</h5>
						</div>
						<div class="col-md-6">
							  <input type="text" class="form-control" id="data_firstname" />
							  <div class="invalid-feedback">
					        	Поле "Имя" не может быть пустым
					      	</div>
						</div>
					</div>
					<div class="row text-right vertical-align" style="min-height: 3.5em;">
						<div class="col-md-4 offset-1">
							<h5>Выберите фото сертификата:</h5>
						</div>
						<div class="col-md-6">
							  <input type="file" class="form-control-file" id="data_image_input">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-danger" data-dismiss="modal">Закрыть</button>
					<button class="btn btn-success" id="submit_request_data">Сохранить</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="Modal1" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Удаление записи</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
					<h5 class="text-center" style="font-weight: bold;">Вы действительно хотите удалить запись?</h5>
					<div class="row text-right vertical-align" style="min-height: 3.5em;">
						<div class="col-md-5">
							<h5>Пароль:</h5>
						</div>
						<div class="col-md-6">
							  <input type="text" class="form-control" id="delete_data_password" />
							  <div class="invalid-feedback">
					        	Поле "Пароль" не может быть пустым
					      	</div>
						</div>
					</div>
					<h5 class="no-margin-padding" style="" id="delete_modal_check_password">Некорректный пароль</h5>
				</div>
				<div class="modal-footer">
					<button class="btn btn-success" data-dismiss="modal" style="padding-left: 2em; padding-right: 2em;">Нет</button>
					<button class="btn btn-danger" id="submit_delete_data" style="padding-left: 2em; padding-right: 2em;">Да</button>
				</div>
			</div>
		</div>
	</div>
</body>
</html>