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
// adresse, utilisateur, mdp, bdd
$mdp = sha1($mdp);
$token = uniqid(sha1(date('Y-m-d|H:m:s')), false);
$connection = mysqli_connect("localhost", "root", "", "phpdieppe" );

$requete = "INSERT INTO T_USERS
    (USENAME, USEFIRSTNAME, USEMAIL, USEPASSWORD, ID_ROLE, USETOKEN)
    VALUES ('$nom', '$prenom', '$mail', '$mdp', 3, '$token')";

if (!$connection) {
die("Erreur MySQL" . mysqli_connect_errno() . " | " . mysqli_connect_error());
}



else {

if(mysqli_query($connection, $requete)) {
    echo "données enregistrées";
    $id = mysqli_insert_id($connection);

    $messageMail = "<h1>Wunderbar !!!</h1>";
    $messageMail .= "<p> Vous êtes inscrit !</p>";
    $messageMail .= "<p>Mais vous devez valider votre inscription.</p>";
    $messageMail .= "<p><a href='http://localhost/PHP/index.php?page=mailValidation&amp;id=$id&amp;token=$token'>";
    $messageMail .= "Clique-moi grand fou !";
    $messageMail .= "</a></p>";

    // email, objet, message.
    // mail($mail, 'Inscription compte', $messageMail);

    $headers = "From: manu@elysees.fr" . "\r\n" .
    "Reply-to: doudou@matignon.com" . "\r\n" .
    "X-Mailer: PHP/" . phpversion();

    mail($mail, 'inscription compte', $messageMail, $headers);

}
else {
 


 
 
 
    /*echo "Erreur";
    include "frmregistration.php";*/
}
mysqli_close($connection);
}
}
}
else {
echo "Je ne viens pas du formulaire";
include "frmregistration.php";
}