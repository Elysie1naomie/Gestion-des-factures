<?php
include("bd.php");
require_once("verif.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="css/side.css">
    
    <!----===== Boxicons CSS ===== -->
    <link rel="stylesheet" href="css/facture1.css">
    <link href='icons/boxicons-2.1.1/css/boxicons.min.css' rel='stylesheet'>
    
    <title>Dashboard Sidebar Menu</title> 
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
                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-send icon' ></i>
                            <span class="text nav-text">Envoyer</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-save icon' ></i>
                            <span class="text nav-text">Enregistrer</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
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
        <div class="row">
            <div class="col-sm-12">
                <div class="card"  style=" width: 50vw ; margin-left: 15%; " >
                    <div id="id4" class="card-header" style="background-color:white; width: 25cm;">
                        <div id="id22">
                            <h1  class="text-center" style="font-weight: bolder; color: black; font-size: 2rem;">QUITTANCE DE LOYER</h1>
                        </div>
                    </div>
                    <div class="card-block" style="background-color: white; width: 25cm;" >
                        <form id="main" method="post" action="/" novalidate="" >
                            <div class="card-header" >
                                <h5 class="text-right" style="font-size: 1.3rem; font-weight: bolder;">Date paiement -----------------------------------------------------</h5>
                            </div>
                            <div id="id2" style="background-color: white;" >
                                <div id="id33">
                                    <h5 class="" style="font-size: 1.3rem; color: black;"  >ADRESSE DE LA LOCATION :</h5>
                                </div>
                            </div>
                            <!-- to del -->
                            
                            <div class="" style="padding: 5%;">                   
                                <div class="form-group row" >
                                    <p  style="font-size: 1.2rem; margin-bottom: 30px;">
                                        Type d'immobilier ------------------------- Ville --------------------------
                                    </p>
                                    <p style="font-size: 1.2rem;">
                                        Je soussigné(e) ---------------------------------------------- propriétaire/bailleur du logement désigné ci-dessus, déclare avoir recu de Monsieur/Madame-------------------------------------------
                                        
                                            la somme ------------------------------------------- (en toutes lettres), ---------------------- (en chiffres), ------------------------------- au titre du paiement du loyer et des charges pour la période de location du ----------------- au ----------------- ,et lui en donne quittance, sous reserve de tous mes droits.
                                    </p> 
                                </div>
                            </div>
                           
                            <div id="id3" style="background-color: white;">
                                <div id="id44">
                                    <h5 class="" style="font-weight: bolder; font-size: 1.3rem; color: black;">DETAILS DE PAIEMENT :</h5>
                                </div>
                            </div>
                            <div class="form-group row" style="padding: 5%; font-size: 1.2rem;">
                                <p>
                                   <span style="font-size: 1.2rem;">Loyer/mois: ------------------------------------------------------------- FCFA </span> <br>
                                   <span style="font-size: 1.2rem;"> Nombres de mois : ------------------------------------------------------</span> <br>
                                   <span style="font-size: 1.2rem;"> Total: ------------------------------------------------------------------ FCFA </span><br>
                                   <span style="font-size: 1.2rem;">Mode de paiement : -----------------------------------------------------</span> <br>                                                
                                   <span style="font-size: 1.2rem;"> Date paiement : ---------------------------------------------------------</span><br><br>
                                   <span style="font-size: 1.2rem;">Fait à : ------------------------------------- le ----------------------------</span> 
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
               </div> 
            </div>
    </section>

    <script src="js/side.js"></script>

</body>
</html>