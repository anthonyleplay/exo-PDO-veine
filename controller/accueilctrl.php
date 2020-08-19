<?php
var_dump($_SESSION['guest']);
if(!isset($_SESSION['guest'])){
    header("location:..\index.php"); // redirection
    exit; // arrêt du script
};






?>