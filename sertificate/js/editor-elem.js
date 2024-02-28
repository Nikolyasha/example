function clickColorPicker(event){
    let idColorPicker=event.target.id;
    for(let colorPP of colorPickerPalette){
      if(colorPP.id==idColorPicker){
        if(colorPP.style.display=="block"){
          colorPP.style.display="none";
        }else{
          colorPP.style.display="block";
        }
      }   
    } 
  };
  
  function clickAlignPicker(event){
    let idAlignPicker=event.target.id;
    for(let alignPP of colorPickerAlignDropdown){
      if(alignPP.id==idAlignPicker){
        if(alignPP.style.display=="block"){
          alignPP.style.display="none";
        }else{
          alignPP.style.display="block";
        }
      }   
    } 
  };
  
  function clickDropdownButton (event){
    
    let idButton=event.target.id;
    for(let dropM of dropdownMenu){
      if(dropM.id==idButton){
        if(dropM.style.display=="block"){
          dropM.style.display="none";
        }else{
          dropM.style.display="block";
        }
      }   
    }     
  };

  editorMain.addEventListener("click",()=>{
    for(let inpt of inputsOnEditor){
      inpt.addEventListener("input",(event)=>{
        const countId=event.target.id;
        for(let elem of elemsOnCanvas){
          if (countId==elem.id){
            elem.firstChild.textContent=event.target.value;
          }
        };
      });
  
      inpt.addEventListener("change",function(event){
        const countId=event.target.id;
        for(let elem of elemsOnCanvas){
          if (countId==elem.id){
            const file_reader = new FileReader();
            file_reader.addEventListener('load', () => {
              const uploaded_image = file_reader.result;
              elem.src =`${uploaded_image}`;
              elem.style.height="auto";
  
            });
            file_reader.readAsDataURL(event.target.files[0]);
          }
        };  
      });
    };
  });
  