<?php 
session_start();

// creation de la fonction pour verifier l'email
function emailValide($email){
    $pattern = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/";
    return preg_match($pattern, $email);
}

    if(isset($_POST["valider"])){
        if(!empty($_POST["email"]) && !empty($_POST["mot_de_passe"])){
            $_SESSION["email"]= htmlspecialchars($_POST["email"]);
            $_SESSION["mot_de_passe"]= md5($_POST["mot_de_passe"]);
        }else{
            echo "veuillez saisir tous les champs";
        }

 // verification Email
        $verifieEmail= emailValide($_SESSION["email"]);
        if(!$verifieEmail){
            echo "l'email n'est pas valide";
            die();
        }

// verification mot de passe

        if(strlen($_POST["email"])<7){
            echo "le mot de passe doit contenir au moins sept caractère";
            die();
        }
       
    }

?>


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
        <form action="traitement.php" method="post">
            <h1>Bienvenue</h1>
            <h2>Finalisez votre inscription en renseignant les informations manquantes</h2>
            <div class="inputPrenom">
                <label for="prenom">Prenom</label>
                <label for="nom">Nom</label>
            </div>
            <div class="inputPrenom">
                <input type="text" id="prenom" name="prenom">
                <input type="text" id="nom" name="nom" class="nom">
            </div>
           
            <div class="telephone">
                <label for="telephone">Telephone</label>
            </div>
            <div class="containeur">
                <div class="prefixe">+221</div>
                <div >
                    <input type="text" class="A" name="telephone">
                </div>
            </div>
            <div class="ajoutCodePromo">
                <a href="#">Ajouter un code promo</a>
            </div>
            <div class="containeurBouttonBas">
                <div class="bouttonBas">
                    <input type="submit" value="S'inscrire" name="inscription">
                    <!-- <a href="">S'inscrire</a> -->
                </div>
            </div>
           
            </div>
        </form>
    </div>
       
   </div>
</body>
</html>