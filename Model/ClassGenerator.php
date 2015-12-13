<?php
function do_tabs($tabs)
{
    $ret = '';
    for ($i=0; $i < $tabs; $i++) {
        $ret .= ' ';
        return $ret;
    }
}
$host = $argv[1];
$db = $argv[2];
$user = $argv[3];
$password= $argv[4];
$tableName = $argv[5];
$className = $argv[6];
// Do some magic here
$tabs = 2;
$code = "<?php\n\n";
$code .= "namespace Model;\n\n";
$code .= 'class' .  ucfirst($className). '\n{\n';

function select($host, $db, $user, $password, $tableName) {
    $query = "SHOW columns FROM $tableName";

    $response = new PDO('mysql:host='.$host.';dbname='.$db, $user, $password);
    $prepare = $response->prepare($query);
    $prepare->execute();
    $data = $prepare->fetchAll();

    return $data;
}
$fields = select($host, $db, $user, $password, $tableName);

foreach ($fields as $field)
{
    $code .= do_tabs($tabs) . 'protected $'.$field['Field'].";\n";
}
$code .= "\n";
foreach ($fields as $field)
{
    $code .= do_tabs($tabs) . 'public function get'.ucfirst($field['Field'])."()\n";
    $code .= do_tabs($tabs) . "{\n";
    $code .= do_tabs($tabs+2) . 'return $this->'.$field['Field'].";\n";
    $code .= do_tabs($tabs) . "}\n\n";
    $code .= do_tabs($tabs) . 'public function set'.ucfirst($field['Field']).'($'.$field['Field'].")\n";
    $code .= do_tabs($tabs) . "{\n";
    $code .= do_tabs($tabs+2) . '$this->'.$field['Field'].' = $'.$field['Field'].";\n";
    $code .= do_tabs($tabs) . "}\n\n";
}
$code .= "}\n";
file_put_contents($className.".php", $code);