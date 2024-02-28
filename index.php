<?php
	session_start();
	include("handlers/db.php");
	include_once("handlers/functions.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Система верификации - Проверка</title>
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
	<?php
		$r = mysqli_query($link, "SELECT * FROM `search_page_info`");
		if (mysqli_num_rows($r) > 0)
		{
			$f = mysqli_fetch_array($r);
		}
	?>
	<div class="container-fluid">
		<div class="row" style="margin-top: 0.5em;">
			<div class="col-md-6 offset-3 text-center">
				<img src="img/<?php echo $f["Image"]; ?>" style="height: 7em;" />
			</div>
		</div>
		<div class="row" style="margin-top: 0.5em;">
			<div class="col-md-6 offset-3 text-center">
				<h4 style="font-weight: bold;"><?php echo $f["Title"]; ?></h4>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8 offset-2 text-center">
				<h6 style="font-weight: bold;"><?php echo $f["Description"]; ?></h6>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3" style="margin-top: 0.5em;">
				<select class="selectpicker show-tick form-control" id="select_group3" title="Тип поиска">
					<option value="1" selected="selected">№ сертификата</option>
					<option value="2">Фамилия</option>
				</select>
			</div>
			<div class="col-md-5" style="margin-top: 0.5em;">
				<input type="text" class="form-control" id="data_search1" />
				<div class="invalid-feedback">
		        	Минимальная длина 2 символа
		      	</div>
			</div>
			<div class="col-md-2" style="margin-top: 0.5em;">
				<button class="btn btn-success btn-block" id="s_search1" style="font-weight: bold;">Поиск</button>
			</div>
			<div class="col-md-2" style="margin-top: 0.5em;">
				<button class="btn btn-danger btn-block" id="clear_search1" style="font-weight: bold;">Очистить</button>
			</div>
		</div>
		<div class="row" style="margin-top: 1em;">
			<div class="col-md-12 table-responsive">
				<table class="table table-dark table-striped text-center table_sort" id="data_table_search">
					<thead>
						<tr>
							<th>№ сертификата</th>
							<th>Тема</th>
							<th>Дата получения</th>
							<th>Фамилия</th>
							<th>Имя</th>
							<th>Изображение</th>
						</tr>
					</thead>
					<tbody></tbody>
				</table>
			</div>
		</div>
		<div class="row loaderr">
			<div class="col-md-12">
				<div class='cssload-loader'>
					<div class='cssload-inner cssload-one'></div>
		  			<div class='cssload-inner cssload-two'></div>
		  			<div class='cssload-inner cssload-three'></div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>