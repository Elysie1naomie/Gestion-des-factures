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
    <!-- <link rel="stylesheet" href="css/folded.css">
    <link rel="stylesheet" href="css/modele.css"> -->
    <link rel="stylesheet" href="css/brouillon.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="line.css">
    <!-- <link href="icons/fontawesome-free-6.1.1-web/css/all.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="icons/fontawesome-free-6.3.0-web/css/all.min.css">

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
            <i class="fa-solid fa-history"></i>
            <span class="link-name">Historique</span>
        </a></li>
        <li><a href="Brouillon.php">
            <i class="fa fa-recycle"></i>
            <span class="link-name">Brouillon</span>
        </a></li>
        <li><a href="corbeille.php">
            <i class="fa fa-trash iconactive"></i>
            <span class="link-name active">Corbeille</span>
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
                    <i class="fa fa-trash"></i>
                    <span class="text">Corbeille</span>
                </div>
            </div>
            
            <main>
              <table>
                <thead>
                  <tr>
                   
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
                      Action
                    </th>
                    <th>
                      Action
                    </th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th colspan='3'>
                      App\YACHIN
                    </th>
                  </tr>
                </tfoot>
                <tbody>
                  <tr style="border-bottom:1px;">
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td class='select'>
                      <a class='button' href='#'>
                        <i class="fa-solid fa-eye"></i>
                        Voir
                      </a>
                    </td>
                    <td class='select'>
                      <a class='button' href='#'>
                        <i class="fas fa-trash-alt"></i>
                        Supprimer
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td class='select'>
                      <a class='button' href='#'>
                        <i class="fa-solid fa-eye"></i>
                        Voir
                      </a>
                    </td>
                    <td class='select'>
                      <a class='button' href='#'>
                        <i class="fas fa-trash-alt"></i>
                        Supprimer
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td class='select'>
                      <a class='button' href='#'>
                        <i class="fa-solid fa-eye"></i>
                        Voir
                      </a>
                    </td>
                    <td class='select'>
                      <a class='button' href='#'>
                        <i class="fas fa-trash-alt"></i>
                        Supprimer
                      </a>
                    </td>
                  </tr>
                </tbody>
              </table>
              <!-- <div class='detail'>
                <div class='detail-container'>
                  <dl>
                    <dt>
                      Numero
                    </dt>
                    <dd>
                      John Doe
                    </dd>
                    <dt>
                      E-mail
                    </dt>
                    <dd>
                      email@example.com
                    </dd>
                    <dt>
                      City
                    </dt>
                    <dd>
                      Detroit
                    </dd>
                    <dt>
                      Phone-Number
                    </dt>
                    <dd>
                      555-555-5555
                    </dd>
                    <dt>
                      Last Update
                    </dt>
                    <dd>
                      Jun 20 2014
                    </dd>
                    <dt>
                      Notes
                    </dt>
                    <dd>
                      Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.
                    </dd>
                  </dl>
                </div>
                <div class='detail-nav'>
                  <button class='close'>
                    Close
                  </button>
                </div>
              </div> -->
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