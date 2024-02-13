// lof fonction for admin 
function verifLogAdmin () {
    var xhr = getXhr();
  
    xhr.onreadystatechange = function () {
  
    if(xhr.readyState==4) {
      if(xhr.status == 200) {
        var retour = JSON.parse(xhr.responseText);
        if(retour['error']!=null) {
            alert(retour['error']);
        }
        else if (retour['info']!=null) {
            alert('Connexion réussie');
            window.location.href = "modele_accueilAdmin.php?folder=accueil&page=accueil";
        }
      }
    }
  
    };
  
    //Accédez à l'élément form …
    var form = document.getElementById("myForm");
  
    // Liez l'objet FormData et l'élément form
    var formData = new FormData(form);

  
    // Definissez ce qui se passe en cas d'erreur
    xhr.addEventListener("error", function(event) {
      //alert(event);
      alert('Oups! Quelque chose s\'est mal passé.');
    });
  
    //Configurez la requête
    xhr.open("POST", "traitLogAdmin.php",true);
  
    // Les données envoyées sont ce que l'utilisateur a mis dans le formulaire
    xhr.send(formData);

}