



btn.onclick=function(){
  var btn= document.getElementById('btn');
  var date= document.getElementById('date');
  date = date.value;
  var annee = date.substring(0,4);
  var age = 2022-annee;
  confirm("Voulez vous soumettre le formulaire ?");
  if (age<18){
    alert("Vous êtes trop jeune !");
  }

}


