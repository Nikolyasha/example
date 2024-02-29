let dataExcel;
document.querySelector(".btn-excel").addEventListener("change",function(){
    let file= this.files[0];
    let formData = new FormData();
    formData.append('file', file);
    $.ajax({
        url: 'vendor/exel-data.php',         /* Куда пойдет запрос */
        method: 'POST',             /* Метод передачи (post или get) */
        data: formData,
        processData: false, // Не обрабатываем данные перед отправкой
        contentType: false,     /* Параметры передаваемые в запросе. */
        success: function(data){   /* функция которая будет выполнена после успешного запроса.  */
            createTableFromJSON(data);
            dataExcel=JSON.parse(data);
            let countJson=Object.keys(dataExcel).length
            console.log(dataExcel[2].name)         /* В переменной data содержится ответ от index.php. */
        }
    });
});

  // Добавим событие на кнопку
  document.querySelector(".btn-export-Excel").addEventListener("click", () => {
    window.scroll(0, 0);
    
    // Настройки PDF
    const pdfConfig = {
        filename: 'certificates.zip', // Название архива
        type: 'blob', // Тип файла архива
    };
  
    // Создаем объект JSZip для создания архива
    let zip = new JSZip();
  
    // Функция для добавления сертификата в архив
    function addCertificateToZip(index) {
            styleNone();
            document.querySelector(".nameOfUser").textContent=`${dataExcel[index].name} ${dataExcel[index].surname}`
            const certificateName = `certificate_${index}.pdf`; // Название сертификата
            const certificateConfig = {
                filename: certificateName,
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'mm', format: 'a4', orientation: 'landscape' } // Установите ориентацию 'landscape' для горизонтального формата
            };
      
            // Если canvas вертикальный, измените настройки для портретного формата
            if (!isCanvasHorizont) {
                certificateConfig.html2canvas = { scale: 2, windowWidth: document.documentElement.clientWidth, windowHeight: document.documentElement.clientHeight };
                certificateConfig.jsPDF = { unit: 'mm', format: 'a4', orientation: 'portrait' };
            }
      
            // Создаем PDF и добавляем его в архив
            html2pdf()
                .from(canvas)
                .set(certificateConfig)
                .outputPdf('blob') // Важно указать тип данных 'blob'
                .then(pdf => {
                    zip.file(certificateName, pdf); // Добавляем PDF в архив
                    if (index === numberOfCertificates - 1) { // Если это последний сертификат
                        zip.generateAsync({ type: 'blob' }) // Генерируем архив
                            .then(content => {
                                // Скачиваем архив
                                saveAs(content, pdfConfig.filename);
                            })
                            .catch(error => {
                                console.error('Ошибка при генерации архива:', error);
                            });
                    }
                })
                .catch(error => {
                    console.error('Ошибка при создании PDF:', error);
                });
                console.log("done");
    }
  
    // Количество сертификатов, которые вы хотите создать
    let numberOfCertificates = Object.keys(dataExcel).length; // Например, создадим 5 сертификатов
  
    // Создаем каждый сертификат и добавляем его в архив
    for (let i = 0; i < numberOfCertificates; i++) {
        setTimeout(() => {
            addCertificateToZip(i); 
        }, 500);
        if(i==numberOfCertificates-1){
            styleAdd();
        };
    };
  
    // Восстанавливаем стили после создания архива
  });

  document.querySelector(".remText").addEventListener("click",()=>{
    removeText();
  })
  function removeText(){
    document.querySelector(".nameOfUser").textContent="asdasdas"
  }
function createTableFromJSON(data) {
    document.querySelector(".footer-wrapper").style.display="flex";
    let table = document.getElementById("data-table");
    table.innerHTML="<tr> <th>Имя</th><th>Фамилия</th> </tr>";
    table.insertAdjacentHTML("afterbegin",``)
    console.log(data)
    console.log(JSON.parse(data, null, 2));
    let jsonDate = JSON.parse(data, null, 2)
    // // Создаем строки и заполняем данными
    for (const item of jsonDate) {
        console.log(item.name+' '+item.surname);
        let trElem = document.createElement("tr");
        trElem.insertAdjacentHTML("afterbegin",`<td>${item.name}</td><td>${item.surname}</td>`);
        table.appendChild(trElem);
    }
}
