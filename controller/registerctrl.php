<?php
require_once '..\model\user.php';

$timeMajor = time() - (60*60*24*365*18);
$mailRegex = "/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/";
$pseudoRegex = "/^[a-zA-Z0-9éèêëiîïôöüäàç -]{2,25}$/";
$phoneRegex = "/^(0)+[0-9]{1}[ -]{0,1}+[0-9]{2}[ -]{0,1}+[0-9]{2}[ -]{0,1}+[0-9]{2}[ -]{0,1}+[0-9]{2}/";
$birthDateRegex = "/([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))/";
$PasswordRegex = "/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{,}$/";

$registerSuccess = false;

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
    

    
    if (isset($_POST['userbirthdate'])) {
    
        if (!preg_match($birthDateRegex, $_POST['userbirthdate'])) {
            $error['userbirthdate'] = 'Mauvais Format';
        };
        if (empty($_POST['userbirthdate'])) {
            $error['userbirthdate'] = 'Veuillez Renseigner le champ';
        };
    }



    if (isset($_POST['userpassword']) && isset($_POST['userpasswordverify'])) {

        // if (!preg_match($PasswordRegex, $_POST['userpassword'])) {
        //     $error['userpassword'] = 'Mauvais Format';
        // };
        if (empty($_POST['userpassword'])) {
            $error['userpassword'] = 'Veuillez Renseigner le champ';
        };
        if (empty($_POST['userpasswordverify'])) {
            $error['userpasswordverify'] = 'Veuillez Renseigner le champ';
        };
        if ($_POST['userpasswordverify'] != $_POST['userpassword']) {
            $error['userpasswordverify'] = 'Les mots de passe ne sont pas identiques';
        };
    };
    
    if (isset($_POST['g-recaptcha-response'])) {
        // clé captcha !!!
        $key = "6LdCzcAZAAAAAJp0zx8f1Gxpn96JFhL1GE9hZwML";
        $captchaResponse = $_POST['g-recaptcha-response'];
        $remoteip = $_SERVER['REMOTE_ADDR'];
        $api_url = "https://www.google.com/recaptcha/api/siteverify?secret=" . $key . "&response=" . $captchaResponse . "&remoteip=" . $remoteip;
        $decode = json_decode(file_get_contents($api_url), true);
    };
    
    if (isset($_POST['Register-submit']) && count($error) == 0) {
    
        if ($decode['success'] == true) {
    
            $Users = new Users();
    
            $mail = htmlspecialchars($_POST['usermail']);
            $pseudo = htmlspecialchars($_POST['userpseudo']);
            $phone = htmlspecialchars($_POST['userphone']);
            $password = password_hash($_POST['userpassword'], PASSWORD_BCRYPT);
            $birthdate = htmlspecialchars($_POST['userbirthdate']);
    
    
            $Users->AddUsers($mail, $pseudo, $phone, $password, $birthdate);
            
            $registerSuccess = true;
    
        } else {
            $messageError = 'Erreur : Veuillez cochez le captcha pour vous inscrire';
        };
    };
}