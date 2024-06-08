<!-- Coding by CodingLab | www.codinglabweb.com -->
<?php
include("bd.php");
require_once("verif.php");
require_once("PHPMailer/src/Exception.php");
require_once("PHPMailer/src/SMTP.php");
require_once("PHPMailer/src/PHPMailer.php");

use PHPMailer\PHPMailer\PHPMailer;
$mail = new PHPMailer(true);


$id = 3;
if(isset($_GET['action']) && $_GET['action'] == 1){
try {
    // Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->Username = 'clothairegastalia@gmail.com'; // YOUR gmail email
    $mail->Password = 'hottvqijalcejpqi'; // YOUR gmail password

    // Sender and recipient settings
    $mail->setFrom('clothairegastalia@gmail.com', 'yo');
    $mail->addAddress('clothairegastalia@gmail.com', 'Receiver Name');
    $mail->addReplyTo('yvanndjock8@gmail.com', 'Sender Name'); // to set the reply to
    $date = date("d_m_Y");
    $mail->addAttachment('C:/Users/George/Downloads/'.$id.' Facture de Loyer fait le '.$date.'.pdf');
    // Setting the email content
    $mail->IsHTML(true);
    $mail->Subject = "Votre Facture du Loyer !";
    $mail->Body = 'Merci d\'avoir payé votre loyer, le document ci-dessous est votre facture de loyer et tient en guise de droit !';
    $mail->AltBody = 'Plain text message body for non-HTML email client. Gmail SMTP email body.';

    $mail->send();
    echo "<script>alert('Facture envoyée avec succès !')</script>";
} catch (Exception $e) {
    echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
}
}


if(isset($_GET['action']) && $_GET['action'] == 2){
    
}

?>
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
        table {
      display: block;
    }
    
    tr, td, tbody, tfoot {
      display: block;
    }
    
    thead {
      display: none;
    }
    
    tr {
      padding-bottom: 10px;
    }
    
    td {
      padding: 10px 10px 0;
      text-align: center;
    }
    td:before {
      content: attr(data-title);
      color: #7a91aa;
      text-transform: uppercase;
      font-size: 1.4rem;
      padding-right: 10px;
      display: block;
    }
    
    table {
      width: 100%;
    }
    
    th {
      text-align: left;
      font-weight: 700;
    }
    
    thead tr {
      background-color: #1a81c2;
      color:black;
      border: 1px solid #1a81c2;
    }
    @media (min-width: 460px) {
      td {
        text-align: left;
      }
      td:before {
        display: inline-block;
        text-align: right;
        width: 140px;
      }
    }
    @media (min-width: 720px) {
      table {
        display: table;
      }
    
      tr {
        display: table-row;
      }
    
      td, th {
        display: table-cell;
      }
    
      tbody {
        display: table-row-group;
      }
    
      thead {
        display: table-header-group;
      }
    
      tfoot {
        display: table-footer-group;
      }
    
      td {
        border: 1px solid #28333f;
      }
      td:before {
        display: none;
      }
    
      td, th {
        padding: 10px;
      }
    
      tr:nth-child(2n+2) td {
        background-color: white;
      }
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
                    <span class="profession">Facturez votre loyer</span>
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
                        <form action="view2.php" method="post">
                        <a href="view2.php?action=1" class="download-button">
                            <i class='bx bx-send icon' ></i>
                            <span class="text nav-text">Envoyer</span>
                        </a>
                        </form>
                    </li>
                    <li class="nav-link">
                        <a href="view2.php?action=2">
                            <i class='bx bx-save icon' ></i>
                            <span class="text nav-text">Enregistrer</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a class="download-button" onclick="generatePDF(<?php echo $id ?>)">
                            <i class='bx bx-printer icon'></i>
                            <span class="text nav-text">Imprimer</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="dashboard.php">
                        <i class='bx bx-log-out icon' ></i>
                        <span class="text nav-text">Accueil</span>
                    </a>
                </li>

            </div>
        </div>

    </nav>

    <section class="home">
        <div class="row" id="invoice">
            <div class="col-sm-12" id="textet">                                      
                <div class="card"  style=" width: 50vw ; margin-left: 25%; " >
                    <div id="textes" class="card-header">
                        <div id="id22">
                            <h2  id="texte" class="text-center" style="font-weight: bolder; font-size: 2rem;">QUITTANCE DE LOYER</h2>
                        </div>
                    </div>
                    <div class="card-block" >
                        <form id="main" method="post" action="/" novalidate="" >
                            <div class="card-header" >
                                <h5 class="text-right" style="font-size: 1.3rem; font-weight: bolder;">Date paiement -----------------------------------------------------------</h5>
                            </div>                     
                            <div>
                                <table>
                                    <div>
                                        <thead>
                                            <tr  id="text1">                                                                     
                                              <th  id="texte1">
                                               PROPRIETAIRE
                                              </th>
                                              <th id="text3">
                                               LOCATAIRE
                                              </th>
                                            </tr>
                                          </thead>
                                    </div>
                                    <tbody>
                                      <tr>
                                        <td class='select'>
                                          Nom =
                                        </td>
                                        <td class='select'>
                                            Nom =
                                          </td>
                                      </tr>
                                      <tr>
                                        <td class='select'>
                                            Email =
                                          </td>
                                          <td class='select'>
                                            Email =
                                          </td>
                                      </tr>
                                      <tr>
                                        <td class='select'>
                                            Montant
                                          </td>
                                          <td class='select'>
                                            
                                          </td>
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
                            </div>                                                       
                            <div class="" style="padding: 5%;">                   
                                <div class="form-group row" >
                                    <p  style="font-size: 0.9rem;" id="texteu">
                                        Type d'immobilier ------------------------------------------- Ville --------------------------------------------
                                    </p>
                                    <p style="font-size: 1.2rem;" id="textei">
                                        Je soussigné(e) ---------------------------------------------- propriétaire/bailleur du logement désigné ci-dessus, déclare avoir recu de Monsieur/Madame-------------------------------------------
                                        
                                            la somme ------------------------------------------- (en toutes lettres), -------------------------- (en chiffres), --------------------------------- au titre du paiement du loyer et des charges pour la période de location du ----------------- au ----------------- ,et lui en donne quittance, sous reserve de tous mes droits.
                                    </p> 
                                </div>
                            </div> 
                                                                                
                            <div id="id3">
                                <div id="id44">
                                    <h5 class="" style="font-weight: bolder" >DETAILS DE PAIEMENT :</h5>
                                </div>
                            </div>
                            <div class="form-group row" id="text2" style="padding: 5%; font-size: 1.2rem; border: 1px solid black;">
                                <p id="texte2" style="font-size: 1.2rem;">
                                   <span>Loyer/mois: ------------------------------------- FCFA </span> <br>
                                   <span> Nombres de mois : ------------------------------------</span> <br>
                                   <span> Total: --------------------------------------------- FCFA </span><br>
                                   <span>Mode de paiement : -------------------------------------</span> <br>                                                
                                   <span> Date paiement : ----------------------------------------</span><br><br>
                                   <span>Fait à : ------------------------------------- le ----------------------------</span> 
                                </p>
                            </div>   
                        </form>              
                    </div>
                </div>
            </div>
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
            pagebreak: {mode: 'avoid-all', before: '#id3'},
            jsPDF: {unit: 'in', format: 'a4', orientation: 'landscape'}
        };
        html2pdf().set(opt).from(element).save();
      }
    </script>
    <script src="js/html2pdf.bundle.min.js"></script>
    <script src="js/side.js"></script>
    <script src="js/panel.js"></script>

</body>
</html>