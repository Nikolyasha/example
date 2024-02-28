<?php
	$link = mysqli_connect(
		'localhost', 			//Õîñò
		'root', 				//Èìÿ ïîëüçîâàåëÿ
		'', 					//Ïàðîëü ïîëüçîâàòåëÿ
		'certificates_db'					//Èìÿ ÁÄ
	);
	mysqli_set_charset($link, 'utf8');
?>