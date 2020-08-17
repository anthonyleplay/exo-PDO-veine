<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style\style.css">
    <title>Veine</title>
</head>

<body>
    <header class="container">
        <div class="row justify-content-center text-center">
            <div class="col">
                <h1>VEINE</h1>
            </div>
        </div>
    </header>
    <main class="container">
        <div class="row justify-content-center text-center">
            <div class="col">
                <form action="index.php" method="get">
                    <label for="usermail">Votre mail</label><br>
                    <input type="email" name="usermail" id="usermail"><br>

                    <label for="userpseudo">Votre pseudo</label><br>
                    <input type="text" name="userpseudo" id="userpseudo"><br>

                    <label for="userphone">Votre telephone</label><br>
                    <input type="text" name="userphone" id="userphone"><br>

                    <label for="userbirthdate">date de naissance</label><br>
                    <input type="date" name="userbirthdate" id="userbirthdate"><br>

                    <label for="userpassword">Taper votre Mot de passe</label><br>
                    <input type="password" name="userpassword" id="userpassword"><br>

                    <label for="userpasswordverify">Retaper votre Mot de passe</label><br>
                    <input type="password" name="userpasswordverify" id="userpasswordverify">
                </form>
            </div>
        </div>
    </main>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>