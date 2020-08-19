<?php
if (isset($_SESSION["user"])){
    session_destroy();
}else{
    header("location:..\index.php"); // redirection
    exit; // arrêt du script
};




?>