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
        var benefice=document.getElementById('benefice');
        var depenses=document.getElementById('depenses');
        var montantvente=document.getElementById('montantVente');

        dateRef.textContent = retour['dateRef'];
        totalPoids.textContent = retour['totalCueillette'];
        prixRevient.textContent =" "+ retour['revientKg'];
        benefice.textContent =" "+ retour['benefice'];
        depenses.textContent =" "+ retour['totalCharge'];
        montantvente.textContent =" "+ retour['totalvente'];

        var tableau= retour['restantParParcelle'];
        displayInTable(tableau,"tablePoidsRestant");
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

