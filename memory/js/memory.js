const jeux = document.querySelectorAll(".img1");
const jeux2 = document.querySelectorAll(".img2");




listeImages = ["1.jpg","2.jpg","3.jpg","4.jpg","5.jpg","6.jpg","7.jpg","8.jpg","9.jpg","10.jpg","1.jpg","2.jpg","3.jpg","4.jpg","5.jpg","6.jpg","7.jpg","8.jpg","9.jpg","10.jpg"];

function shuffleArray(list){
    list.sort(()=> Math.random()-0.5)
}

shuffleArray(listeImages);


for(i=0;i<jeux.length;i++){
    jeux[i].src=listeImages[i];
}
var count_click =10;
const coup = document.querySelector(".coups-display");
coup.innerHTML = `${count_click}`;
coup.innerText ="salut";

listsrc=[];
listjeu=[];
listjeu1=[];
listpos=[];

    jeux2.forEach(jeu => {
        console.log(jeu.id);


 

    jeu.addEventListener('click',()=>{


        listjeu.push(jeu.id);
        console.log(listjeu);


        jeu.style.opacity="0";   
        count_click += 1;

        let rect = jeu.getBoundingClientRect();

        listpos.push(rect.x);
        listpos.push(rect.y);


        jeux.forEach(jeu1 => {
              



            let rect2 = jeu1.getBoundingClientRect();
        
            if(rect2.x == rect.x && rect2.y == rect.y){
                src = jeu1.src;
                listsrc.push(src);
                listjeu1.push(jeu1.id);
                console.log(listjeu1);
                console.log(listsrc);

                
               
            }
         

           

                if(listsrc[0] == listsrc[1] && count_click == 2){
                    
                    console.log("c'est win");



                  var jeuid0 = document.getElementById(listjeu1[0]);
                  var jeuid1= document.getElementById(listjeu1[1]);

                  var jeu3 = document.getElementById(listjeu[0]);
                  var jeu2= document.getElementById(listjeu[1]);

                  console.log(jeu3);
                  console.log(jeu2);

                  jeu3.style.opacity = "0";
                  jeu2.style.opacity = "0";

                    jeuid0.style.opacity = "0.5";
                    jeuid1.style.opacity = "0.5";
                    
                }


                else if(count_click == 2){

                 

             
                    for(i=0;i<listjeu.length;i++){
                    
                     var jeu3 = document.getElementById(listjeu[0]);
                    var jeu2= document.getElementById(listjeu[1]);

                    
            
                    function bord(){
                        jeu3.style.opacity = "1";
                        jeu2.style.opacity = "1";
                        }
    
    
                    
                       

                    }

                
                  
                   

                  
                    
                 
             
                }
                if(listsrc.length==2){
                    listsrc=[];
                    count_click = 0;
                    listjeu=[];
                    listjeu1=[];
                    setTimeout(bord,2000);

                    
                }
               

             
                

               
                

                
              


        })


})


    

});






    



    
    
    



