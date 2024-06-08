<?php
try{
$bd = new PDO(
    'mysql:host=localhost;dbname=ict217;charset=utf8','root',''
);
}catch(EXception $e){
    die("erreur : ".$e->getMessage());
}

function Verif($donnees){
    $donnees = trim($donnees);
    $donnees = stripslashes($donnees);
    $donnees = strip_tags($donnees);
    return $donnees;
}

?>