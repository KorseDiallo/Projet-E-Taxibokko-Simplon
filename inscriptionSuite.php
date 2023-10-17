<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
    
   <div class="Containeur_formulaire1">
    <div class="formulaire">
        <form action="">
            <h1>Bienvenue</h1>
            <h2>Finalisez votre inscription en renseignant les informations manquantes</h2>
            <div class="inputPrenom">
                <label for="prenom">Prenom</label>
                <label for="nom">Nom</label>
            </div>
            <div class="inputPrenom">
                <input type="text" id="prenom">
                <input type="text" id="nom" class="nom">
            </div>
           
            <div class="telephone">
                <label for="telephone">Telephone</label>
            </div>
            <div class="containeur">
                <div class="prefixe">+221</div>
                <div >
                    <input type="text" class="A">
                </div>
            </div>
            <div class="ajoutCodePromo">
                <a href="#">Ajouter un code promo</a>
            </div>
            <div class="containeurBouttonBas">
                <div class="bouttonBas">
                    <input type="submit" value="S'inscrire">
                    <!-- <a href="">S'inscrire</a> -->
                </div>
            </div>
           
            </div>
        </form>
    </div>
       
   </div>
</body>
</html>