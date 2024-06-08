<?php
require_once("../verif.php");
include("../bd.php");

$nom = $_SESSION['name'];
$requete = $bd->prepare("SELECT email,password FROM bailleur WHERE nom LIKE '$nom'");
$requete->execute();
$requete = $requete->fetchAll();

if(isset($_POST['nom']) || isset($_POST['password']) || isset($_POST['email'])){
    if($_POST['nom'] == $nom && $_POST['password'] == $requete[0][1] && $_POST['email'] == $requete[0][0]){
        $error = 1;
    }else if($_POST['nom'] != $nom ){
        $error = 0;
        $nomM = $_POST['nom'];
        $n = $requete[0][3];
        $_SESSION['name'] = $_POST['nom'];
        $req = $bd->prepare("UPDATE bailleur SET nom = '$nomM' WHERE nom LIKE '$n'");
        $req->execute();
    }else if($_POST['password'] != $requete[0]['password']){
        $error = 0;
        $p = $_POST['password'];
        $req = $bd->prepare("UPDATE bailleur SET password = '$p' WHERE nom LIKE '$nom'");
        $req->execute();
    }else if($_POST['email'] != $requete[0]['email']){
        $error = 0;
        $p = $_POST['email'];
        $req = $bd->prepare("UPDATE bailleur SET email = '$p' WHERE nom LIKE '$nom'");
        $req->execute();
    }
}

?>
<!DOCTYPE html>
<!--=== Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/folded.css">
    <link rel="stylesheet" href="css/modele.css">
    <link rel="stylesheet" href="css/button.css">
     
    <link rel="icon" href="..\files\assets\images\favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="fontawesome-free-6.1.1-web/css/fontawesome.min.css">
    <!-- Google font--><link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="..\files\bower_components\bootstrap\css\bootstrap.min.css">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="..\files\bower_components\font-awesome\css\font-awesome.min.css">
    <!-- Date-time picker css -->
    <link rel="stylesheet" type="text/css" href="..\files\assets\pages\advance-elements\css\bootstrap-datetimepicker.css">
    <!-- Date-range picker css  -->
    <link rel="stylesheet" type="text/css" href="..\files\bower_components\bootstrap-daterangepicker\css\daterangepicker.css">
    <!-- Date-Dropper css -->
    <link rel="stylesheet" type="text/css" href="..\files\bower_components\datedropper\css\datedropper.min.css">
    <!-- Data Table Css -->
    <link rel="stylesheet" type="text/css" href="..\files\bower_components\datatables.net-bs4\css\dataTables.bootstrap4.min.css">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="..\files\assets\icon\themify-icons\themify-icons.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="..\files\assets\icon\icofont\css\icofont.css">
    <!-- feather Awesome -->
    <link rel="stylesheet" type="text/css" href="..\files\assets\icon\feather\css\feather.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="..\files\assets\css\style.css">
    <link rel="stylesheet" type="text/css" href="..\files\assets\css\jquery.mCustomScrollbar.css">

    <!----===== Iconscout CSS ===== -->
    <link href="../icons/fontawesome-free-6.3.0-web/css/all.min.css" rel="stylesheet">
    <link href='../icons/boxicons-2.1.1/css/boxicons.min.css' rel='stylesheet'>

    <title>Admin Dashboard Panel</title> 
