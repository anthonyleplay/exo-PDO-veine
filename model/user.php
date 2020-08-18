<?php
class Users

{
    private $bdd;

    public function __construct()
    {
        try {
            $this->bdd = new PDO('mysql:host=localhost;dbname=bdd_veine;charset=utf8', 'root', '');
            // Activation des erreurs PDO
            $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // mode de fetch par défaut : FETCH_ASSOC / FETCH_OBJ / FETCH_BOTH
            $this->bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function VerifyMailExist($mail)
    {

        $query = 'SELECT `users_mail` FROM lhp4_users WHERE `users_mail` =  "' . $mail .'"' ;

        try {
            $resultQuery = $this->bdd->query($query);
            $count = $resultQuery->rowCount();
            if ($count == 0) {
                return false;
            }else {
                return true;
            }
        
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function VerifyPseudoExist($pseudo)
    {

        $query = 'SELECT `users_pseudo` FROM lhp4_users WHERE `users_pseudo` =  "' . $pseudo .'"' ;

        try {
            $resultQuery = $this->bdd->query($query);
            $count = $resultQuery->rowCount();
            if ($count == 0) {
                return false;
            }else {
                return true;
            }
        
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
}