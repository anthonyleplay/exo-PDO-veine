<?php
require_once '..\model\user.php';

$mailRegex = "/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/";
$PasswordRegex = "/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{,}$/";

$loginSuccess = false;

$error = [];

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // on va chercher les info mail et pseudo en crant un lien vers la bdd
    $Users = new Users();

    //verification du format de mail (usermail)
    if (isset($_POST['usermail']) && isset($_POST['userpassword'])) {

        // verif si il y a rien dans l'un des 2 champ
        if (empty($_POST['usermail']) || empty($_POST['userpassword'])) {
            $error['usermail'] = 'Veuillez Renseigner tout les champs';
            $error['userpassword'] = 'Veuillez Renseigner tout les champs';

            // verif si c'est bien un email
        } else if (!filter_var($_POST['usermail'], FILTER_VALIDATE_EMAIL)) {
            $error['usermail'] = 'Mauvais Format';

            // verif si le mail est dans la bdd
        } else if (!$Users->VerifyMailExist($_POST['usermail'])) {
            $error['usermail'] = 'Le mail " ' . $_POST['usermail'] . ' " n\'existe pas';

            // verif si le mdp correspond au mail dans la bdd
        } else if ($Users->VerifyLogin($_POST['usermail'], $_POST['userpassword'])) {
            $error['userpassword'] = 'Le pseudo " ' . $_POST['userpassword'] . ' " existe déja';
            
        } else {
            // tout est bon => login
            $loginSuccess = true;

            // ouverture de la session
            $_SESSION['User'] = $Users->GetUserInfos($mail);

            // redirection vert la page accueil vu qu'on est connecté
            header("location:accueil.php");
            exit; // arrêt du script


        }
    }
}
