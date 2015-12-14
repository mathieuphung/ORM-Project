<?php
echo "<pre>";

require_once('autoloader.php');

use Model\QueryBuilder as QueryBuilder;
use Model\Log as Log;
use Model\Jean as Jean;

try {
    $connexion = new QueryBuilder('localhost','test', 'root', 'root');
    echo "Vous etes connecte \n";
}
catch (Exception $e) {
    die("Impossible de se connecter a la base de donnee");
}

/*try {
    $response = $connexion->select('*','users');
    var_dump($response);
    Log::access();
}
catch (Exception $e) {
    Log::error();
    die("Impossible de se connecter a la base de donnee");
}*/
// select(data, table1, joinFactor = null, table2 = null, where = null, orderBy = null)
$response = $connexion->select('*','users');
if(!empty($response)) {
    var_dump($response);
    Log::access();
}
else {
    Log::error();
    die("Requete invalide");
}
/*
$response = $connexion->select('*','users', null, null, null, null);
$connexion->update('users', 'username', 'xerxffexex', 'id', '8');
$count = $connexion->count('users');
$exist = $connexion->exist('users', 'id = 9');
if(empty($exist)) {
    echo "user inexistant";
}
else {
    var_dump($exist);
}
//$connexion->delete('users', 'id', '7');
var_dump($response);
var_dump($count);*/

$user = new Jean();
$user->setEmail("jean@gmail.com");
$user->setPassword("toto");
$user->setUsername("jean");
$user->getAll();
var_dump($user->infos);