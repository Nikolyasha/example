function AddMoveable(el) {
      
    // НАЧАЛО 
            
      // for rezise
      const maxWidth = "auto";
      const maxHeight = "auto";
      const minWidth = "auto";
      const minHeight = "auto";
      const resizable = true;
      const throttleResize = 1;
      const renderDirections = ["nw","n","ne","w","e","sw","s","se"];
      const bounds = {"left":0,"top":0,"right":0,"bottom":0,"position":"css"};

    let isActive = true;

    let moveable = new Moveable(canvas, {
        target: el,
        preventDefault:prevEvDefult,
        className: `moveable ${countInputs}`,
        // If the container is null, the position is fixed. (default: parentElement(document.body))
        container: canvas,
        draggable: true,
        resizable: true,
        scalable: false,
        rotatable: true,
        roundable: false,
        snapRotataionThreshold: 5,
        snapRotationDegrees: [0, 90, 180, 270],      
        bounds:bounds,
        isDisplayShadowRoundControls: true,
        maxRoundControls: [4, 0],
        roundPadding: 20,
        isDisplaySnapDigit: true,          
        snappable: true,
        snapThreshold: 5,
        snapGap: false,
        snapDirections: {
            top: true,
            right: true,
            bottom: true,
            left: true,
            center: true,
            middle: true,
        },
        elementSnapDirections: {
            top: true,
            right: true,
            bottom: true,
            left: true,
            center: true,
            middle: true,
        },
        // Enabling pinchable lets you use events that
        // can be used in draggable, resizable, scalable, and rotateable.
        pinchable: true, // ["resizable", "scalable", "rotatable"]
        origin: true,
        
        throttleDrag: 1,
        throttleResize: 1,
        throttleRotate: 0,
        padding: { left: 0, top: 0, right: 0, bottom: 0 },

        // for rezise            
        keepRatio: keepRatio,
        throttleResize: throttleResize,
        renderDirections: renderDirections,
        
    });

    /* draggable */
    moveable
        .on("dragStart", ({ target, clientX, clientY }) => {              
            hasInteracted = true;
            const moveableElems=document.querySelectorAll(".moveable");
            currentElem=el.id;
            for(let elem of moveableElems){
              elem.style.display="none"
              if(elem.classList[2]==el.id){
                elem.style.display="block"
              }
            };
            for(let dropContainer of dropdownContainer){
              dropContainer.style.display="none";
              if(el.id==dropContainer.id){
                dropContainer.style.display="block";
                }
              };              
           
        
            for(const elem of elemsOnCanvas){
              elem.classList.remove("elem-canvas-target");
            };
            el.classList.add("elem-canvas-target");
            el.classList.remove("isNotActive");
            el.classList.add("isActive");     
        })
        .on("drag", (e) => {
          e.target.style.transform = e.transform;            
                    
        })
        .on("dragEnd", ({ target, isDrag, clientX, clientY }) => {              
            hasInteracted=false;
            el.classList.remove("isActive");
            el.classList.add("isNotActive"); 
            isNotActive=document.querySelectorAll(".isNotActive");              
                         
        });
   
    /* resizable */ 
    moveable.on("resize", e => {
        e.target.style.width = `${e.width}px`;
        e.target.style.height = `${e.height}px`;
        e.target.style.transform = e.drag.transform;          

    });

  

    /* rotatable */
    moveable
        .on("rotateStart", ({ target, clientX, clientY }) => {              
            hasInteracted = true;
        })
        .on("rotate", ({ target, beforeDelta, delta, dist, transform, clientX, clientY, beforeRotate }) => {
            if (isActive) {                  
                target.style.transform = transform;

            }
        })
        .on("rotateEnd", ({ target, isDrag, clientX, clientY }) => {              
        });    
} 