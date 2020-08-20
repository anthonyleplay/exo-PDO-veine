<?php

require_once '..\controller\registerctrl.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="..\style\style.css">
    <title>Veine - S'inscrire</title>
</head>

<body>
    <!-- header -->
    <?php
    require_once 'part\header.php';
    ?>
    
    <main class="container">
        <div class="row justify-content-center text-center">
            <div class="col-12 col-md-8 col-lg-6">

                <?php
                if ($registerSuccess) { ?>

                    <h1>Bravo vous êtes inscris</h1>

                    <a href="login.php"><button class="btn btn-light">Connexion</button></a>

                <?php
                } else { ?>
                    <form action="" method="post">
                        <div class="form-group bg-light px-2 rounded">
                            <label for="usermail">Votre mail</label><br>
                            <input type="email" class="form-control" name="usermail" id="usermail" placeholder="eMail" value="<?= isset($_POST['usermail']) ? htmlspecialchars($_POST['usermail']) : '' ?>">
                            <span class="text-danger"><?= isset($error['usermail']) ? $error['usermail'] : '<br>' ?></span>
                        </div>
                        <div class="form-group bg-light px-2 rounded">
                            <label for="userpseudo">Votre pseudo</label><br>
                            <input type="text" class="form-control" name="userpseudo" id="userpseudo" placeholder="Pseudo" value="<?= isset($_POST['userpseudo']) ? htmlspecialchars($_POST['userpseudo']) : '' ?>">
                            <span class="text-danger"><?= isset($error['userpseudo']) ? $error['userpseudo'] : '<br>' ?></span>
                        </div>
                        <div class="form-group bg-light px-2 rounded">
                            <label for="userphone">Votre telephone</label><br>
                            <input type="text" class="form-control" name="userphone" id="userphone" placeholder="Téléphone" value="<?= isset($_POST['userphone']) ? htmlspecialchars($_POST['userphone']) : '' ?>">
                            <span class="text-danger"><?= isset($error['userphone']) ? $error['userphone'] : '<br>' ?></span>
                        </div>
                        <div class="form-group bg-light px-2 rounded">
                            <label for="userbirthdate">date de naissance</label><br>
                            <input type="date" class="form-control" name="userbirthdate" id="userbirthdate" placeholder="jj/mm/aaaa" value="<?= isset($_POST['userbirthdate']) ? htmlspecialchars($_POST['userbirthdate']) : '' ?>">
                            <span class="text-danger"><?= isset($error['userbirthdate']) ? $error['userbirthdate'] : '<br>' ?></span>
                        </div>
                        <div class="form-group bg-light px-2 rounded">
                            <label for="userpassword">Taper votre Mot de passe</label><br>
                            <input type="password" class="form-control" name="userpassword" id="userpassword" placeholder="Mot de passe" value="<?= isset($_POST['userpassword']) ? htmlspecialchars($_POST['userpassword']) : '' ?>">
                            <span class="text-danger"><?= isset($error['userpassword']) ? $error['userpassword'] : '<br>'  ?></span>
                        </div>
                        <div class="form-group bg-light px-2 rounded">
                            <label for="userpasswordverify">Retaper votre Mot de passe</label><br>
                            <input type="password" class="form-control" name="userpasswordverify" id="userpasswordverify" placeholder="Mot de passe" value="<?= isset($_POST['userpasswordverify']) ? htmlspecialchars($_POST['userpasswordverify']) : '' ?>">
                            <span class="text-danger"><?= isset($error['userpasswordverify']) ? $error['userpasswordverify'] : '<br>' ?></span>
                        </div>

                        <!-- inserer la div avec la data-sitekey (capchat-->
                        <div class="g-recaptcha testcaptcha pb-3" data-sitekey="6LdCzcAZAAAAAEvKOYrGotPFigsbfe169jaZJOIK"></div>

                        <div class="form-group">
                        <button type="submit" id="Register-submit" name="Register-submit">S'inscrire</button>
                        </div>

                    </form>
                    <p class="text-white">Vous avez deja un compte : <a href="login.php" class="text-light">Connexion</a> </p>
                <?php
                } ?>
                
            </div>
        </div>
    </main>


    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>