<?php
include("bd.php");
require_once("verif.php");
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
    <link rel="stylesheet" href="css/folded.css">
    <link rel="stylesheet" href="css/modele.css">
    <link rel="stylesheet" href="css/brouillon.css">
     
    <!----===== Iconscout CSS ===== -->
    <link href="icons/fontawesome-free-6.3.0-web/css/all.min.css" rel="stylesheet">

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
            <i class="fa-solid fa-house-user"></i>
            <span class="link-name">Accueil</span>
        </a></li>
        <li><a href="model.php">
            <i class="fa fa-folder"></i>
            <span class="link-name ">Modèle</span>
        </a></li>
        <li><a href="recent.php">
            <i class="fa-solid fa-history iconactive"></i>
            <span class="link-name active">Historique</span>
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
            <!-- <li><a href="#">
                <i class="uil uil-share"></i>
                <span class="link-name">Profil</span>
            </a></li> -->
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

        <div class="search-box">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" placeholder="Search here...">
        </div>
        
        <!-- <img src="images/profile.jpg" alt=""> -->
    </div>


        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="fa-solid fa-history"></i>
                    <span class="text">Historique</span>
                </div>
            </div>
            <main>
              
              <table>
               
                <thead>
                  <tr>
                  <th>
                    #
                  </th>
                    <th>
                      Nom locataire
                    </th>
                    <th>
                      Montant
                    </th>
                    <th>
                      Date
                    </th>
                    <th>
                      E-mail
                    </th>
                    <th>
                      Suppression
                    </th>
                  </tr>
                </thead>
                <tbody>
                <?php
                $a = $_SESSION['name'];
                $requete = $bd->query("SELECT locataire.nom,locataire.email,montant,periode from locataire, contrat, bailleur 
                where locataire.id_locataire  = contrat.id_locataire and contrat.id_bailleur = bailleur.id_bailleur and bailleur.nom = '$a'");
                $donnee = $requete->fetchAll();
                $yo = count($donnee);
                if($yo > 0){
                  for($i=0;$i<$yo;$i++){
                    echo "<tr style='border-bottom:1px;'>";
                    echo "<td>";
                    echo $i+1;
                    echo "</td>";
                    echo "<td>";
                    echo $donnee[$i]['nom'];
                    echo "</td>";
                    echo "<td>";
                    echo $donnee[$i]['montant'];
                    echo "</td>";
                    echo "<td>";
                    echo $donnee[0]['periode'];
                    echo "</td>";
                    echo "<td>";
                    echo $donnee[0]['email'];
                    echo "</td>";
                    echo "<td class='select'>";
                      echo "<a class='button' href='#'>
                        <i class='fas fa-trash-alt'></i>
                        Supprimer
                      </a>";
                    echo "</td>";
                  echo "</tr>";
                  }
              }
                ?>
                </tbody>
              </table>
              
            </main>
           
                  

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