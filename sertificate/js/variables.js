const elems=document.querySelectorAll(".tool-item");//получаем коллекцию элементов боковой панели
const leftMenu=document.querySelector(".left-menu");//получаем коллекцию элементов боковой панели
let canvas=document.querySelector(".canvas");//получаем холст сертификата
const inputUploadImage=document.querySelector(".inputUploadImage");//получаем input отвечающий за загрузку фона сертификата
const buttonPdfDownload=document.querySelector(".buttonPdfDownload");//получаем кнопку экспорта в pdf
const buttonPdfView=document.querySelector(".buttonPdfView");//получаем кнопку экспорта в pdf
const canvasSize=document.querySelector(".canvasSize");//получаем селект выбора размера сертификата
let canvasRect = canvas.getBoundingClientRect(); // Получаем размеры и положение холста
const editorMain=document.querySelector(".editor-main");
const editorForm=document.querySelector(".editor-form");
const editorContainer=document.querySelector(".editor-container");
const saveButton=document.querySelector(".save-button");
let currentElem;
let dropdownContainer;
let dropdownButton;
let dropdownMenu;
let colorPickerButton;
let colorPickerPalette;
let colorPickerAlign;
let colorPickerAlignDropdown;
let colorPickerAlignWrapper; 
let selectDropdown;
let valueFont;
let boldButton;
let italicButton;
let underlineButton;
let isNotActive;


let elemsOnCanvas=canvas.children;
let inputsOnEditor=editorMain.children;
let isDrag=false;
let offsetElem=[0,0];
let countInputs = 0;
let isCanvasHorizont=true;
let hasInteracted = false; 
let currentElemOnCanvas;
let currentDragElem;
const nameOfEditor={
  "elemNum":"Номер сертификата",
  "elemTheme":"Тема сертификата",
  "elemDate":"Дата сертификата",
  "elemName":"Имя и фамилия",
  "elemImg":"Изображение",
  "elemTxt":"Текст",
};