const jeux = document.querySelectorAll(".img1");




listeImages = ["1.jpg","2.jpg","3.jpg","4.jpg","5.jpg","6.jpg","7.jpg","8.jpg","9.jpg","10.jpg","1.jpg","2.jpg","3.jpg","4.jpg","5.jpg","6.jpg","7.jpg","8.jpg","9.jpg","10.jpg"];

function shuffleArray(list){
    list.sort(()=> Math.random()-0.5)
}

shuffleArray(listeImages);





for(i=0;i<jeux.length;i++){

    jeux[i].src=listeImages[i];

    console.log(jeux[i]);


    jeux[i].addEventListener('click',()=>{

        jeux[i].style.visibility="hidden";


})
};


    
    
    



