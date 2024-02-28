<?php
    session_start();

    if (isset($_POST["num"], $_POST["thema"],  $_POST["date"], $_POST["fullname"], $_POST["scrimg"]))
    {
        $certificate_number = $_POST["num"];
        $topic = $_POST["thema"];
        $date_of_receiving = $_POST["date"];
        $fullname = $_POST["fullname"];

        $name = explode(" ", $fullname);

        $image = $_POST["scrimg"];
        $image = explode(";", $image)[1];
        $image = explode(",", $image)[1];
        $image = str_replace(" ", "+", $image);
        $image = base64_decode($image);

        $today = date("Ymd-His");

        $nameCert = "$today.jpeg";

        file_put_contents("../certificates/$nameCert", $image);

        include("../handlers/db.php");

        $link->query("INSERT INTO data VALUES(NULL, '$certificate_number', '$topic', '$date_of_receiving', '$name[1]', '$name[0]', '$nameCert')");
        
        $_SESSION["errormsg"] = "ok";
        echo 'success';
    }
    else {
        echo 'unsuccess';
        $_SESSION["errormsg"] = "Ошибка. Заполнены не все поля.";        
    }
?>