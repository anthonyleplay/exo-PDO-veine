<?php
require_once '..\model\user.php';

$timeMajor = time() - (60*60*24*365*18);
$mailRegex = "/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/";
$pseudoRegex = "/^[a-zA-Z0-9éèêëiîïôöüäàç -]{2,25}$/";
$phoneRegex = "/^(0)+[0-9]{1}[ -]{0,1}+[0-9]{2}[ -]{0,1}+[0-9]{2}[ -]{0,1}+[0-9]{2}[ -]{0,1}+[0-9]{2}/";

$error = [];

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // on va chercher les info mail et pseudo en crant un lien vers la bdd
    $Users = new Users();

    //verification du format de mail (usermail)
    if (isset($_POST['usermail'])) {
        
        if (!filter_var($_POST['usermail'], FILTER_VALIDATE_EMAIL)) {
            $error['usermail'] = 'Mauvais Format';
        };
        if ($Users->VerifyMailExist($_POST['usermail'])) {
            $error['usermail'] = 'Le mail " ' . $_POST['usermail'] . ' " existe déja';
        }
        if (empty($_POST['usermail'])) {
            $error['usermail'] = 'Veuillez Renseigner le champ';
        };
    }
    //verification du format de pseudo (userpseudo)
    if (isset($_POST['userpseudo'])) {

        if (!preg_match($pseudoRegex, $_POST['userpseudo'])) {
            $error['userpseudo'] = 'Mauvais Format';
        };
        if ($Users->VerifyPseudoExist($_POST['userpseudo'])) {
            $error['userpseudo'] = 'Le pseudo " ' . $_POST['userpseudo'] . ' " existe déja';
        }
        if (empty($_POST['userpseudo'])) {
            $error['userpseudo'] = 'Veuillez Renseigner le champ';
        };
    }

    //verification du format de telephone (userphone)
    if (isset($_POST['userphone'])) {
        if (!empty($_POST['userphone'])) {
            if (!preg_match($phoneRegex, $_POST['userphone'])) {
                $error['userphone'] = 'Mauvais Format';
            };
        };

    }
    

    
    if (isset($_POST['BirthDate'])) {
    
        if (!preg_match($BirthDateRegex, $_POST['BirthDate'])) {
            $error['BirthDate'] = 'Mauvais Format';
        };
        if (empty($_POST['BirthDate'])) {
            $error['BirthDate'] = 'Veuillez Renseigner le champ';
        };
    }



    if (isset($_POST['Password']) && isset($_POST['VerifPassword'])) {

        if (!preg_match($PasswordRegex, $_POST['Password'])) {
            $error['Password'] = 'Mauvais Format';
        };
        if (empty($_POST['Password'])) {
            $error['Password'] = 'Veuillez Renseigner le champ';
        };
            
        if ($_POST['VerifPassword'] != $_POST['Password'] ) {
            $error['VerfifPassword'] = 'Les mots de passe ne sont pas identiques';
        };
        if (empty($_POST['VerifPassword'])) {
            $error['VerifPassword'] = 'Le champ n\'est pas identique au mot de passe ';
        };
    
    };


}