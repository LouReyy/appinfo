

const none = document.getElementById("none");
const droite = document.getElementById("droite");
var x = window.matchMedia("(max-width: 1000px)");
const header = document.querySelector("header");
const menu = document.querySelector("#menu");
const sous_menu = document.querySelector("#sous_menu");

if(x.matches){
    header.remove();
}

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



if(none){
droite.style.marginLeft = '5%';
droite.style.marginTop= '15%';

none.style.visibility = 'hidden';

console.log(none.style.visibility);

function verif(x){

    if(x.matches){
        droite.style.marginTop = '35%';
        droite.style.marginLeft = '5%';
        header.remove();



    }
    else{
    droite.style.marginLeft = '15%';
    droite.style.marginTop = '15%';
    }
}


if (none.style.visibility == 'hidden')

        verif(x)
        

    



}








for(var i=1;i<10;i++){
const quest = document.getElementById("question" +i);
const content = document.getElementById("content" +i);
const topic = document.getElementById("topic" +i);
const fleche = document.getElementById("fleche" +i);





    fleche.addEventListener('click',()=>{



    if (content.style.visibility == 'hidden')
    {
        content.style.visibility = 'visible';
        content.style.height= 'auto';
        topic.style.boxShadow = 'none';
        topic.style.backgroundColor = '#00ccff';
        quest.style.boxShadow = '5px 5px 5px lightblue';   
        fleche.style.transform = 'rotate(180deg)';
    }
    else                                     
    {
        content.style.visibility = 'hidden';
        content.style.height= '0';
        topic.style.boxShadow = '5px 5px 5px lightblue';
        topic.style.backgroundColor = '#F5F5F5';
        quest.style.boxShadow = 'none';   
        fleche.style.transform = 'rotate(0deg)';
    }


})




}
