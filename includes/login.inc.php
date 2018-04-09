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
                if (mysqli_num_rows($resultatRequete) > 0) {
                    while($row = mysqli_fetch_assoc($resultatRequete)) {
                        $nom = $row['USENAME'];
                        $prenom = $row['USEFIRSTNAME'];
                    }
                    
                    $_SESSION['login'] = 1;
                    $_SESSION['nom'] = $nom;
                    $_SESSION['prenom'] = $prenom;
                }
                else {
                    $_SESSION['login'] = 0;
                    echo "Essaie encore";
                }
                mysqli_free_result($resultatRequete);
            
                mysqli_close($connection);
            }
        }
    }
}
else {
    include "frmLogin.php";
}