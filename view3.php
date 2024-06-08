<?php
include('bd.php');
require_once("verif.php");
$a = $_SESSION['locataire'];
$c = $_SESSION['immobilier'];
$d = $_SESSION['name'];
$x = $_SESSION['mail'];
require_once("PHPMailer/src/Exception.php");
require_once("PHPMailer/src/SMTP.php");
require_once("PHPMailer/src/PHPMailer.php");

use PHPMailer\PHPMailer\PHPMailer;
$mail = new PHPMailer(true);


if(isset($_GET['action']) && $_GET['action'] == 2 && $_SESSION['valide'] == 0){

    // Vvariables 

    

$reponse3 = $bd->query("SELECT id_bailleur from `bailleur` where nom = '$d' " );
$donnees3 = $reponse3->fetch();


$id_bail =$donnees3['id_bailleur'];

    //insertion dans immobilier
    $requete = $bd->prepare('INSERT INTO immobilier(id_immobilier,nom,ville) VALUES(null,:ue,:tp)');
    $requete->bindvalue(':ue',$_SESSION['immobilier']);
    $requete->bindvalue(':tp',$_SESSION['ville']);
    $result = $requete->execute();

    
$reponse2 = $bd->query("SELECT id_immobilier from `immobilier` where nom = '$c' " );
$donnees2 = $reponse2->fetch();


$id_immo =$donnees2['id_immobilier'];

    //Gestion du locataire
    
    $rep2 = $bd->query("SELECT * FROM `locataire` WHERE email = '$x' ");
    $nbr2 = $rep2->rowCount();

    if($nbr2 >0)
    {
        echo "  <script> alert('Adresse email déjà occupé!!!!')</script>" ;
    }else{

        $requete = $bd->prepare("INSERT INTO locataire(id_locataire,nom,email,tel) VALUES(null,:ue,:tp1,'')");
        $requete->bindvalue(':ue',$a);
        $requete->bindvalue(':tp1',$_SESSION['mail']);
        $result = $requete->execute();
    }

    
    

    //insertion dans contrat

    $reponse1 = $bd->query("SELECT id_locataire from `locataire` where nom = '$a' " );
    $donnees1 = $reponse1->fetch();
    $id_loca =$donnees1['id_locataire'];

    $rep1 = $bd->query("SELECT * FROM `contrat` WHERE id_locataire = $id_loca ");
    $nbr1 = $rep1->rowCount();

    if($nbr1 >0)
    {
        echo "  <script> alert('Un locataire ne peut avoir plus d'un contrat !!!!')</script>" ;
    }else{

        $requete = $bd->prepare("INSERT INTO contrat(id_contrat,nom,id_locataire,id_immobilier,id_bailleur,montant,periode)
        VALUES(not null, 'Facture de Loyer',:tp1,:tp2,:tp3,:tp4,:tp)");
       $requete->bindvalue(':tp1',$id_loca);
       $requete->bindvalue(':tp2',$id_immo);
       $requete->bindvalue(':tp3',$id_bail);
       $requete->bindvalue(':tp4',$_SESSION['total']);
       $requete->bindvalue(':tp',$_SESSION['datefin']);
       $result = $requete->execute();
   
    }


    // insertion dans modèle 

    $requete = $bd->prepare("INSERT INTO model(id_model,entete,pieds_page,document,Typemodele)
    values ('','','','',:ue)");
     $requete->bindvalue(':ue',$_SESSION['modele']);
     $result = $requete->execute();

    // insertion dans facture 

    $h=  $_SESSION['modele'];
    $f =  $_SESSION['locataire'];
    $g =  $_SESSION['name'];

    //optention de l'id du modele

    $reponse1 = $bd->query("SELECT id_model from `model` where Typemodele = '$h' " );
    $donnees1 = $reponse1->fetch();
    $id_model =$donnees1['id_model'];

    //optention de l'id du contrat 

    $reponse1 = $bd->query("SELECT id_contrat from `contrat`,`bailleur`, `locataire`
     where contrat.id_bailleur = bailleur.id_bailleur and locataire.id_locataire = contrat.id_locataire and 
     bailleur.nom = '$g' and locataire.nom = '$f'" );
    $donnees1 = $reponse1->fetch();
    $id_contrat =$donnees1['id_contrat'];

    // insertion de la facture 

    $rep = $bd->query("SELECT * FROM `facture` WHERE id_contrat = $id_contrat ");
    $nbr = $rep->rowCount();

    if($nbr >0)
    {
        echo "  <script> alert('Un locataire ne peut avoir qu'un seul immobilier !!!!')</script>" ;

    }else{

        $requete = $bd->prepare("INSERT INTO facture(id_model,id_facture,id_contrat,date_creation,date_modification,id_immobilier,statut)
        values (:ue2,not null,:ue4,:ue5,:u6,:ue1,0)");
        $requete->bindvalue(':ue2',$id_model);
        $requete->bindvalue(':ue4',$id_contrat);
        $requete->bindvalue(':ue5',$_SESSION['datedebut']);
        $requete->bindvalue(':u6',$_SESSION['datefin']);
        $requete->bindvalue(':ue1',$id_immo);
        $result = $requete->execute();

    }
    
                // Id_facture pour la génération de la facture sous forme de pdf 
                $reponse = $bd->query("SELECT id_facture FROM `facture`, `contrat`,`locataire`
                where facture.id_contrat = contrat.id_contrat and locataire.id_locataire = contrat.id_locataire and locataire.nom = '$f'" );
                $donnees = $reponse->fetch();

                $_SESSION['id'] = $donnees['id_facture'];
                $id = $_SESSION['id'];

    //insertion dans payement 
    $requete = $bd->prepare('INSERT INTO payement(id_facture,mode_payement) VALUES(:ue,:tp)');
    $requete->bindvalue(':ue',$id);
    $requete->bindvalue(':tp',$_SESSION['modepaiement']);
    $result = $requete->execute();
       

    
    echo "<script> alert('Enregistrement effectué avec succès  !!!!')</script>" ;
    $_SESSION['valide'] = 1;

} else if(isset($_GET['action'])  && $_GET['action'] == 2 && $_SESSION['valide'] == 1){
  echo "<script> alert('Facture déjà enregistrée !')</script>";
}


//Gestion du id de la facture

/*$id =$donnees['id_facture'];
*/

if(isset($_GET['action']) && $_GET['action'] == 1){
try {

    $id = $_SESSION['id'];
    $k = $_SESSION['mailbailleur'];
    $j = $_SESSION['mail'];
    // Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;
    $mail->Username = 'clothairegastalia@gmail.com'; // YOUR gmail email
    $mail->Password = 'hottvqijalcejpqi'; // YOUR gmail password

    // Sender and recipient settings
    $mail->setFrom($k, $_SESSION['bailleur']);
    $mail->addAddress($j, $_SESSION['locataire']);
    $mail->addReplyTo($k, 'Sender Name'); // to set the reply to
    $date = date("d_m_Y");
    $mail->addAttachment('C:/Users/George/Downloads/'.$id.' Facture de Loyer fait le '.$date.'.pdf');
    // Setting the email content
    $mail->IsHTML(true);
    $mail->Subject = "Votre Facture du Loyer !";
    $mail->Body = 'Merci d\'avoir payé votre loyer, le document ci-dessous est votre facture de loyer et tient en guise de droit !';
    $mail->AltBody = 'Plain text message body for non-HTML email client. Gmail SMTP email body.';

    $mail->send();

    $req = $bd->prepare(" UPDATE facture SET statut = 1 where id_facture = $id ");
    $req->execute();
    echo "<script>alert('Facture envoyée avec succès !')</script>";
} catch (Exception $e) {
    echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
}
}


?>
<!-- Coding by CodingLab | www.codinglabweb.com -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="css/panel.css">
    <link rel="stylesheet" href="css/side.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
     
    <!----===== Boxicons CSS ===== -->
    <link rel="stylesheet" href="css/facture1.css">
    <link href='icons/boxicons-2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="icons/fontawesome-free-6.3.0-web/css/all.min.css">
    
    <title>Dashboard Sidebar Menu</title> 
<style>

.tab{
    border-collapse: collapse;
    min-width: 100px;
    width: auto;
    box-shadow: 0 5px 50px rgba(0, 0, 0, 0,15);
    cursor: pointer;
    border: 2px solid lightgreen;
}
thead tr{
    /* background-color: white;
    color: black; */
    text-align: left;
}
th,td{
    padding: 5px 5px;
}
tbody tr, td, th{
    border: 1px solid lightgreen;
}
.haut{
    display: flex;
}
.hautg{
    margin-right: 15%;
}
.gauche{
     margin-right: 15%; 
    
}
.hautm{
    margin-right: 10%;
}
.hautd{
    margin-right: 17%;
}
.card-header{
    margin-right: 15%;
    background: none;
}
</style>
</head>
<body>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="images/logo1.png" alt="">
                </span>

                <div class="text logo-text">
                    <span class="name">YACHIN</span>
                    <span class="profession">Facturez votre vie</span>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">
               <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa-solid fa-paint-roller icon"></i>
                </div>
                <div class="panel-body texts nav-text" id="couleur">
                    <p>
                    Couleur du texte :</br>
                   <a href="javascript:changecouleur('#000000');" id="noir"> N </a>
                   <a href="javascript:changecouleur('#FF0000');" id="rouge"> R </a>
                   <a href="javascript:changecouleur('#00FF00');" id="vert"> V </a>
                   <a href="javascript:changecouleur('#0000FF');" id="bleu"> B </a>
                   <a href="javascript:changecouleur('#FF00FF');" id="rose"> R </a>
                   <a href="javascript:changecouleur('#FFFF00');" id="jaune"> J </a>
                   <a href="javascript:changecouleur('#00FFFF');" id="cyan"> C </a></br></br>

                   <a href="javascript:changecouleur('#808080');" id="gris"> G </a>
                   <a href="javascript:changecouleur('#800080');" id="violet"> V </a>
                   <a href="javascript:changecouleur('#FFFFFF');" id="blanc"> B </a>
                   <a href="javascript:changecouleur('#F0F8FF');" id="AliceBlue"> A </a>
                   <a href="javascript:changecouleur('#B22222');" id="FireBrick"> F </a>
                   <a href="javascript:changecouleur('#00ffff');" id="blueciel"> B </a>
                   <a href="javascript:changecouleur('#00bfff');" id="bluecalm"> B </a>
                </p>
                </div>
                <div class="panel-body texts nav-text" id="couleurs">
                    <p>
                    Couleur de font :</br>
                   <a href="javascript:changecouleurfont('#000000');" id="noir"> N </a>
                   <a href="javascript:changecouleurfont('#FF0000');" id="rouge"> R </a>
                   <a href="javascript:changecouleurfont('#00FF00');" id="vert"> V </a>
                   <a href="javascript:changecouleurfont('#0000FF');" id="bleu"> B </a>
                   <a href="javascript:changecouleurfont('#FF00FF');" id="rose"> R </a>
                   <a href="javascript:changecouleurfont('#FFFF00');" id="jaune"> J </a>
                   <a href="javascript:changecouleurfont('#00FFFF');" id="cyan"> C </a></br></br>

                   <a href="javascript:changecouleurfont('#808080');" id="gris"> G </a>
                   <a href="javascript:changecouleurfont('#800080');" id="violet"> V </a>
                   <a href="javascript:changecouleurfont('#FFFFFF');" id="blanc"> B </a>
                   <a href="javascript:changecouleurfont('#F0F8FF');" id="AliceBlue"> A </a>
                   <a href="javascript:changecouleurfont('#B22222');" id="FireBrick"> F </a>
                   <a href="javascript:changecouleurfont('#00ffff');" id="blueciel"> B </a>
                   <a href="javascript:changecouleurfont('#00bfff');" id="bluecalm"> B </a>
                </p>
                </div>
                <div class="panel-heading">
                    <i class="fa-solid fa-text-width icon"></i>
                </div>
                <div class="panel-body texts nav-text" id="taille">
                    <p>
                    Taille du texte :</br> <a href="javascript:changetaille(10);">10</a> <a href="javascript:changetaille(20);">20</a> <a href="javascript:changetaille(30);">30</a> <a href="javascript:changetaille(40);">40</a> <a href="javascript:changetaille(50);">50</a>
                  </p>
                </div>

                <div class="panel-heading">
                    <i class="fa-solid fa-font icon"></i>
                </div>
                <div class="panel-body texts nav-text">
                    <a href="javascript:changefontstyle('Arial');"> Arial</a> </br>
                    <a href="javascript:changefontstyle('Helvetica Neue');"> Helvetica Neue </a></br>
                    <a href="javascript:changefontstyle('Cambria');"> Cambria </a></br>
                    <a href="javascript:changefontstyle('Verdana');"> Verdana </a></br>
                    <a href="javascript:changefontstyle('Times New Roman');"> Times New Roman </a></br>
                    <a href="javascript:changefontstyle('Franklin Gothic Medium');"> Franklin Gothic Medium</a></br>
                    <a href="javascript:changefontstyle('Impact');"> Impact </a>
                </div>
            </div>

                <ul class="menu-links">
                    <li class="nav-link">
                    <form action="view3.php" method="post">
                        <a href="?action=1" class="download-button">
                            <i class='bx bx-send icon' ></i>
                            <span class="text nav-text">Envoyer</span>
                        </a>
                        </form>
                    </li>

                    <li class="nav-link">
                    <a href="view3.php?action=2">
                            <i class='bx bx-save icon' ></i>
                            <span class="text nav-text">Enregistrer</span>
                        </a>
                    </li>

                    <li class="nav-link">
                    <a class="download-button" onclick="generatePDF(<?php echo $_SESSION['id'] ?>)">
                            <i class='bx bx-printer icon'></i>
                            <span class="text nav-text">Imprimer</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="index.php">
                        <i class='bx bx-log-out icon' ></i>
                        <span class="text nav-text">Accueil</span>
                    </a>
                </li>

            </div>
        </div>

    </nav>

    <section class="home">
        <div class="row" id ="invoice" style="color: lightgreen;">
            <section class="bas" id="texte">
                <div class="card-block" style="background-color: white; width: 25cm; margin-left: 100px; font-size: 1.1rem;" id="textet">
                    <div id="texteu">
                    <form id="main" method="post" action="/" novalidate="" >
                        <div style="padding: 5%;"  id="textes">  
                            <section class="haut">
                                <section class="hautg">
                                    <div class="gauche" style=" width: 5cm;">
                                        <form action="">
                                            <span>Loyer/mois:   <b><?php echo $_SESSION['sommemois'];?></b> </span><br>
                                            <span>Nombres de mois :   <b><?php echo $_SESSION['nbrmois'];?></b></span><br>
                                            <span>Total:   <b><?php echo  $_SESSION['total'];?></b></span><br>
                                            <span>Nom du Bailleur:   <b><?php echo $_SESSION['bailleur'];?></b></span><br>
                                            
                                        </form>
                                    </div>
                                </section>     
                                <section class="hautm">    
                                    <div class="milieu" style=" width: 2cm;">
                                        <table class="tab" style="margin-right: 0px;">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>                                    
                                            </thead>
                                            
                                            <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                </tr><tr>
                                                    <td></td>
                                                    <td></td>
                                                </tr><tr>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                </tr><tr>
                                                    <td></td>
                                                    <td></td>
                                                </tr><tr>
                                                    <td></td>
                                                    <td></td>
                                                </tr><tr>
                                                    <td></td>
                                                    <td></td>
                                                </tr><tr>
                                                    <td></td>
                                                    <td></td>
                                                </tr><tr>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            </tbody>       
                                        </table>
                                    </div>
                                </section>  
                                <section class="hautd">
                                    <div  class="card-header" style=" width: 12cm; font-size: 2rem; font-family:britannic bold; text-decoration:solid;">
                                        QUITTANCE DE LOYER<br><br><br>
                                        <p style="font-size: 1.1rem;">RECU de Mr/Mme  <b><?php echo strtoupper($_SESSION['locataire']);?></p>
                                    </div>
                                </section>       
                            </section>  <br>      
                            <div class="form-group row" >
                                <p style="font-size: 1.2rem;" id="textei">
                                    La somme de : <b><?php echo  $_SESSION['total']." F CFA";?></b><br> pour le montant  <b><?php echo $_SESSION['nbrmois'];?></b>  d'un mois de loyer des locaux qu'il/qu'elle occupe dans la maison situee
                                    
                                    <b><?php echo $_SESSION['ville'];?></b> <br> le dit  <b><?php echo $_SESSION['immobilier'];?> </b> commencant le  <b><?php echo $dat_reverse = substr($_SESSION['datedebut'],8,10).'-'.substr($_SESSION['datedebut'],5,2).'-'.substr($_SESSION['datedebut'],0,4);?></b> et finissant le   <b><?php echo $dat_reverse = substr($_SESSION['datefin'],8,10).'-'.substr($_SESSION['datefin'],5,2).'-'.substr($_SESSION['datefin'],0,4);?></b> sous toutes reserves de droit DONT QUITTANCE.
                                </p> 
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </section>
        </div> 
            
    </section>
    <script>
      const button = document.getElementByClassName("download-button");

      function generatePDF(e) {
        // Choose the element that your content will be rendered to.
        const element = document.getElementById("invoice");
        // Choose the element and save the PDF for your user.
        var d = new Date();
        var j = d.getDate();
        var m = d.getMonth();
        m++;
        if(m<10){var m ='0'+m;}
        var a = d.getFullYear();
        var opt = {
            margin: 0,
            filename: e+' Facture de Loyer fait le '+j+'_'+m+'_'+a+'.pdf',
            image: {type: 'jpeg', quality: 0.98},
            html2canvas: {scale: 1},
            jsPDF: {unit: 'in', format: 'letter', orientation: 'landscape'}
        };
        html2pdf().set(opt).from(element).save();
      }
    </script>
    <script src="js/side.js"></script>
    <script src="js/panel.js"></script>
    <script src="js/html2pdf.bundle.min.js"></script>
</body>
</html>