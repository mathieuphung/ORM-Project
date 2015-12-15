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

// select(data, table1, joinFactor = null, table2 = null, $whereParam = null, $whereValue = null, orderBy = null)
// SELECT
/*
$response = $connexion->select('*','users', null, null, null, null);
if(!empty($response)) {
    var_dump($response);
    Log::access();
}
else {
    Log::error();
    die("Requete invalide");
}*/

// WHERE
/*$response = $connexion->select('*','users', null, null, 'id', 8);
if(!empty($response)) {
    var_dump($response);
    Log::access();
}
else {
    Log::error();
    die("Requete invalide");
}*/

// update($table, array $column, array $data, $whereParam, $whereValue)
//$connexion->update('users', ['username'], ['rrecezc'], 'id', '8');

// COUNT
/*$count = $connexion->count('users');
if(!empty($count)) {
    var_dump($count);
    Log::access();
}
else {
    Log::error();
    die("Requete invalide");
}*/

// EXIST
/*$exist = $connexion->exist('users', 'id', 9);
if(!empty($exist)) {
    var_dump($exist);
    Log::access();
}
else {
    Log::error();
    die("Requete invalide");
}*/

// DELETE
/*$delete = $connexion->delete('users', 'id', 56);
var_dump($delete);*/

// PERSIST
/*
$user = new Jean();
$user->getWithId(10);
var_dump($user->getAll());
$user->setUsername('yolo');
$user->setPassword('tonton');
var_dump($user->getAll());

$connexion->persist($user);*/