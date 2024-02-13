<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../../assets/css/accueilAdmin.css">
    <script src="../../inc/js/function.js"> </script>
    <script src="../../assets/js/color-modes.js"></script>
    <title>Accueil Admin</title>
</head>
<body>
    <div id="header">
        <nav class="navbar navbar-expand-md navbar-dark" style="background-color: red;">
            <div class="container py-1">
                <div class="navbar-brand col">
                    VARIE-THE
                </div>
                <div>
                    <div>
                        <a href="#navigationBar" data-bs-toggle="collapse" class="navbar-toggler nav-link" aria-expanded="false" aria-controls="navigationBar"><span class="navbar-toggler-icon"></span></a>
                    </div>
                </div>
                <div id="navigationBar" class="justify-content-center collapse navbar-collapse col">
                    <div class="navbar-nav nav-fill">
                        <a href="#tabCueillette" data-bs-toggle="collapse" aria-controls="tabCueillette" aria-expanded="false" class="nav-link dropdown-toggle">Cueillette</a>
                        <a href="#tabDepenses" data-bs-toggle="collapse" aria-controls="tabDepenses" aria-expanded="false" class="nav-link dropdown-toggle">Dépenses</a>
                        <a href="modele_accueilUser.php?folder=resultat&page=resultat" class="nav-link">Résultat</a>
                    </div>
                </div>
                
            </div>
        </nav>
        <div class="collapse secondaryBar interdependantBars" id="tabCueillette">
            <div class="container py-4">
                <div class="row">
                    <div class="col text-center my-2">
                        <a href="modele_accueilUser.php?folder=cueillette&page=listCueillette" class="personnalisedLink">Historique des cueillettes</a>
                    </div>
                    <div class="col text-center my-2">
                        <a href="modele_accueilUser.php?folder=cueillette&page=insertCueillette" class="personnalisedLink">Saisie de cueillette</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="collapse secondaryBar interdependantBars" id="tabDepenses">
            <div class="container py-4">
                <div class="row">
                    <div class="col text-center my-2">
                        <a href="modele_accueilUser.php?folder=depense&page=listDepense" class="personnalisedLink">Historique des dépenses</a>
                    </div>
                    <div class="col text-center my-2">
                        <a href="modele_accueilUser.php?folder=depense&page=insertDepense" class="personnalisedLink">Saise de dépenses</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="content" class="container-fluid">

        <div class="row justify-content-center pt-5 pb-4">
            <div class="col-md-5">

                    <!-- content -->
                        <?php require $_GET['folder'].'/'.$_GET['page'].'.html';?>
                    <!-- content -->

            </div>
        </div>

    </div>
    <div class="container">
        <footer class="py-3 my-4">
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">ETU 002741</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">ETU 002375</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">ETU 002628</a></li>
            </ul>
            <p class="text-center text-body-secondary">© 2024 Company, Inc</p>
        </footer>
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