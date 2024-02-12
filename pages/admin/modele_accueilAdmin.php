<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../../assets/css/accueilAdmin.css">
    <title>Accueil Admin</title>
</head>
<body>
    <div id="header">
        <nav class="navbar navbar-expand-md navbar-dark" style="background-color: red;">
            <div class="container py-1">
                <div class="navbar-brand col">
                    VARIETHE
                </div>
                <div>
                    <div>
                        <a href="#navigationBar" data-bs-toggle="collapse" class="navbar-toggler nav-link" aria-expanded="false" aria-controls="navigationBar"><span class="navbar-toggler-icon"></span></a>
                    </div>
                </div>
                <div id="navigationBar" class="justify-content-center collapse navbar-collapse col">
                    <div class="navbar-nav nav-fill">
                        <a href="#tabVariete" data-bs-toggle="collapse" aria-controls="tabVariete" aria-expanded="false" class="nav-link dropdown-toggle">Variété</a>
                        <a href="#tabParcelle" data-bs-toggle="collapse" aria-controls="tabParcelle" aria-expanded="false" class="nav-link dropdown-toggle">Parcelle</a>
                        <a href="#tabCueilleur" data-bs-toggle="collapse" aria-controls="tabCueilleur" aria-expanded="false" class="nav-link dropdown-toggle">Cueilleur</a>
                        <a href="#tabCategories" data-bs-toggle="collapse" aria-controls="tabCategories" aria-expanded="false" class="nav-link dropdown-toggle">Categories</a>
                        <a href="#tabSalKilo" data-bs-toggle="collapse" aria-controls="tabSalKilo" aria-expanded="false" class="nav-link dropdown-toggle">Salaire par kilo</a>
                    </div>
                </div>

                
            </div>
        </nav>
        <div class="collapse secondaryBar interdependantBars" id="tabVariete">
            <div class="container py-4">
                <div class="row">
                    <div class="col text-center my-2">
                        <a href="modele_accueilAdmin.php?folder=variete&page=listVariete" class="personnalisedLink">Voir toutes les variétés</a>
                    </div>
                    <div class="col text-center my-2">
                        <a href="modele_accueilAdmin.php?folder=variete&page=insertVariete" class="personnalisedLink">Insérer une nouvelle variété</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="collapse secondaryBar interdependantBars" id="tabParcelle">
            <div class="container py-4">
                <div class="row">
                    <div class="col text-center my-2">
                        <a href="modele_accueilAdmin.php?folder=parcelle&page=listParcelle" class="personnalisedLink">Voir toutes les parcelles</a>
                    </div>
                    <div class="col text-center my-2">
                        <a href="modele_accueilAdmin.php?folder=parcelle&page=insertParcelle" class="personnalisedLink">Insérer une nouvelle parcelle</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="collapse secondaryBar interdependantBars" id="tabCueilleur">
            <div class="container py-4">
                <div class="row">
                    <div class="col text-center my-2">
                        <a href="modele_accueilAdmin.php?folder=cueilleur&page=listCueilleur" class="personnalisedLink">Voir tous les cueilleurs</a>
                    </div>
                    <div class="col text-center my-2">
                        <a href="modele_accueilAdmin.php?folder=cueilleur&page=insertCueilleur" class="personnalisedLink">Insérer un nouveau cueilleur</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="collapse secondaryBar interdependantBars" id="tabCategories">
            <div class="container py-4">
                <div class="row">
                    <div class="col text-center my-2">
                        <a href="modele_accueilAdmin.php?folder=catDepense&page=listCatDepense" class="personnalisedLink">Voir toutes les catégories de dépenses</a>
                    </div>
                    <div class="col text-center my-2">
                        <a href="modele_accueilAdmin.php?folder=catDepense&page=insertCatDepense" class="personnalisedLink">Insérer une nouvelle catégorie de dépense</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="collapse secondaryBar interdependantBars" id="tabSalKilo">
            <div class="container py-4">
                <div class="row">
                    <div class="col text-center my-2">
                        <a href="modele_accueilAdmin.php?folder=salKilo&page=listSalKilo" class="personnalisedLink">Voir tous les salaires par Kilo</a>
                    </div>
                    <div class="col text-center my-2">
                        <a href="modele_accueilAdmin.php?folder=salKilo&page=insertSalKilo" class="personnalisedLink">Insérer un nouveau salaire par kilo</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="content">

        <div class="row justify-content-center p-5">
            <div class="col-md-5">

                    <!-- content -->
                        <?php require $_GET['folder'].'/'.$_GET['page'].'.html';?>
                    <!-- content -->

            </div>
        </div>

    </div>
</body>
</html>
<script src="../../assets/js/bootstrap.bundle.js"></script>
<script>
    var allObj=document.getElementsByClassName("interdependantBars");
    
    for(var element of allObj){
        element.addEventListener("show.bs.collapse",(event)=>{
            var allObj2=document.getElementsByClassName("interdependantBars");
            for(var elem of allObj2){
                if(elem.id!=event.target.id){
                    var coll=bootstrap.Collapse.getInstance(elem);
                    if(coll!=null){
                        coll.hide();
                    }
                }
            }
        });
    }
</script>