
saveButton.addEventListener("mousemove",()=>{
    scrinCanvas();
  })
  
  canvas.addEventListener("mouseleave",()=>{
    scrinCanvas();
  })
  

function scrinCanvas(){
    styleNone();
    html2canvas(document.getElementById('holst')).then(function (canvas) {
        const scrimg = document.getElementById('scrimg');     
        scrimg.value = canvas.toDataURL("image/jpeg");
    });
    styleAdd(); 
  };