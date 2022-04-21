const fleche = document.querySelectorAll(".fleche");
const content = document.querySelector(".content");
const topic = document.querySelector(".topic");
const quest = document.getElementById("question");


fleche.forEach(fleche => {


    fleche.addEventListener('click',()=>{





    if (content.style.visibility == 'hidden')
    {
        content.style.visibility = 'visible';
        content.style.height= 'auto';
        topic.style.boxShadow = 'none';
        topic.style.backgroundColor = '#00ccff';
        quest.style.boxShadow = '5px 5px 5px lightblue';   
    }
    else                                     
    {
        content.style.visibility = 'hidden';
        content.style.height= '0';
        topic.style.boxShadow = '5px 5px 5px lightblue';
        topic.style.backgroundColor = '#F5F5F5';
    }


})
})


