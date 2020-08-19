<?php
session_start();
require_once '..\controller\accueilctrl.php';

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="..\style\style.css">
    <title>Veine - Accueil</title>
</head>

<body>
    <header class="container">
        <div class="row justify-content-center text-center">
            <div class="col py-5">
                <h1 class="title-veine">VEINE</h1>
                <p class="text-white">Venez parier bande de veinards !</p>
            </div>
        </div>
    </header>
    <main class="container">
        <div class="row justify-content-center text-center">
            <div class="col">

                <h2>Bienvenue XXXXXX</h2>

                <a href="contact.php"><button class="btn btn-light">Liste de contact</button></a><br><br>
                <a href="register.php"><button class="btn btn-light">Lancer un pari</button></a><br><br>
                <a href="deconnexion.php"><button class="btn btn-dark">Déconnexion</button></a>
            </div>
        </div>
    </main>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>