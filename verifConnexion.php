<?php 
session_start();
require_once('dbConnexion.php');

function emailValide($email){
    $pattern = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/";
    return preg_match($pattern, $email);
}

if(isset($_POST["seConnecter"])){
    if(!empty($_POST["emailConnect"]) && !empty($_POST["mot_de_passeConnect"])){
        $emailConnect=htmlspecialchars($_POST["emailConnect"]);
        $motDePasseConnect=md5($_POST["mot_de_passeConnect"]);
    }else{
        echo "Veuillez remplir tous les champs";
        die();
    }
    // Verification mot de passe
    if(strlen($_POST["mot_de_passeConnect"])<7){
        echo "le mot de passe doit contenir au moins sept caractères";
        die();
    }

    // verification Email
    $verifieEmail= emailValide($emailConnect);
        if(!$verifieEmail){
            $email_erreur="l'email n'est pas valide";
            echo $email_erreur;
            die();
        }

}

$sqlQuery= 'select * from utilisateur where email=:email AND mot_de_passe=:mot_de_passe';
$selectUser = $mysqlClient->prepare($sqlQuery);
$selectUser->execute([
    "email"=>$emailConnect,
    "mot_de_passe"=>$motDePasseConnect
]);


if($selectUser->rowCount()>0){
        // $_SESSION["email"]=$emailConnect;
        // $_SESSION["mot_de_passe"]=$motDePasseConnect;
        // $_SESSION["id"]=$selectUser->fetch()["id"];
        echo "connexion reçue";
        echo "<br>";
        // header("location:test.php");
    }else{
        echo "Votre email ou mot de passe est incorrect";
        echo "<br>";
    }
    // Recuperation des inscrits

    $sqlSelect = 'select nom,prenom,date_inscription from utilisateur';

    $req= $mysqlClient->prepare($sqlSelect);
    $req->execute();
    
    $affiche = $req->fetchAll();
    
    
?>
    <table border="1">
            <tr>
                <td>Nom</td>
                <td>Prénom</td>
                <td>Date Inscription</td>
            </tr>
    <?php foreach ($affiche as $value):?>
        
            <tr>
                <td><?php echo $value["nom"] ?></td>
                <td><?php echo $value["prenom"] ?></td>
                <td><?php echo $value["date_inscription"] ?></td>
            </tr>
       
    <?php endforeach; ?>
    </table>
