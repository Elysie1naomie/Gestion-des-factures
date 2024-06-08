<?php
    include('bd.php');
    require_once('verif.php');
    
if(isset($_POST['submit']))
{

    $_SESSION['mail'] = $email = Verif($_POST['emaillocataire']);
    $_SESSION['immobilier'] = $immobilier = Verif($_POST['typeproprio']);
    $_SESSION['ville'] = $villelo = Verif($_POST['villelo']);
    $_SESSION['bailleur'] = $_SESSION['name'];
    $_SESSION['locataire'] = $nomlocataire = Verif($_POST['nomlocataire']);
    $_SESSION['sommemois'] = $sommemois = Verif($_POST['sommemois']);
    $_SESSION['nbrmois'] = $nbrmois = Verif($_POST['nbrmois']);
    $_SESSION['total'] = $total = Verif($sommemois * $nbrmois );
    $_SESSION['modepaiement'] = $modepaiement = Verif($_POST['modepaiement']);
    $_SESSION['datedebut'] = $datedebut = Verif($_POST['datedebut']);
    $_SESSION['datefin'] = $datefin = Verif($_POST['datefin']);
    $_SESSION['datepaiement'] = $datepaiement = Verif($_POST['datepaiement']);
    $_SESSION['lieufait'] = $lieufait = Verif($_POST['lieufait']);
    $_SESSION['datefait'] = $datefait = Verif($_POST['datefait']);
    $_SESSION['mailbailleur'] = $_SESSION['email'];
    $_SESSION['valide'] = 0;
   

    if($_SESSION['modele'] === "modele1")
    {
        header('Location: view.php');
    }
    if($_SESSION['modele'] === "modele2")
    { 
        header('Location: view2.php');
    }
    if($_SESSION['modele'] === "modele3")
    {
        header('Location: view3.php');
    }
    if($_SESSION['modele'] === "modele4")
    {
        header('Location: view4.php');
    }
}

?>