</head>
<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <img src="../Images/logo1.png" alt="">
            </div>

            <span class="logo_name">YACHIN</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="../dashboard.php">
                    <i class="fa-solid fa-house"></i>
                    <span class="link-name ">Accueil</span>
                </a></li>
                <li><a href="../model.php">
                    <i class="fa fa-folder"></i>
                    <span class="link-name ">Modèle</span>
                </a></li>
                <li><a href="../recent.php">
                    <i class="fa-solid fa-history"></i>
                    <span class="link-name ">Historique</span>
                </a></li>
                <li><a href="../Brouillon.php">
                    <i class="fa fa-recycle"></i>
                    <span class="link-name">Brouillon</span>
                </a></li>
                <li><a href="../corbeille.php">
                    <i class="fa fa-trash"></i>
                    <span class="link-name">Corbeille</span>
                </a></li>
                <li><a href="profil.php">
                    <i class="fa fa-address-book iconactive"></i>
                    <span class="link-name active">Profil</span>
                </a></li>
                <!-- <li><a href="#">
                    <i class="uil uil-share"></i>
                    <span class="link-name">Profil</span>
                </a></li> -->
            </ul>
            
            <ul class="logout-mode">
                <li><a href="../deconnexion.php">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    <span class="link-name">Déconnecter</span>
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

            <!-- <img src="images/profile.jpg" alt=""> -->
        </div>
        
        <div class="dash-content">
            <div class="overview">
            <?php
        if(isset($error) && $error == 1){
        echo "<div class='alert alert-danger bg-danger text-light' role='alert'>";
        echo "<p class='mb-0'>Veuillez modifier vos informations pour les mettre à jour !</p>";
        echo "</div>";
        }else{
            echo "<div class='alert alert-success bg-success text-light' role='alert'>";
        echo "<p class='mb-0'>Informations modifiées avec succès !</p>";
        echo "</div>";
        }
        ?>
                <div class="title">
                    <i class="fa fa-address-book"></i>
                    <span class="text">Profil</span>
                </div>
            </div>
            
            <!-- Sidebar inner chat end-->
        <div class="pcoded-main-container">
            <div class="pcoded-wrapper">
                
                <div class="pcoded-content">
                    <div class="pcoded-inner-content">
                        <!-- Main-body start -->
                        <div class="main-body">
                            <div class="page-wrapper">
                                <!-- Page-header start -->
                                <div class="page-header">
                                    <div class="row align-items-end">
                                        <div class="col-lg-8">
                                            <div class="page-header-title">
                                                <div class="d-inline">
                                                    <h4>A propos</h4>
                                                    <span>Consultation / modification du profil</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="page-header-breadcrumb">
                                                <ul class="breadcrumb-title">
                                                    <li class="breadcrumb-item">
                                                        <a href="index-1.htm"> <i class="fa-solid fa-house-user"></i> </a>
                                                    </li>
                                                    <li class="breadcrumb-item"><a href="#!">A propos</a>
                                                    </li>
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Page-header end -->

                                    <!-- Page-body start -->
                                    <div class="page-body">
                                        <!--profile cover start-->
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="cover-profile">
                                                    <div class="profile-bg-img">
                                                        <img class="profile-bg-img img-fluid" src="..\files\assets\images\user-profile\bg-img1.jpg" alt="bg-img">
                                                        <div class="card-block user-info">
                                                            <div class="col-md-12">
                                                                <!-- <div class="media-left">
                                                                    <a href="#" class="profile-image">
                                                                        <img class="user-img img-radius" src="..\files\assets\images\user-profile\user-img.jpg" alt="user-img">
                                                                    </a>
                                                                </div> -->
                                                                <div class="media-body row">
                                                                    <!-- <div class="col-lg-12">
                                                                        <div class="user-title">
                                                                            <h2>Soeng Souy</h2>
                                                                            <span class="text-white">Web designer</span>
                                                                        </div>
                                                                    </div> -->
                                                                    <!-- <div>
                                                                        <div class="pull-right cover-btn">
                                                                            
                                                                            <button type="button" class="btn btn-primary"><i class="icofont icofont-ui-messaging"></i> Message</button>
                                                                        </div>
                                                                    </div> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--profile cover end-->
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <!-- tab header start -->
                                                <div class="tab-header card">
                                                    <ul class="nav nav-tabs md-tabs tab-timeline" role="tablist" id="mytab">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" data-toggle="tab" href="#personal" role="tab">Mon profil</a>
                                                            <div class="slide"></div>
                                                        </li>
                                                        
                                                        
                                                    </ul>
                                                </div>
                                                <!-- tab header end -->
                                                <!-- tab content start -->
                                                <div class="tab-content">
                                                    <!-- tab panel personal start -->
                                                    <div class="tab-pane active" id="personal" role="tabpanel">
                                                        <!-- personal card start -->
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h5 class="card-header-text">Infos Personnelles</h5>
                                                                <button id="edit-btn" type="button" class="btn btn-sm btn-primary waves-effect waves-light f-right">
                                            
                                            <i class="icofont icofont-edit" title="Cliquez ici pour modifier"></i>
                                        </button>
                                                            </div>
                                                            <div class="card-block">
                                                                <div class="view-info">
                                                                    <div class="row">
                                                                        <div class="col-lg-12">
                                                                            <div class="general-info">
                                                                                <div class="row">
                                                                                    <div class="col-lg-12 col-xl-12">
                                                                                        <div class="table-responsive">
                                                                                            <table class="table m-0">
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <th scope="row">Nom complet</th>
                                                                                                        <td><?php echo "<b>".$nom."</b>"?></td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <th scope="row">Email</th>
                                                                                                        <td><?php echo "<b>".$requete[0][0]."</b>"?></td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <th scope="row">Mot de passe</th>
                                                                                                        <td><?php echo "<b>".$requete[0][1]."</b>"?></td>
                                                                                                    </tr>
                                                                                                    
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </div>
                                                                                    </div>
                                                                                    <!-- end of table col-lg-6 -->
                                                                    
                                                                                    <!-- end of table col-lg-6 -->
                                                                                </div>
                                                                                <!-- end of row -->
                                                                            </div>
                                                                            <!-- end of general info -->
                                                                        </div>
                                                                        <!-- end of col-lg-12 -->
                                                                    </div>
                                                                    <!-- end of row -->
                                                                </div>
                                                                <!-- end of view-info -->
                                                                <div class="edit-info">
                                                                    <div class="row">
                                                                        <div class="col-lg-12">
                                                                            <div class="general-info">
                                                                                <div class="row">
                                                                                    <div class="col-lg-12">
                                                                                        <form action="profil.php" method="post">
                                                                                        <table class="table">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td>
                                                                                                        <div class="input-group">
                                                                                                            <span class="input-group-addon"><i class="icofont icofont-user"></i></span>
                                                                                                            <input type="text" class="form-control" name="nom" placeholder="Nom complet" value="<?php echo $nom?>">
                                                                                                        </div>
                                                                                                    </td>
                                                                                                
                                                                                                <tr>
                                                                                                    <td>
                                                                                                        <div class="input-group">
                                                                                                            <span class="input-group-addon"><i class="icofont icofont-envelope"></i></span>
                                                                                                            <input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo $requete[0][0]?>">
                                                                                                        </div>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td>
                                                                                                        <div class="input-group">
                                                                                                            <span class="input-group-addon"><i class="icofont icofont-lock"></i></span>
                                                                                                            <input type="password" class="form-control" placeholder="Mot de passe" name="password" value="<?php echo $requete[0][1]?>">
                                                                                                        </div>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                    <!-- end of table col-lg-6 -->
                                                                                   
                                                                                <!-- end of row -->
                                                                               
                                                                            </div>
                                                                            <!-- end of edit info -->
                                                                        </div>
                                                                        <!-- end of col-lg-12 -->
                                                                    </div>
                                                                    <!-- end of row -->
                                                                    <div class="text-center" style="margin-left: 50px;">
                                                                        <button type="submit" class="btn btn-primary waves-effect waves-light m-r-20"><i class='bx bx-save icon' ></i>Enregistrer</button>
                                                                        <a href="#!" id="edit-cancel" class="btn btn-default waves-effect"><i class='fa-solid fa-circle-xmark' ></i>Annuler</a>
                                                                    </form>
                                                                        
                                                                    </div>
                                                                </div>
                                                                <!-- end of edit-info -->
                                                            </div>
                                                            <!-- end of card-block -->
                                                        </div>
                                                       
                                                    </div>
                                                    
                                                    
                                                </div>
                                                <!-- tab content end -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Page-body end -->
                                </div>
                            </div>
                            <!-- Main body end -->

                        </div>
                    </div>
                </div>
            </div>       

        </div>
    </div>
    </section>

