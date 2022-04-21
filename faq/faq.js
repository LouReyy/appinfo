const none = document.getElementById("none");
const droite = document.getElementById("droite");

none.style.visibility = 'hidden';

console.log(none.style.visibility);

if (none.style.visibility == 'hidden')
    {
        droite.style.marginLeft = '15%';
        droite.style.marginTop = '12%';

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
    }
    else                                     
    {
        content.style.visibility = 'hidden';
        content.style.height= '0';
        topic.style.boxShadow = '5px 5px 5px lightblue';
        topic.style.backgroundColor = '#F5F5F5';
        quest.style.boxShadow = 'none';   
    }


})




}
