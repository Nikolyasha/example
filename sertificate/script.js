"use strict";
// for resize img
let keepRatio = false;
let prevEvDefult=false;

leftMenu.addEventListener("dragstart",(event)=>{
  if(event.target.classList.contains("tool-item")){
    currentDragElem=event.target.id;
  };
});



document.addEventListener("click",(event)=>{  
  const moveableElems=document.querySelectorAll(".moveable");
  if(event.target.classList.contains("color_picker_palette-item")){
    const colorValue=event.target.style.background;
    for(const cPButton of colorPickerButton){
      if(cPButton.id==currentElem){
        cPButton.style.background=colorValue;
      };
    };
    for(const elem of elemsOnCanvas){
      if(elem.id==currentElem){
        elem.style.color=colorValue;
      };
    };
  };

  if(event.target.classList.contains("align-dropdown-wrapper-img")){
    const alignValue=event.target.alt;    
    for(const cPAlign of colorPickerAlign){
      if(cPAlign.id==currentElem){
        switch(alignValue){
          case "center":
            cPAlign.src="img/align-center.svg";
            break;
          case "justify":
            cPAlign.src="img/align-justify.svg";
            break;
          case "start":
            cPAlign.src="img/align-left.svg";
            break;
          case "end":
            cPAlign.src="img/align-right.svg";
            break;
              
        };
      };
    };
    for(const elem of elemsOnCanvas){
      if(elem.id==currentElem){
        switch(alignValue){
          case "center":
            elem.style.textAlign=alignValue;
            break;
          case "justify":
            elem.style.textAlign=alignValue;
            break;
          case "start":
            elem.style.textAlign=alignValue;
            break;
          case "end":
            elem.style.textAlign=alignValue;
            break;
      };
    };
  };
  };

  if(event.target.classList.contains("bold")){
    for(const bButton of boldButton){
      if(bButton.id==currentElem){
        if(bButton.style.background=="gray"){
          bButton.style.background="transparent";
          for(const elem of elemsOnCanvas){
            if(elem.id==currentElem){
              elem.style.fontWeight=400;
            };
          };
        }else{
          bButton.style.background="gray";
          for(const elem of elemsOnCanvas){
            if(elem.id==currentElem){
              elem.style.fontWeight=700;
            };
          };
        };
      };
    };
  };

  if(event.target.classList.contains("italic")){
    for(const iButton of italicButton){
      if(iButton.id==currentElem){
        if(iButton.style.background=="gray"){
          iButton.style.background="transparent";
          for(const elem of elemsOnCanvas){
            if(elem.id==currentElem){
              elem.style.fontStyle="normal";
            };
          };
        }else{
          iButton.style.background="gray";
          for(const elem of elemsOnCanvas){
            if(elem.id==currentElem){
              elem.style.fontStyle="italic";
            };
          };
        };
      };
    };
  };

  if(event.target.classList.contains("underline")){
    for(const uButton of underlineButton){
      if(uButton.id==currentElem){
        if(uButton.style.background=="gray"){
          uButton.style.background="transparent";
          for(const elem of elemsOnCanvas){
            if(elem.id==currentElem){
              elem.style.textDecoration="none";
            };
          };
        }else{
          uButton.style.background="gray";
          for(const elem of elemsOnCanvas){
            if(elem.id==currentElem){
              elem.style.textDecoration="underline";
            };
          };
        };
      };
    };
  };

  for(const selDropdown of selectDropdown){
    selDropdown.addEventListener("change",()=>{
      for(const elem of elemsOnCanvas){

        if(elem.id==currentElem){
          elem.style.fontFamily=selDropdown.value;
        };
      };
    });
  };

  for(const valFont of valueFont){
    valFont.addEventListener("change",()=>{      
      for(const elem of elemsOnCanvas){
        if(elem.id==currentElem){
          elem.style.fontSize=valFont.value + "px";
        };
      };
    });
  };
  


  if(!event.target.classList.contains("elem-canvas") &&
     !event.target.classList.contains("dropdown_button-img") &&
     !event.target.classList.contains("point_dropdown") &&
     !event.target.classList.contains("color_picker_button") &&
     !event.target.classList.contains("color_picker_palette-item") &&
     !event.target.classList.contains("column_palette") &&
     !event.target.classList.contains("color_picker_palette-wrapper") &&
     !event.target.classList.contains("color_picker_palette")
  ){
    for(const elem of moveableElems){
      elem.style.display="none";
    };
    for(const elem of elemsOnCanvas){
      elem.classList.remove("elem-canvas-target");
    };
    for(const contDropdown of dropdownContainer){
      contDropdown.style.display="none";
    };
    currentElemOnCanvas=null;  
  }

  for(const item of selectDropdown){
    item.addEventListener("click",()=>{

    });
  }

  
  
  if(!event.target.classList.contains("color_picker_button")){
    for(const cPPalette of colorPickerPalette){
      cPPalette.style.display="none";
    };
  };
  if(!event.target.classList.contains("color_picker_align-img")){
    for(const cPADropdown of colorPickerAlignDropdown){
      cPADropdown.style.display="none";
    };
  };
});

canvas.addEventListener("mousedown",(event)=>{
  if(event.target.classList.contains("elem-canvas")){
    currentElemOnCanvas=event.target.id;
  };
});


//изменения размера холста
canvasSize.addEventListener("change",(event)=>{
  if(event.target.value=='option1'){
    canvas.classList.remove('canvas-vertical');
    canvas.classList.add('canvas-horizontal');
    isCanvasHorizont=true;
    canvasRect = canvas.getBoundingClientRect();
  }
  else 
  if(event.target.value=='option2'){
    canvas.classList.remove('canvas-horizontal');
    canvas.classList.add('canvas-vertical');
    isCanvasHorizont=false;
    canvasRect = canvas.getBoundingClientRect();
  };
});

  

//загрузка фона сертификата
inputUploadImage.addEventListener("change",function(){
  const file_reader = new FileReader();
  file_reader.addEventListener('load', () => {

    const uploaded_image = file_reader.result;
    canvas.style.backgroundImage =
        `url(${uploaded_image})`;
    //scr img
  scrinCanvas();            
  });
  file_reader.readAsDataURL(this.files[0]);
  
});


function onDelete(event){
  inputsOnEditor=editorForm.children;
  const countId=event.target.id;
  for(let elem of elemsOnCanvas){
    if (countId==elem.id){
      canvas.removeChild(elem);
    };
  };
  for(let edtr of inputsOnEditor){
    if (countId==edtr.id){
      editorForm.removeChild(edtr);
    };
  };
};

function exitButton(){
  window.location.href = '../homepage.php';
};


saveButton.addEventListener("click", ()=> {

  // scrinCanvas();
  const data = {
    num: $(".num").val(),
    thema: $(".thema").val(),
    date:$(".date").val(),
    fullname:$(".fullname").val(),
    scrimg:$("#scrimg").val(),

  };

    $.ajax({
      url: 'Insert.php',
      type: 'post',
      data: data,
      success:function(response){
        console.log(response);
        if(response=="success"){
          window.location.href="../auth.php";
        }else if(response=="unsuccess"){          
          document.querySelector(".error").textContent="На холсте отсутсвуют необходимые элементы"
        }
      },
    });

});


