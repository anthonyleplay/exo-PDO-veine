<?php
require_once '..\model\user.php';

$error = [];

if (isset($_POST['usermail'])) {
    if (empty($_POST['usermail'])) {
        $error['usermail'] = 'Veuillez Renseigner le champ';
    };
}

if (isset($_POST['userpassword'])) {
    if (empty($_POST['userpassword'])) {
        $error['userpassword'] = 'Veuillez Renseigner le champ';
    };
}

if (isset($_POST['Login-submit']) && count($error) == 0) {

    $loginUser = new Users;

    $mail = $_POST['usermail'];
    $password = $_POST['userpassword'];
    var_dump($loginUser->VerifyLogin($mail, $password));

    if ($loginUser->VerifyLogin($mail, $password)) {

        session_start();
        $_SESSION['user'] = $loginUser->GetUserInfos($mail);
        header('Location: home.php');

    } else {

        $error['usermail'] = 'mail ou mot de passe incorect';
        $error['userpassword'] = 'mail ou mot de passe incorect';
        
    }
}
