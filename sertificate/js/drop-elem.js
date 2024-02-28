document.addEventListener("DOMContentLoaded", () => {
  
    canvas.addEventListener("drop", drop);
    canvas.addEventListener("dragover", allowDrop);
    
    function allowDrop(event) {
      event.preventDefault();
    }
    
    
    function drop(event) {

        event.preventDefault();
        const offsetX = event.offsetX;
        const offsetY = event.offsetY;    
    
        if(currentDragElem=="elemImg"){
          const el = document.createElement("img");  
          elemBuilder(el,offsetX,offsetY);
          el.src="img/dok.png";
          el.style.width=150+"px"; 
          canvas.appendChild(el);
          elemsOnCanvas=canvas.children;
          editorBilder(currentDragElem);
          styleEl(el.id);
    
        }else if(currentDragElem=="elemNum"){
          const el = document.createElement("div");
          elemBuilder(el,offsetX,offsetY);
          canvas.appendChild(el);   
          elemsOnCanvas=canvas.children;
          editorBilder(currentDragElem);
          styleEl(el.id);
    
          //block second item
          const toolNum = document.getElementById("elemNum");
          toolNum.draggable = false;
          toolNum.classList.remove('tool-item');
          toolNum.classList.add('tool-item-block');
    
        }else if(currentDragElem=="elemTheme"){
          const el = document.createElement("div");  
          elemBuilder(el,offsetX,offsetY);
          canvas.appendChild(el);
          elemsOnCanvas=canvas.children;
          editorBilder(currentDragElem);
          styleEl(el.id);
    
          //block second item
          const toolTheme = document.getElementById("elemTheme");
          toolTheme.draggable = false;
          toolTheme.classList.remove('tool-item');
          toolTheme.classList.add('tool-item-block');
    
        }else if(currentDragElem=="elemDate"){
          const el = document.createElement("div");  
          elemBuilder(el,offsetX,offsetY);
          canvas.appendChild(el);
          elemsOnCanvas=canvas.children;
          editorBilder(currentDragElem);
          styleEl(el.id);
    
          //block second item
          const toolDate = document.getElementById("elemDate");
          toolDate.draggable = false;
          toolDate.classList.remove('tool-item');
          toolDate.classList.add('tool-item-block');
    
        }else if(currentDragElem=="elemName"){
          const el = document.createElement("div");  
          elemBuilder(el,offsetX,offsetY);
          canvas.appendChild(el);
          elemsOnCanvas=canvas.children;
          editorBilder(currentDragElem);
          styleEl(el.id);
    
          //block second item
          const toolName = document.getElementById("elemName");
          toolName.draggable = false;
          toolName.classList.remove('tool-item');
          toolName.classList.add('tool-item-block');
    
        } else {
          const el = document.createElement("div");
          elemBuilder(el,offsetX,offsetY);
          canvas.appendChild(el);   
          elemsOnCanvas=canvas.children;
          editorBilder(currentDragElem);
          styleEl(el.id);
        };
        
        dropdownContainer=document.querySelectorAll(".dropdown_container");
        dropdownButton=document.querySelectorAll(".dropdown_button-img");
        dropdownMenu=document.querySelectorAll(".dropdown_menu_wrapper");
        colorPickerButton=document.querySelectorAll(".color_picker_button");
        colorPickerPalette=document.querySelectorAll(".color_picker_palette");
        colorPickerAlign=document.querySelectorAll(".color_picker_align-img");
        colorPickerAlignDropdown=document.querySelectorAll(".color_picker_align-dropdown");
        colorPickerAlignWrapper=document.querySelectorAll(".color_picker_align-dropdown-wrapper");
        selectDropdown=document.querySelectorAll(".select_dropdown");
        valueFont=document.querySelectorAll(".value_font");
        boldButton=document.querySelectorAll(".bold");
        italicButton=document.querySelectorAll(".italic");
        underlineButton=document.querySelectorAll(".underline");
        isNotActive=document.querySelectorAll(".isNotActive");
    
    }
    
    function elemBuilder(el,offsetX,offsetY){
        el.style.position = "absolute";
        el.style.left = offsetX - 130 + "px";
        el.style.top = offsetY - 40 + "px";
        countInputs++;
        el.id = countInputs;        
        el.placeholder = el.id;
        el.classList.add("isNotActive");
        el.classList.add("elem-canvas");
        el.classList.add("border-elem")
        if(currentDragElem=="elemImg") {
          keepRatio = true;
          prevEvDefult=true;
          el.style.height="auto";
          el.style.left = offsetX - 73 + "px";
          el.style.top = offsetY - 70 + "px";
          el.onmousedown=AddMoveable(el);
        }
        else {
          el.insertAdjacentHTML("afterbegin",
          `
          <div class="dropdown_container" id="${countInputs}">
                <div class="dropdown_button">
                  <img src="img/dropdown.svg" alt="" class="dropdown_button-img" id="${countInputs}" onclick="clickDropdownButton(event)" draggable="false">
                </div>
                <div class="dropdown_menu_wrapper point_dropdown" id="${countInputs}">
                  <div class="dropdown_menu point_dropdown">
                  <select name="" id="${countInputs}" class="select_dropdown point_dropdown">
                    <option class="point_dropdown" value="Alegreya" style="font-family:'Alegreya'">Alegreya</option>
                    <option class="point_dropdown" value="Alegreya SC" style="font-family:'Alegreya SC';">Alegreya SC</option>
                    <option class="point_dropdown" value="Alegreya Sans" style="font-family:'Alegreya Sans';">Alegreya Sans</option>
                    <option class="point_dropdown" value="Alice" style="font-family:'Alice';">Alice</option>
                    <option class="point_dropdown" value="Amatic SC" style="font-family:'Amatic SC';">Amatic SC</option>
                    <option class="point_dropdown" value="Bad Script" style="font-family:'Bad Script';">Bad Script</option>
                    <option class="point_dropdown" value="Comfortaa" style="font-family:'Comfortaa';">Comfortaa</option>
                    <option class="point_dropdown" value="Lobster" style="font-family:'Lobster';">Lobster</option>
                    <option class="point_dropdown" value="Merriweather" style="font-family:'Merriweather';">Merriweather</option>
                    <option class="point_dropdown" value="Montserrat" style="font-family:'Montserrat';">Montserrat</option>
                    <option class="point_dropdown" value="Open Sans" style="font-family:'Open Sans';">Open Sans</option>
                    <option class="point_dropdown" value="Oswald" style="font-family:'Oswald';">Oswald</option>
                    <option class="point_dropdown" value="PT Serif" style="font-family:'PT Serif';">PT Serif</option>
                    <option class="point_dropdown" value="Pacifico" style="font-family:'Pacifico';">Pacifico</option>
                    <option class="point_dropdown" value="Pangolin" style="font-family:'Pangolin';">Pangolin</option>
                    <option class="point_dropdown" value="Pattaya" style="font-family:'Pattaya';">Pattaya</option>
                    <option class="point_dropdown" value="Playfair Display" style="font-family:'Playfair Display';">Playfair Display</option>
                    <option class="point_dropdown" value="Roboto" style="font-family:'Roboto';">Roboto</option>
                    <option class="point_dropdown" value="Ruslan Display" style="font-family:'Ruslan Display';">Ruslan Display</option>
                  </select>
                  
                  <input type="number" name="" id="${countInputs}" value="14" class="value_font point_dropdown">
    
                  <button class="bold point_dropdown" id="${countInputs}">B</button>
                  <button class="italic point_dropdown"  id="${countInputs}">I</button>
                  <button class="underline point_dropdown" id="${countInputs}">U</button>
    
                  
                  <div class="color_picker_button" id="${countInputs}" onclick="clickColorPicker(event)">
                    <div class="color_picker_palette" id="${countInputs}">
                      <div class="color_picker_palette-wrapper">
                      <div class="column_black column_palette">
                        <div class="color_picker_palette-item" style="background:black"></div>
                        <div class="color_picker_palette-item" style="background:#980000"></div>
                        <div class="color_picker_palette-item" style="background:#e6b8af"></div>
                        <div class="color_picker_palette-item" style="background:#dd7e6b"></div>
                        <div class="color_picker_palette-item" style="background:#cc4125"></div>
                        <div class="color_picker_palette-item" style="background:#a61c00"></div>
                        <div class="color_picker_palette-item" style="background:#85200c"></div>
                        <div class="color_picker_palette-item" style="background:#5b0f00"></div>
                      </div>
                      <div class="column_red column_palette">
                        <div class="color_picker_palette-item" style="background:#434343"></div>
                        <div class="color_picker_palette-item" style="background:#ff0000"></div>
                        <div class="color_picker_palette-item" style="background:#f4cccc"></div>
                        <div class="color_picker_palette-item" style="background:#ea9999"></div>
                        <div class="color_picker_palette-item" style="background:#e06666"></div>
                        <div class="color_picker_palette-item" style="background:#cc0000"></div>
                        <div class="color_picker_palette-item" style="background:#990000"></div>
                        <div class="color_picker_palette-item" style="background:#660000"></div>
                      </div>      
                      <div class="column_orange column_palette">
                        <div class="color_picker_palette-item" style="background:#666666"></div>
                        <div class="color_picker_palette-item" style="background:#ff9000"></div>
                        <div class="color_picker_palette-item" style="background:#fce5cd"></div>
                        <div class="color_picker_palette-item" style="background:#f9cb9c"></div>
                        <div class="color_picker_palette-item" style="background:#f6b26b"></div>
                        <div class="color_picker_palette-item" style="background:#e69138"></div>
                        <div class="color_picker_palette-item" style="background:#b45f06"></div>
                        <div class="color_picker_palette-item" style="background:#783f04"></div>
                      </div>                
                      <div class="column_yellow column_palette">
                        <div class="color_picker_palette-item" style="background:#999999"></div>
                        <div class="color_picker_palette-item" style="background:#ffff00"></div>
                        <div class="color_picker_palette-item" style="background:#fff2cc"></div>
                        <div class="color_picker_palette-item" style="background:#ffe599"></div>
                        <div class="color_picker_palette-item" style="background:#ffd966"></div>
                        <div class="color_picker_palette-item" style="background:#f1c232"></div>
                        <div class="color_picker_palette-item" style="background:#bf9000"></div>
                        <div class="color_picker_palette-item" style="background:#7f6000"></div>
                      </div>
                      <div class="column_green column_palette">
                        <div class="color_picker_palette-item" style="background:#b7b7b7"></div>
                        <div class="color_picker_palette-item" style="background:#00ff00"></div>
                        <div class="color_picker_palette-item" style="background:#d9ead3"></div>
                        <div class="color_picker_palette-item" style="background:#b6d7a8"></div>
                        <div class="color_picker_palette-item" style="background:#93c47d"></div>
                        <div class="color_picker_palette-item" style="background:#6aa84f"></div>
                        <div class="color_picker_palette-item" style="background:#38761d"></div>
                        <div class="color_picker_palette-item" style="background:#274e13"></div>
                      </div>
                      <div class="column_cyan column_palette">
                        <div class="color_picker_palette-item" style="background:#cccccc"></div>
                        <div class="color_picker_palette-item" style="background:#00ffff"></div>
                        <div class="color_picker_palette-item" style="background:#d0e0e3"></div>
                        <div class="color_picker_palette-item" style="background:#a2c4c9"></div>
                        <div class="color_picker_palette-item" style="background:#76a5af"></div>
                        <div class="color_picker_palette-item" style="background:#45818e"></div>
                        <div class="color_picker_palette-item" style="background:#134f5c"></div>
                        <div class="color_picker_palette-item" style="background:#0c343d"></div>
                      </div>
                      <div class="column_blue column_palette">
                        <div class="color_picker_palette-item" style="background:#d9d9d9"></div>
                        <div class="color_picker_palette-item" style="background:#4a86e8"></div>
                        <div class="color_picker_palette-item" style="background:#c9daf8"></div>
                        <div class="color_picker_palette-item" style="background:#a4c2f4"></div>
                        <div class="color_picker_palette-item" style="background:#6d9eeb"></div>
                        <div class="color_picker_palette-item" style="background:#3c78d8"></div>
                        <div class="color_picker_palette-item" style="background:#1155cc"></div>
                        <div class="color_picker_palette-item" style="background:#1c4587"></div>
                      </div>
                      <div class="column_darkblue column_palette">
                        <div class="color_picker_palette-item" style="background:#efefef"></div>
                        <div class="color_picker_palette-item" style="background:#0000ff"></div>
                        <div class="color_picker_palette-item" style="background:#cfe2f3"></div>
                        <div class="color_picker_palette-item" style="background:#9fc5e8"></div>
                        <div class="color_picker_palette-item" style="background:#6fa8dc"></div>
                        <div class="color_picker_palette-item" style="background:#3d85c6"></div>
                        <div class="color_picker_palette-item" style="background:#0b5394"></div>
                        <div class="color_picker_palette-item" style="background:#073763"></div>
                      </div>
                      <div class="column_purple column_palette">
                        <div class="color_picker_palette-item" style="background:#f3f3f3"></div>
                        <div class="color_picker_palette-item" style="background:#9900ff"></div>
                        <div class="color_picker_palette-item" style="background:#d9d2e9"></div>
                        <div class="color_picker_palette-item" style="background:#b4a7d6"></div>
                        <div class="color_picker_palette-item" style="background:#8e7cc3"></div>
                        <div class="color_picker_palette-item" style="background:#674ea7"></div>
                        <div class="color_picker_palette-item" style="background:#351c75"></div>
                        <div class="color_picker_palette-item" style="background:#20124d"></div>
                      </div>
                      <div class="column_pink column_palette last_column">
                        <div class="color_picker_palette-item" style="background:#ffffff"></div>
                        <div class="color_picker_palette-item" style="background:#ff00ff"></div>
                        <div class="color_picker_palette-item" style="background:#ead1dc"></div>
                        <div class="color_picker_palette-item" style="background:#d5a6bd"></div>
                        <div class="color_picker_palette-item" style="background:#c27ba0"></div>
                        <div class="color_picker_palette-item" style="background:#a64d79"></div>
                        <div class="color_picker_palette-item" style="background:#741b47"></div>
                        <div class="color_picker_palette-item" style="background:#4c1130"></div>
                      </div>
                      </div>
                      
    
                    </div>
                  </div>
    
                  <div class="color_picker_align point_dropdown">
                    <img src="img/align-center.svg" alt="" class="color_picker_align-img point_dropdown" id="${countInputs}" onclick="clickAlignPicker(event)" draggable="false">
    
                    <div class="color_picker_align-dropdown" id="${countInputs}">
                    <div class="color_picker_align-dropdown-wrapper point_dropdown"  id="${countInputs}">
                      <div class="align-dropdown-wrapper-item point_dropdown">
                        <img src="img/align-center.svg" alt="center" class="point_dropdown align-dropdown-wrapper-img"draggable="false">
                      </div>
                      <div class="align-dropdown-wrapper-item point_dropdown">
                        <img src="img/align-justify.svg" alt="justify" class="point_dropdown align-dropdown-wrapper-img"draggable="false">
                      </div>
                      <div class="align-dropdown-wrapper-item point_dropdown">
                        <img src="img/align-left.svg" alt="start" class="point_dropdown align-dropdown-wrapper-img"draggable="false">
                      </div>
                      <div class="align-dropdown-wrapper-item point_dropdown">
                        <img src="img/align-right.svg" alt="end" class="point_dropdown align-dropdown-wrapper-img"draggable="false">
                      </div>
                    </div>
                    </div>
                  </div>
                  </div>
                </div>
                
              </div>
              
          `);
          keepRatio = false;
          prevEvDefult=false;
          el.firstChild.textContent = nameOfEditor[`${currentDragElem}`];
          el.onmousedown=AddMoveable(el);
    
        }
    
        return el;
      };
    
    function editorBilder(currDragElem){
    
        const htmlInput={
          "elemNum":`<input type="text" id="${countInputs}" class="count-elem-${countInputs} inputEditor num" name="num" value="Номер сертификата">`,
          "elemTheme":`<input type="text" id="${countInputs}" class="count-elem-${countInputs} inputEditor thema" name="thema" value="Тема сертификата">`,
          "elemDate":`<input type="date" id="${countInputs}" class="count-elem-${countInputs} inputEditor date" name="date" value="Дата сертификата">`,
          "elemName":`<input type="text" id="${countInputs}" class="count-elem-${countInputs} inputEditor fullname" name="fullname" value="Имя и фамилия">`,
          "elemImg":`<input type="file" id="${countInputs}" class="count-elem-${countInputs} inputEditor" name="img" value="Изображение">`,
          "elemTxt":`<input type="text" id="${countInputs}" class="count-elem-${countInputs} inputEditor" value="Текст">`,
        };
        editorForm.insertAdjacentHTML("afterbegin",
            `
              <div class="editor-item editorBlock-${countInputs}" id="${countInputs}">
                <label for="" class="label_editor-${countInputs}">
                 ${nameOfEditor[`${currDragElem}`]}
               </label>
                ${htmlInput[`${currDragElem}`]}
               <input type="button" id="${countInputs}" onclick="onDelete(event)" class="remove-button" value="Удалить элемент">
             </div>
            `
          );
    }
    
    function styleEl(obj) {
        let elem =  document.getElementById(`${obj}`);
        elem.classList.add("elem-canvas");
    
    }

    
   
  });