<?php
session_start();
$_SESSION['modele'] = "";
include_once('./bd_connect.php');

if(isset($_POST['choix1']))
{
    $_SESSION['modele'] = "modele1";
    header('Location: form.php');
}
if(isset($_POST['choix2']))
{
    $_SESSION['modele'] = "modele2";
    header('Location: form.php');
}
if(isset($_POST['choix3']))
{
    $_SESSION['modele'] = "modele3";
    header('Location: form.php');
}
if(isset($_POST['choix4']))
{
    $_SESSION['modele'] = "modele4"; 
    header('Location: form.php');
}
?>