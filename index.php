<?php
echo "<pre>";

require_once('autoloader.php');

use Model\Connexion as Connexion;
use Model\QueryBuilder as QueryBuilder;

try {
    $connexion = new Connexion('localhost','cinema', 'root', '');
    echo "Vous etes connecte \n";
}
catch (Exception $e) {
    die("Impossible de se connecter a la base de donnee");
}

$query = new QueryBuilder('localhost','test', 'root', '');
$response = $query->select('*','users', null, null, null, null);
$query->update('users', 'username', 'xerxffexex', 'id', '8');
$count = $query->count('users');
$exist = $query->exist('users', 'id = 9');
if(empty($exist)) {
    echo "user inexistant";
}
else {
    var_dump($exist);
}
//$query->delete('users', 'id', '7');
var_dump($response);
var_dump($count);
