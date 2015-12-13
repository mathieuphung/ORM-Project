<?php
namespace Model;

class Connexion extends \PDO{
    private $connexion = null;

    public function __construct($host, $db, $user, $password)
    {
        $this->connexion = new \PDO('mysql:host='.$host.';dbname='.$db, $user, $password);
        $this->connexion->query("SET NAMES utf-8;");
    }

    public function getConnexion()
    {
        return $this->connexion;
    }
}