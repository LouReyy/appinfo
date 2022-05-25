

const bg = document.querySelector("#droite");
const onglets = document.querySelectorAll(".onglets");
const contenu = document.querySelectorAll(".contenu");
var index = 0;
const header = document.querySelector("header");
var x = window.matchMedia("(max-width: 1000px)");
const menu = document.querySelector("#menu");
const sous_menu = document.querySelector("#sous_menu");

function nomenu(){
    if(sous_menu.style.display != "none"){

        sous_menu.style.display = "none";
        sous_menu.style.width = "100%";
        sous_menu.style.visibility = "visible";

    }
    else{
        sous_menu.style.width = "0";
        sous_menu.style.visibility = "hidden";
        sous_menu.style.display = "block";



    }

}

menu.addEventListener('click', nomenu);


    if(x.matches){
    
        header.remove();
    }



for (k=0;k<contenu.length;k++){
    if(contenu[k].classList.contains('activeContenu')){
    contenu[k].style.height = 'auto';
    contenu[k].style.pointerEvents = "auto";


    }
    else{
        contenu[k].style.pointerEvents = "none";
        
    }
}




    

onglets.forEach(onglet => {
    onglet.addEventListener("click", () => {
        
  
      if(onglet.classList.contains('active')){
          return;
      }
      else{
          onglet.classList.add('active');
      }

    index=onglet.getAttribute('data-anim');
    console.log(index);

    for ( i = 0; i < onglets.length; i++) {
        if(onglets[i].getAttribute('data-anim')!=index){
            onglets[i].classList.remove('active');
        }
    }
    for (j=0;j<contenu.length;j++){
        if(contenu[j].getAttribute('data-anim')==index){
            contenu[j].classList.add('activeContenu');
            contenu[j].style.visibility = 'visible';
            contenu[j].style.pointerEvents = "auto";


        }
        else{
            contenu[j].classList.remove('activeContenu');
            contenu[j].style.visibility = 'hidden';
        }
    }
    

 
    })
})

