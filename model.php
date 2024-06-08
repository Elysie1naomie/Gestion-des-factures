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
    <link rel="stylesheet" href="css/model.css">
     
    <!----===== Iconscout CSS ===== -->
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
              <li><a href="index.php">
                <i class="fa-solid fa-house-user"></i>
                <span class="link-name">Accueil</span>
            </a></li>
            <li><a href="model.php">
                <i class="fa fa-folder iconactive"></i>
                <span class="link-name active">Modèle</span>
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

        </div>

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="fa fa-folder"></i>
                    <span class="text">Modèle disponible</span>
                </div>
            </div>

            <div class="overview">
                <div class="title">
                    <h4 class="text text-center">Choississez un modele pour commencer</h2>
                </div>
            </div>
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <div class="col">
                        <div class="card shadow-sm">
                            <div  class="bd-placeholder-img card-img-top" style="width: 100%;height: 225px;background: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.7)),url(./Images/model1.jpeg);background-size: cover;"></div>
                
                          <div class="card-body">
                            <p class="card-text">
                              <span>Modele 1</span></br>
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                              <div class="btn-group">
                                <form action="traitementModele.php" method="post">
                                <button type="submit" name = "choix1" class="btn btn-sm btn-outline-secondary mr-3" style=" box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;"><i class="fa-solid fa-check-to-slot"></i> Choisir</button>
                                </form>
                                <!-- <a href="form/form2.html" style="text-decoration: none;"><button type="button" class="btn btn-sm btn-outline-secondary">Modifier</button></a> -->
    
                                <a href="Images/model1.jpeg" style="text-decoration: none;"><button type="button" class="btn btn-sm btn-outline-secondary" style=" box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;"><i class="fa-solid fa-eye"></i> Voir</button></a>
                                <!-- <a href="view.html" style="text-decoration: none;"><button type="button" class="btn btn-sm btn-outline-secondary">c'est bon</button></a> -->
                              </div>
                              <!-- <small class="text-muted"><?= nl2br(htmlspecialchars($model['id_template'])) ?></small> -->
                            </div>
                          </div>
                        </div>
                      </div>
        
                      <div class="col">
                        <div class="card shadow-sm">
                            <div  class="bd-placeholder-img card-img-top" style="width: 100%;height: 225px;background: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.7)),url(./Images/model2.jpeg);background-size: cover;"></div>
                            <div class="card-body">
                            <p class="card-text">
                              <span>Modele 2</span></br>
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                              <div class="btn-group">
                              <form action="traitementModele.php" method="post">
                                <button type="submit" name = "choix2" class="btn btn-sm btn-outline-secondary mr-3" style=" box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;"><i class="fa-solid fa-check-to-slot"></i> Choisir</button>
                                </form>
                                <a href="Images/model2.jpeg" style="text-decoration: none;"><button type="button" class="btn btn-sm btn-outline-secondary" style=" box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;"><i class="fa-solid fa-eye"></i> Voir</button></a>
                                <!-- <a href="form/form2.html" style="text-decoration: none;"><button type="button" class="btn btn-sm btn-outline-secondary">Modifier</button></a>
                                <a href="form.html" style="text-decoration: none;"><button type="button" class="btn btn-sm btn-outline-secondary">Choisir</button></a>
                                <a href="view.html" style="text-decoration: none;"><button type="button" class="btn btn-sm btn-outline-secondary">c'est bon</button></a> -->
                              </div>
                              <!-- <small class="text-muted"><?= nl2br(htmlspecialchars($model['id_template'])) ?></small> -->
                            </div>
                          </div>
                        </div>
                      </div>  
                      
        
                    </div>

                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 mt-4">
                        <div class="col">
                            <div class="card shadow-sm">
                                <div  class="bd-placeholder-img card-img-top" style="width: 100%;height: 225px;background: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.7)),url(./Images/model3.jpeg);background-size: cover;"></div>
                    
                              <div class="card-body">
                                <p class="card-text">
                                  <span>Modele 3</span></br>
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                  <div class="btn-group">
                                    <!-- <a href="form/form2.html" style="text-decoration: none;"><button type="button" class="btn btn-sm btn-outline-secondary">Modifier</button></a> -->
                                    <form action="traitementModele.php" method="post">
                                      <button type="submit" name = "choix3" class="btn btn-sm btn-outline-secondary mr-3" style=" box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;"><i class="fa-solid fa-check-to-slot"></i> Choisir</button>
                                    </form>
                                    <a href="Images/model3.jpeg" style="text-decoration: none;"><button type="button" class="btn btn-sm btn-outline-secondary" style=" box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;"><i class="fa-solid fa-eye"></i> Voir</button></a>
                                    <!-- <a href="view.html" style="text-decoration: none;"><button type="button" class="btn btn-sm btn-outline-secondary">c'est bon</button></a> -->
                                  </div>
                                  <!-- <small class="text-muted"><?= nl2br(htmlspecialchars($model['id_template'])) ?></small> -->
                                </div>
                              </div>
                            </div>
                          </div>
            
                          <div class="col">
                            <div class="card shadow-sm">
                                <div  class="bd-placeholder-img card-img-top" style="width: 100%;height: 225px;background: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.7)),url(./Images/model4.jpeg);background-size: cover;"></div>
                                <div class="card-body">
                                <p class="card-text">
                                  <span>Modele 4</span></br>
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                  <div class="btn-group">
                                  <form action="traitementModele.php" method="post">
                                    <button type="submit" name="choix4" class="btn btn-sm btn-outline-secondary mr-3" style=" box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;"><i class="fa-solid fa-check-to-slot"></i> Choisir</button>
                                  </form>
                                    <a href="Images/model4.jpeg" style="text-decoration: none;"><button type="button" class="btn btn-sm btn-outline-secondary" style=" box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;"><i class="fa-solid fa-eye"></i> Voir</button></a>
                                    <!-- <a href="form/form2.html" style="text-decoration: none;"><button type="button" class="btn btn-sm btn-outline-secondary">Modifier</button></a>
                                    <a href="form.html" style="text-decoration: none;"><button type="button" class="btn btn-sm btn-outline-secondary">Choisir</button></a>
                                    <a href="view.html" style="text-decoration: none;"><button type="button" class="btn btn-sm btn-outline-secondary">c'est bon</button></a> -->
                                  </div>
                                  <!-- <small class="text-muted"><?= nl2br(htmlspecialchars($model['id_template'])) ?></small> -->
                                </div>
                              </div>
                            </div>
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