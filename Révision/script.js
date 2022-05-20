var submit = document.getElementById("soumettre");
submit.onclick = function(){

     if (confirm("Etes-vous sûrs de soumettre votre candidature?")) {
        return true;
      } else {
        return false;
      }
}

var email = document.getElementById("email1");
var emailConfirmation = document.getElementById("email2");
emailConfirmation.onkeyup = function(){
    if(emailConfirmation.value!=email.value){
        emailConfirmation.style.color = "red";
    }
    else{
        emailConfirmation.style.color = "green";
    }
}

email.onkeypress = function(){
    email.onmouseleave = function(){
    if(!email.value.match(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-z]{2,4}$/)){
        alert("Le format de votre email est invalide");
        email.style.color = "red";
    }
    else{
        email.style.color = "green";
    }
}
}