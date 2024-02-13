function generateOptions (retour,selectElt) {
  selectElt.innerHTML = null;
  for(var i=0;i<retour.length;i++) {
    var option = document.createElement('option');
    option.setAttribute('value',retour[i]["id"]);
    option.textContent = retour[i]["nom"];
    selectElt.appendChild(option);
  }
}

function insert(form) {
  var xhr = getXhr();
  
  xhr.onreadystatechange = function () {

  if(xhr.readyState==4) {
    if(xhr.status == 200) {
      var retour = JSON.parse(xhr.responseText);
      if(retour ===true) {
        alert("Insertion réussie");
      }
      else if (retour ===false) {
        alert("Erreur d\'insertion");
      }
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
  xhr.open("POST", "traitInsert.php",true);

  // Les données envoyées sont ce que l'utilisateur a mis dans le formulaire
  xhr.send(formData);
}

function getXhr () {
    var xhr;
    try {
      xhr = new ActiveXObject('Msxml2.XMLHTTP');   }
    catch (e)
    {
        try {
          xhr = new ActiveXObject('Microsoft.XMLHTTP'); }
        catch (e2)
        {
           try {
             xhr = new XMLHttpRequest();  }
           catch (e3) {
             xhr = false;   }
         }
    }
    return xhr;
}

function displayInTable (retour,idTable) {
  var table = document.getElementById(idTable); 

  var thead = document.createElement('thead');
  var tr  = document.createElement('tr');
  for(var key in retour[0]) {
      var th = document.createElement('th');
      th.textContent = key;
      tr.appendChild(th);
  }
  thead.appendChild(tr);

  var tbody = document.createElement('tbody');
  for(var i=0;i<retour.length;i++) {
      var tr = document.createElement('tr');
      for(var key in retour[i]) {
          var td = document.createElement('td');
          td.textContent = retour[i][key];
          tr.appendChild(td);
      }
      tbody.appendChild(tr);
  }
  table.appendChild(thead);
  table.appendChild(tbody);
}