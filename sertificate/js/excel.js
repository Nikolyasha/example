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
            createTableFromJSON(data);           /* В переменной data содержится ответ от index.php. */
        }
    });
});

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
