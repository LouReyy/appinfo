const onglets = document.querySelectorAll(".onglets");
const contenu = document.querySelectorAll(".contenu");
let index = 0;
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


        }
        else{
            contenu[j].classList.remove('activeContenu');

        }
    }
  })
})