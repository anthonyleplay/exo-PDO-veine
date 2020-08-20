<?php
require_once '..\controller\loginctrl.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="..\style\style.css">
    <title>Veine - Connexion</title>
</head>

<body>
    <!-- header -->
    <?php
    require_once 'part\header.php';
    ?>
    
    <main class="container">
        <div class="row justify-content-center text-center">
            <div class="col-12 col-md-8 col-lg-6">
                <form action="" method="post">
                    <div class="form-group bg-light px-2 rounded">
                        <label for="usermail">Votre mail</label><br>
                        <input type="email" class="form-control" name="usermail" id="usermail" placeholder="eMail" value="<?= isset($_POST['usermail']) ? htmlspecialchars($_POST['usermail']) : '' ?>">
                        <span class="text-danger"><?= isset($error['usermail']) ? $error['usermail'] : '<br>' ?></span>
                    </div>
                    <div class="form-group bg-light px-2 rounded">
                        <label for="userpassword">Taper votre Mot de passe</label><br>
                        <input type="password" class="form-control" name="userpassword" id="userpassword" placeholder="Mot de passe" value="<?= isset($_POST['userpassword']) ? htmlspecialchars($_POST['userpassword']) : '' ?>">
                        <span class="text-danger"><?= isset($error['userpassword']) ? $error['userpassword'] : '<br>'  ?></span>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-light" type="submit" id="Login-submit" name="Login-submit">Se Connecter</button>
                    </div>

                    <p class="text-white">Vous n'avez pas de compte : <a href="register.php" class="text-light">S'inscrire</a> </p>
                </form>
            </div>
        </div>
    </main>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>