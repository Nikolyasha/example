<?php
	
	//В этом коде ошибка, сервак не обрабатывает запрос, выбивает 500-ую ошибку, на локальном серваке все норм работает

	/*include("functions.php");
	$filename = random_str(20);
    move_uploaded_file($_FILES["file"]["tmp_name"], '../certificates/'.$filename.'.'.pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION));
    echo $filename.'.'.pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);*/
    move_uploaded_file($_FILES['file']['tmp_name'], '../certificates/'.$_FILES['file']['name']);
?>