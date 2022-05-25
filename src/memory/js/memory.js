const jeux = document.querySelectorAll(".img1");
const jeux2 = document.querySelectorAll(".img2");
const coup = document.querySelector("#coups");
const divjeu = document.querySelector("#container");
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


listeImages = new Array(20).fill(".jpg").map((ext, index) => ("img/" +((index % 10) + 1 + ext)))
console.log(listeImages)

function shuffleArray(list) {
    list.sort(() => Math.random() - 0.5)
}

shuffleArray(listeImages);
console.log(listeImages);


for (i = 0; i < jeux.length; i++) {
    jeux[i].src = listeImages[i];
}
var count_click = 0;
var coups = 0;



listsrc = [];
listjeu = [];
listjeu1 = [];
listpos = [];
listPaire=[]; 

jeux2.forEach(jeu => {
    console.log(jeu.id);





    function jeufct() {


        listjeu.push(jeu.id);
        console.log(listjeu);


        jeu.style.opacity = "0";
        count_click += 1;


        let rect = jeu.getBoundingClientRect();

        listpos.push(rect.x);
        listpos.push(rect.y);


        jeux.forEach(jeu1 => {




            let rect2 = jeu1.getBoundingClientRect();

            if (rect2.x == rect.x && rect2.y == rect.y) {
                src = jeu1.src;
                listsrc.push(src);
                listjeu1.push(jeu1.id);
                console.log(listjeu1);
                console.log(listsrc);



            }

            var jeuid0 = document.getElementById(listjeu1[0]);
            var jeuid1 = document.getElementById(listjeu1[1]);

            var jeu3 = document.getElementById(listjeu[0]);
            var jeu2 = document.getElementById(listjeu[1]);


        


            if (listsrc[0] == listsrc[1] && count_click == 2 && jeuid0!=jeuid1) {

                console.log("c'est win");

                jeu3.style.opacity = "0";
                jeu2.style.opacity = "0";

                jeuid0.style.opacity = "0.5";
                jeuid1.style.opacity = "0.5";
                divjeu.style.pointerEvents = 'auto';


                

                listPaire.push(listsrc[0]);
                console.log(listPaire);

                if (listPaire.length==10){
                    alert("C'est gagne!");
                }


            }
        
           


            else if (count_click == 2) {
                divjeu.style.pointerEvents = 'none';



                for (i = 0; i < listjeu.length; i++) {

                    var jeu3 = document.getElementById(listjeu[0]);
                    var jeu2 = document.getElementById(listjeu[1]);


                    function bord() {
                        jeu3.style.opacity = "1";
                        jeu2.style.opacity = "1";
                        divjeu.style.pointerEvents = 'auto';
                    }





                }



            }
            if ( jeuid1 == jeuid0) {

                console.log('tu as clique sur la meme carte')
                
            
            }


            if (listsrc.length == 2) {
                listsrc = [];
                count_click = 0;
                listjeu = [];
                listjeu1 = [];
                setTimeout(bord, 1000);
                coups += 1;
                coup.innerHTML = `${coups}`;
            }



               




        })
        






    }


    jeu.addEventListener('click', jeufct);




});
















