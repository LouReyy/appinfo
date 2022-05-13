const jeu = document.querySelectorAll(".img1");


positionX =[];
positionY=[];



jeu.forEach(jeu => {

    function elementPosition (a) {
        var b = a.getBoundingClientRect(jeu);
        return {
          clientX: a.offsetLeft,
          clientY: a.offsetTop,
          viewportX: (b.x || b.left),
          viewportY: (b.y || b.top)
        }
      }

    
    jeu.style.backgroundColor ='red';


    var positions = elementPosition(jeu);

 

   positionX.push(positions.viewportX);
   positionY.push(positions.viewportY);

   console.log(positionX);






    jeu.addEventListener('click',()=>{

        jeu.style.visibility ="hidden";
        jeu.src = "1.jpg";

    
    
    })
    
    
});



