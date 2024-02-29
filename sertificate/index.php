<?php
	session_start();
  
  if (!($_SESSION["auth_certif"] == "Yes"))
	{
		header('Location: ../auth');
	}
	
	if (isset($_SESSION["errormsg"])) 
  {
    $msg = $_SESSION["errormsg"];
    unset($_SESSION["errormsg"]);
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Alegreya+SC:ital,wght@0,400;0,500;0,700;0,800;1,400;1,500;1,700;1,800&family=Alegreya+Sans:ital,wght@0,300;0,400;0,500;0,700;0,800;1,300;1,400;1,500;1,700;1,800&family=Alegreya:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,600;1,700;1,800&family=Alice&family=Amatic+SC:wght@400;700&family=Bad+Script&family=Comfortaa:wght@300;400;500;600;700&family=Lobster&family=Merriweather:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Oswald:wght@300;400;500;600;700&family=PT+Serif:ital,wght@0,400;0,700;1,400;1,700&family=Pacifico&family=Pangolin&family=Pattaya&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,600;1,700;1,800&family=Raleway:wght@100;200;300;400;500;600;700;800;900&family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&family=Ruslan+Display&display=swap" rel="stylesheet">
</head>
<body>

<header>
      <div class="import_export-container">
        <select class="canvasSize btn">
          <option class="optionCanvasSize" value="option1">А4-горизонтальный</option>
          <option class="optionCanvasSize" value="option2">А4-Вертикальный</option>
        </select>
        <div class="input__wrapper">
          <input name="file" type="file" id="input__file" class="input input__file inputUploadImage " multiple>
          <label for="input__file" class="input__file-button btn">
             <span class="input__file-button-text">Фон сертификата</span>
          </label>
       </div>
        <input type="button" class="buttonPdfDownload btn" title="Экспорт в PDF">
        <input type="button" class="buttonJpegDownload btn" title="Экспорт в JPEG">
        <input type="button" class="buttonPdfView btn" title="Предпросмотр">
      </div>
</header>

  <main>
    <div class="left-menu">
      <div class="logo">
        <img src="img/KlasterWEB.png" alt="">
      </div>
      <div class="tool-item" draggable="true" id="elemNum" >
        <img src="img/number.svg" alt="" draggable="true" id="elemNum">
        <p>Номер <br> сертификата</p>
      </div>
      <div class="tool-item" draggable="true" id="elemTheme">
        <img src="img/label.svg" alt=""draggable="false">
        <p>Тема</p>
      </div>
      <div class="tool-item" draggable="true" id="elemDate">
        <img src="img/calendar.svg" alt=""draggable="false">
        <p>Дата <br>получения</p>
      </div>
      <div class="tool-item" draggable="true" id="elemName">
        <img src="img/person.svg" alt=""draggable="false">
        <p>Имя <br> фамилия</p>
      </div>
      <div class="tool-item" draggable="true" id="elemImg">
        <img src="img/image.svg" alt=""draggable="false">
        <p>Изображение</p>
      </div>
      <div class="tool-item" draggable="true" id="elemTxt">
        <img src="img/text.svg" alt=""draggable="false">
        <p>Текст</p>
      </div>

      <div class="button-exit" onClick="exitButton()">
        Выход
      </div>
      
    </div>
    <div class="content">                  
      <div class="main_zone-container">
        <div id="holst" class="canvas canvas-horizontal "  ondrop="drop(event)" ondragover="allowDrop(event)"">

        </div>                
      </div>
    </div>

    <div class="editor-container">
          <h3>Редактор</h3>
          <div class="editor-main">          
            <form class="editor-form"   method="post">

              <input name="scrimg" id="scrimg" type="hidden">

              <input type="button" class="save-button" value="Сохранить">          
            </form>
            <p class='error'></p>

          </div>
        </div>

       
  </main>
  <footer>
      <div class="menu-footer">
        <input type="file" name="" class="btn-excel" id="" accept=".xlsx, .xls">
        <input type="button" value="Выгрузка по данным Excel" class="btn-export-Excel">
        <button class="remText">sdsdsd</button>
      </div>
    <div class="footer-wrapper">
    <table id="data-table">
        <tr>
            <th>Имя</th>
            <th>Фамилия</th>
        </tr>
    </table>
    </div>
  </footer>

  <script src="js/variables.js"></script>
  <script src="js/add-moveable.js"></script>
  <script src="script.js"></script>
  <script src="js/JsZip/dist/jszip.min.js"></script>
  <script src="js/pdfFormater.js"></script>
  <script src="js/screen-canvas.js"></script>
  <script src="js/drop-elem.js"></script>
  <script src="js/editor-elem.js"></script>


  <script src="js/excel.js"></script>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.0/FileSaver.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>
  <script src="https://daybrush.com/moveable/release/latest/dist/moveable.js"></script>
  <!-- for image -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
  <script src=" https://cdn.jsdelivr.net/npm/canvas2image@1.0.5/canvas2image.min.js "></script>
  <script src="html2pdf.js/dist/html2pdf.bundle.min.js"></script>
  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
      tinymce.init({
        selector: '#mytextarea'
      });
    </script>

 
</body>
</html>