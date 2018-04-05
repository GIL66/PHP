<h1>Inscription</h1>
<?php
if(isset($_POST['frmregistration'])) {
    
    //syntaxe classique
   /* if (isset($_POST['nom'])) {
        $nom = $_POST['nom'];
    }
    else {
        $nom = "";
    }

    // opérateur ternaire
    $nom = isset($_POST['nom']) ? $_POST['nom'] : "";*/

  // Opérateur Null coalescent PHP 7
    $nom = $_POST['nom'] ?? "";
    $prenom = $_POST['prenom'] ?? "";
    $mail = $_POST['mail'] ?? "";
    $mdp = $_POST['mdp'] ?? "";

    $erreur = array();

    if ($nom == "") array_push($erreur, "Veuillez saisir votre nom");
    if ($prenom == "") array_push($erreur, "Veuillez saisir votre prenom");
    if ($mail == "") array_push($erreur, "Veuillez saisir votre mail");
    if ($mdp == "") array_push($erreur, "Veuillez saisir votre mot de passe");

    if (count($erreur) > 0) {
        $message = "<ul>";/*
for($i = 0 ; $i<count($erreur) ; $i++){  
    $message .= "<li>";
    $message .= $erreur[$i];
    $message .= "</li>";
}
$message = $message . "</ul>";
echo $message;*/
foreach($erreur as $ligneMessage) {
    $message .= "<li>";
    $message .= $ligneMessage;
    $message .= "</li>";
}
$message .= "</ul>";
echo $message;
include "frmregistration.php";
    }
    else {
 echo "pas d'erreur";
    }
}
else {
    echo "Je ne viens pas du formulaire";
    include "frmregistration.php";
}