const menu = document.querySelector("#menu");
const sous_menu = document.querySelector("#sous_menu");
const header = document.querySelector("header");
var x = window.matchMedia("(max-width: 1000px)");


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