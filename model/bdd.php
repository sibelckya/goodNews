<?php

class BDD
{
    public static function connexion()
    {
        try{
            $bdd = new PDO("mysql:host=localhost;dbname=goodnews","root","");
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $bdd;
        }
        catch(Exception $e)
        {
            echo "Probleme BDD $e";
        }
    }
}
