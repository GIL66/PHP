<?php
if (isset($_POST['frmLogin'])) {
    if (isset($_POST['mail']) && isset($_POST['mdp'])) {
        $mail = $_POST['mail'];
        $mdp = $_POST['mdp'];
        $mdp = sha1($mdp);
        $connection = mysqli_connect("localhost", "root", "", "phpdieppe");
        $requeteVerif = "SELECT * FROM T_USERS
                        WHERE USEMAIL='$mail'
                        AND USEPASSWORD='$mdp'";
                
        if (!$connection) {
            die("Erreur MySQL " . mysqli_connect_errno() . " | " . mysqli_connect_error());
        }
        else {
            if ($resultatRequete = mysqli_query($connection, $requeteVerif)) {
                $nbrResultats = mysqli_num_rows($resultatRequete);
                if ($nbrResultats > 0) {
                    $_SESSION['login'] = 1;
                    
                }
                else {
                    $_SESSION['login'] = 0;
                    echo "Essaie encore";
                }
                mysqli_free_result($resultatRequete);
            }
            else {
                echo "Ach !!! Gros problème de requête !!!";
            }
            mysqli_close($connection);
        }
    }
    else {
        echo "Mmmm, truc qui merdouille dans le formulaire";
        include "frmLogin.php";        
    }
}
else {
    include "frmLogin.php";
}