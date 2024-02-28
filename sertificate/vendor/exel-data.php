<?php
session_start();

// Проверяем, был ли загружен файл
if ($_FILES['file']['error'] === UPLOAD_ERR_OK) {
    require_once 'PHPExcel.php'; // Подключаем библиотеку PHPExcel

    // Путь к загруженному файлу
    $uploadedFile = $_FILES['file']['tmp_name'];

    // Загружаем файл с помощью PHPExcel
    $objPHPExcel = PHPExcel_IOFactory::load($uploadedFile);
    $sheet = $objPHPExcel->getActiveSheet();

    $data = array();

    // Проходим по каждой строке в файле и получаем данные
    for ($row = 2; $row <= $sheet->getHighestDataRow(); $row++) {
        $name = $sheet->getCellByColumnAndRow(0, $row)->getValue();
        $surname = $sheet->getCellByColumnAndRow(1, $row)->getValue();

        $data[] = array(
            'name' => $name,
            'surname' => $surname
        );
    }

    // Сохраняем данные в сессии и возвращаем их в формате JSON
    $_SESSION['ExcelUsers'] = json_encode($data, JSON_UNESCAPED_UNICODE);
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
} else {
    // Если произошла ошибка при загрузке файла, возвращаем сообщение об ошибке
    echo 'Ошибка при загрузке файла';
}
?>