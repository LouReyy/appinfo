
const submit = document.getElementById("submit");  
const op1 = document.getElementById("op1").value;  
const op2 = document.getElementById("op2").value;  
const op3 = document.getElementById("op3").value; 


if(op1 != ""){

    if(Number.isInteger(op1)){
        console.log("c'est un entier");
    }
    else{
        console.log("le nombre n'est pas un entier")
    }


}





function test(){
    

     alert("Voulez-vous vraiment soumettre le formulaire ?");
   
}

submit.addEventListener('click', test);

