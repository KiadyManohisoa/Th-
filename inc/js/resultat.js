function researchByDate (form) {
    var xhr = getXhr();
  
  xhr.onreadystatechange = function () {

  if(xhr.readyState==4) {
    if(xhr.status == 200) {
      var retour = JSON.parse(xhr.responseText);
        var divAns = document.getElementById('toHide');
        divAns.setAttribute('style','display:block;');
        
        var totalPoids =document.getElementById('totalPoids');
        var prixRevient = document.getElementById('revientparKg');
        var dateRef = document.getElementById('date');

        dateRef.textContent = retour['dateRef'];
        totalPoids.textContent = retour['totalCueillette'];
        prixRevient.textContent =" "+ retour['revientKg'];

    }
  }

  };

  // Liez l'objet FormData et l'élément form
  var formData = new FormData(form);

  // Definissez ce qui se passe en cas d'erreur
  xhr.addEventListener("error", function(event) {
    //alert(event);
    alert('Oups! Quelque chose s\'est mal passé.');
  });

  //Configurez la requête
  xhr.open("POST", "resultat/traitResultat.php",true);

  // Les données envoyées sont ce que l'utilisateur a mis dans le formulaire
  xhr.send(formData);
}