<!-- Warning Section Ends -->
    <!-- Required Jquery -->
    <script data-cfasync="false" src="..\..\..\cdn-cgi\scripts\5c5dd728\cloudflare-static\email-decode.min.js"></script><script type="text/javascript" src="..\files\bower_components\jquery\js\jquery.min.js"></script>
    <script type="text/javascript" src="..\files\bower_components\jquery-ui\js\jquery-ui.min.js"></script>
    <script type="text/javascript" src="..\files\bower_components\popper.js\js\popper.min.js"></script>
    <script type="text/javascript" src="..\files\bower_components\bootstrap\js\bootstrap.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="..\files\bower_components\jquery-slimscroll\js\jquery.slimscroll.js"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="..\files\bower_components\modernizr\js\modernizr.js"></script>
    <script type="text/javascript" src="..\files\bower_components\modernizr\js\css-scrollbars.js"></script>

    <!-- Bootstrap date-time-picker js -->
    <script type="text/javascript" src="..\files\assets\pages\advance-elements\moment-with-locales.min.js"></script>
    <script type="text/javascript" src="..\files\bower_components\bootstrap-datepicker\js\bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="..\files\assets\pages\advance-elements\bootstrap-datetimepicker.min.js"></script>
    <!-- Date-range picker js -->
    <script type="text/javascript" src="..\files\bower_components\bootstrap-daterangepicker\js\daterangepicker.js"></script>
    <!-- Date-dropper js -->
    <script type="text/javascript" src="..\files\bower_components\datedropper\js\datedropper.min.js"></script>
    <!-- data-table js -->
    <script src="..\files\bower_components\datatables.net\js\jquery.dataTables.min.js"></script>
    <script src="..\files\bower_components\datatables.net-bs4\js\dataTables.bootstrap4.min.js"></script>
    <script src="..\files\bower_components\datatables.net-responsive\js\dataTables.responsive.min.js"></script>
    <script src="..\files\bower_components\datatables.net-responsive-bs4\js\responsive.bootstrap4.min.js"></script>
    <!-- ck editor -->
    <script src="..\files\assets\pages\ckeditor\ckeditor.js"></script>
    <!-- echart js -->
    <script src="..\files\assets\pages\chart\echarts\js\echarts-all.js" type="text/javascript"></script>
    <!-- i18next.min.js -->
    <script type="text/javascript" src="..\files\bower_components\i18next\js\i18next.min.js"></script>
    <script type="text/javascript" src="..\files\bower_components\i18next-xhr-backend\js\i18nextXHRBackend.min.js"></script>
    <script type="text/javascript" src="..\files\bower_components\i18next-browser-languagedetector\js\i18nextBrowserLanguageDetector.min.js"></script>
    <script type="text/javascript" src="..\files\bower_components\jquery-i18next\js\jquery-i18next.min.js"></script>
    <script src="..\files\assets\pages\user-profile.js"></script>
    <script src="..\files\assets\js\pcoded.min.js"></script>
    <script src="..\files\assets\js\vartical-layout.min.js"></script>
    <script src="..\files\assets\js\jquery.mCustomScrollbar.concat.min.js"></script>
<!-- Custom js -->
<script type="text/javascript" src="..\files\assets\js\script.js"></script>



    <script src="script.js"></script>
    <!-- <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.validate.min.js"></script> -->
    
</body>
</html>