<?php 
session_start();
require_once('dbConnexion.php');
 


$email=$_SESSION["email"];
$motDePasse=$_SESSION["mot_de_passe"];

// declaration des regex nom prenom et telephone
$regex_nom = "/^[a-zA-Z]{2,}$/";
$regex_prenom = "/^[a-zA-Z]{3,}$/";
$regex_tel = "/^7+[0-9]{1,7}$/";

if(isset($_POST["inscription"])){
    if(!empty($_POST["prenom"]) && !empty($_POST["nom"]) && !empty($_POST["telephone"])){
        $prenom=htmlspecialchars($_POST["prenom"]);
        $nom=htmlspecialchars($_POST["nom"]);
        $telephone=$_POST["telephone"];
    }
    // verification du nom
    if(!preg_match($regex_nom,$_POST["nom"])){
        echo "le nom est invalid";
        die();
    }
    //verification du prenom
    if(!preg_match($regex_prenom,$_POST["prenom"])){
        echo "le prenom est invalid";
        die();
    }
    //verification du telephone
    if(!preg_match($regex_tel,$_POST["telephone"])){
        echo "le telephone est invalid";
        die();
    }

   
    
}


$sqlQuery = 'INSERT INTO utilisateur (email, mot_de_passe, prenom, nom, telephone) VALUES (:email, :mot_de_passe, :prenom, :nom, :telephone)';

$insertUser = $mysqlClient->prepare($sqlQuery);

$insertUser->execute([
    'email' => $email,
    'mot_de_passe' => $motDePasse,
    'prenom' => $prenom,
    'nom' => $nom,
    'telephone' => $telephone
]);



?>