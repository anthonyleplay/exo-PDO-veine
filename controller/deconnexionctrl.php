<?php
if (isset($_SESSION["guest"])){
    session_destroy();
}else{
    header("location:..\index.php"); // redirection
    exit; // arrêt du script
};




?>