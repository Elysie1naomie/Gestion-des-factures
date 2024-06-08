<?php
include("./bd_connect.php");
require_once("verif.php");

//recuperation du login
$name = $_SESSION['name'];
$log =$bd->prepare("SELECT login FROM bailleur WHERE nom LIKE '$name'");
$log->execute();
$log= $log->fetchAll();
$log = $log[0][0];
?>
<!DOCTYPE html>
<!--=== Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/yachin.css">
    <link rel="stylesheet" href="css/folded.css">
    <link rel="stylesheet" href="css/modele.css">
    <link rel="stylesheet" href="css/button.css">
     
    <!----===== Iconscout CSS ===== -->
    <!-- <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"> -->
    <link href="icons/fontawesome-free-6.1.1-web/css/all.min.css" rel="stylesheet">

    <title>Admin Dashboard Panel</title> 
</head>
<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <img src="images/logo1.png" alt="">
            </div>
    
            <span class="logo_name">YACHIN</span>
        </div>
    
        <div class="menu-items">
            <ul class="nav-links">
              <li><a href="dashboard.php">
                <i class="fa-solid fa-house-user iconactive"></i>
                <span class="link-name active">Accueil</span>
            </a></li>
            <li><a href="model.php">
                <i class="fa fa-folder"></i>
                <span class="link-name">Modèle</span>
            </a></li>
            <li><a href="recent.php">
                <i class="fa-solid fa-history"></i>
                <span class="link-name">Historique</span>
            </a></li>
            <li><a href="Brouillon.php">
                <i class="fa fa-recycle"></i>
                <span class="link-name">Brouillon</span>
            </a></li>
            <li><a href="corbeille.php">
                <i class="fa fa-trash"></i>
                <span class="link-name">Corbeille</span>
            </a></li>
            <li><a href="form/profil.php">
                <i class="fa fa-address-book"></i>
                <span class="link-name">Profil</span>
            </a></li>
            </ul>
            
            <ul class="logout-mode">
                <li><a href="deconnexion.php">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    <span class="link-name">Déconnexion</span>
                </a></li>
    
                <li class="mode">
                    <a href="#">
                        <i class="fa-solid fa-moon"></i>
                    <span class="link-name">Dark Mode</span>
                </a>
    
                <div class="mode-toggle">
                  <span class="switch"></span>
                </div>
            </li>
            </ul>
        </div>
    </nav>
    
    <section class="dashboard">
       
        <div class="top">
            <i class="fa-solid fa-bars sidebar-toggle"></i> 
            <h5 class="text-center"><?php
            $heure= (int) date("H");
            if($heure > 13)
                echo "<b style='font-family:cursive;'>Bonsoir ".$_SESSION['name']." !</b>";
            else
                echo "<b style='font-family:cursive;'>Bonjour ".$_SESSION['name']." !</b>";
            ?></h5>
            <i class="input-icon fa-solid fa-user-circle" style="font-size:30px;color:grey;"></i>
        </div>
        
        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="fa-solid fa-house-user iconactive"></i>
                    <span class="text">Accueil</span>
                </div>
                <?php
            if(isset($_SESSION['bienvenue'])){
            echo "<div class='alert alert-success' role='alert'>";
            echo "<h4 class='alert-heading'>Bravo ".$_SESSION['name']." !</h4>";
            echo "<p>Merci de vous être inscrit sur <b> Yachin ! </b></p>";
            echo "<hr>";
            echo "<p class='mb-0'>Votre <b>Login</b> est : <kbd class='h4'><b>".$log."</b></kbd>&nbsp; veuillez bien le retenir identiquement, ainsi que les autres informations; ils vous serviront lors de votre prochaine connexion !</p>";
            echo "</div>";
            }
        ?>
                <div class="card card-1">
                    <!-- <h1>Heading</h1> -->
                    <p>
                        <div class="container-fluid" style="margin: 90px 0;">
                            <div class="container mt-0">
                                <div class="align-items-center">
                                    <div class="mb-2 mb-lg-0">
                                        <div class="mb-4 threeD">
                                            <h1 class="text-secondary text-uppercase mb-3 text-center" style="letter-spacing: 5px; font-weight:bolder;">Bienvenue sur YACHIN </h1>
                                            <!-- <h1 class="text-black">Avez-vous été attribuer une chambre ?</h1> -->
                                        </div>
                                        <p class="text-black" style="font-size: 1.3rem;"> YACHIN est un logiciel qui vous aident a la facturation de vos bien immobilière, il vous suffit de suivre quelques étapes et votre facture sera prête pour être envoyé à votre client par email ou être imprimé, ainsi vous aurez toujours une trace de cette facture. Il vous suffit de:
                                        </p>
                                        <ul class="list-inline text-black m-0" style="font-size: 1.1rem;">
                                            <li class="py-2"><i class="fa-solid fa-check text-primary mr-3"></i>Cliquez sur créer une facture.</li>
                                            <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>Remplir le formulaire.</li>
                                            <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>Choisir le modèle ou modifier la mise en forme de votre facture</li>
                                            <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>Votre facture sera près de l'employer, maintenant vous pourrez enregistrer, imprimer ou envoyer<li>
                                        </ul>                                  
                                    </div>

                        </div>
                        </div>
                    </div>
                </p>

                <div class="btn btn-effect-9">
                    <div class="top-face"><a href="model.php" style="text-decoration: none;">Demarrer</a></div>
                    <div class="front-face">Creer une facture</div>
                </div>
                    
                  </div>

                  <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Statistique</span>
                </div>

                <div class="boxes mb-5">
                    <div class="box box1">
                        <i class="fa-solid fa-thumbs-up"></i>
                        <span class="text">Facture envoyé</span>
                        <?php
                        $reponse = $bd->query("SELECT * FROM `facture` where statut = 1 ");
                        $nb = $reponse->rowCount();?>

                        <span class="number"><?php echo $nb; ?></span>
                    </div>
                    <div class="box box2">
                        <i class="fa fa-recycle"></i>
                        <span class="text">Brouillon</span>
                        <span class="number">0</span>
                    </div>
                    <div class="box box3">
                        <i class="fa-solid fa-folder"></i>
                        <span class="text">Modele</span>
                        <?php
                        $f = $_SESSION['modele'];
                        $reponse = $bd->query("SELECT count(*) FROM `facture`, `contrat`,`bailleur`,`model`
                        where facture.id_model = model.id_model and facture.id_contrat = contrat.id_contrat and 
                        contrat.id_bailleur = bailleur.id_bailleur and model.Typemodele = '$f'");
                        $nb = $reponse->rowCount();?>
                        <span class="number"><?php echo $nb; ?></span>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <script src="js/script.js"></script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    
</body>
</html>