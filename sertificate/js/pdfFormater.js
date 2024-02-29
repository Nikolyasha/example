
function generateAndPreviewPDF() {
    window.scroll(0, 0);
  
    const element = document.querySelector('.canvas');
    const pdfOptions = {
      filename: 'your_file_name.pdf',
      html2canvas: { scale: 2 },
      jsPDF: { unit: 'mm', format: 'a4', orientation: 'landscape' },
      pagebreak: { avoid: '.page-break' },
      pagesplit: true,
    };
  
    if (!isCanvasHorizont) {
      pdfOptions.filename = "your_file_name.pdf";
      pdfOptions.html2canvas = { scale: 2 };
      pdfOptions.jsPDF = { unit: 'mm', format: 'a4', orientation: 'portrait' };
    }
    html2pdf().from(element).set(pdfOptions).toPdf().get('pdf').then(function (pdf) {
  
      window.open(pdf.output('bloburl'), '_blank');
    });
  }
  
  
  // выгрузка pdf
  buttonPdfDownload.addEventListener("click",()=>{
    window.scroll(0, 0);
  
    styleNone();
    const pdfConfig = {
      filename: 'your_file_name.pdf',
      html2canvas: { scale: 2 },
      jsPDF: { unit: 'mm', format: 'a4', orientation: 'landscape' } // Установите ориентацию 'landscape' для горизонтального формата
    };
    if(!isCanvasHorizont){
      pdfConfig.filename="your_file_name.pdf";
      pdfConfig.html2canvas = { scale: 2, windowWidth: document.documentElement.clientWidth, windowHeight: document.documentElement.clientHeight };
      pdfConfig.jsPDF={ unit: 'mm', format: 'a4', orientation: 'portrait' };
    };
  
  
    html2pdf().from(canvas).set(pdfConfig).outputPdf().save();
  
    setTimeout(()=>{
      styleAdd();
    },2000)
  });
  


  buttonPdfView.addEventListener('click', ()=>{
    styleNone();
    generateAndPreviewPDF();
    setTimeout(()=>{
      styleAdd();
    },2000)
  });
  
  function styleNone(){
    const moveableElems = document.querySelectorAll(".moveable");
    for (const elem of moveableElems) {
      elem.style.display = "none";
    };
    for (const elem of elemsOnCanvas) {
      elem.classList.remove("elem-canvas-target");
      elem.classList.remove("border-elem")
    };
    for(const dropBtn of dropdownButton){
      dropBtn.style.opacity="0";
    };
    for(const dropMenu of dropdownMenu){
      dropMenu.style.opacity="0";
    };
    document.body.style.overflow = "hidden";
  
  };
  
  function styleAdd(){
    document.body.style.overflow = "auto";
    for(const elem of elemsOnCanvas){
      elem.classList.add("border-elem")
    };
    for(const dropBtn of dropdownButton){
      dropBtn.style.opacity="1";
    };
    for(const dropMenu of dropdownMenu){
      dropMenu.style.opacity="1";
    };
  };
  