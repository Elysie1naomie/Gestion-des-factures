<!DOCTYPE html>
<!--=== Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">

<!--p> GESTION DE L'EMAIL DU BAILLEUR  </p-->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/button.css">
    <link href="library/bootstrap-5/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/form.css">
    <script src="library/autocomplete.js"></script>
    <script src="library/bootstrap-5/bootstrap.bundle.min.js"></script>

    <!-- <link href="css/bootstrap-icons.css" rel="stylesheet">
    <link href="css/boxicons.min.css" rel="stylesheet">
    <link href="css/glightbox.min.css" rel="stylesheet">
    <link href="css/remixicon.css" rel="stylesheet">
    <link href="css/swiper-bundle.min.css" rel="stylesheet"> -->
     
    <!----===== Iconscout CSS ===== -->
    <link href="icons/fontawesome-free-6.3.0-web/css/all.min.css" rel="stylesheet">

    <title>Formulaire</title> 
</head>
<body>
<?php 

//index.php
include('bd.php');
require_once('verif.php');
$nom = $_SESSION['name'];
$req = $bd->prepare("SELECT email FROM bailleur WHERE nom like '$nom'");
$req->execute();
$req = $req->fetchAll();
$mail = $req[0][0];
$_SESSION['email'] = $mail;
//Gestion 1
$query1 = "SELECT nom FROM locataire ORDER BY nom ASC ";

$result1 = $bd->query($query1);

$data1 = array();

foreach($result1 as $row)
{
    $data1[] = array(
        'label'     =>  $row['nom'],
        'value'     =>  $row['nom'],

    );
}
//Gestion 2
$query2 = "SELECT ville FROM immobilier ORDER BY ville ASC ";

$result2 = $bd->query($query2);

$data2 = array();

foreach($result2 as $row)
{
    $data2[] = array(
        'label'     =>  $row['ville'],
        'value'     =>  $row['ville'],

    );
}
//Gestion 3
$query3 = "SELECT nom FROM immobilier ORDER BY nom ASC ";

$result3 = $bd->query($query3);

$data3 = array();

foreach($result3 as $row)
{
    $data3[] = array(
        'label'     =>  $row['nom'],
        'value'     =>  $row['nom'],

    );
}
//Gestion 4
$query4 = "SELECT email FROM locataire ORDER BY email ASC ";

$result4 = $bd->query($query4);

$data4 = array();

foreach($result4 as $row)
{
    $data4[] = array(
        'label'     =>  $row['email'],
        'value'     =>  $row['email'],

    );
}

?>

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

        <!-- <div class="search-box">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" placeholder="Search here...">
        </div> -->
        
        <!-- <img src="images/profile.jpg" alt=""> -->
    </div>

        <div class="dash-content">
            <div class="overview text">
                <div class="title">
                    <i class="fa-solid fa-user-tie"></i>
                    <span class="text">Formulaire</span>
                </div>

                <div class="row">
                    <div class="col-md-12">
                      <form action="traitementForm.php" method="post">
                        <h1> QUITTANCE DE LOYER </h1>
                        
                        <fieldset>
                          
                          <legend><span class="number">1</span> ADRESSE DE LA LOCATION</legend>
                
                          <!--div class="row">
                <div class="col-md-3">&nbsp;</div>
                <div class="col-md-6">
                <label for="" class="col-form-label">Type de propriete:</label>
                    <input type="text" name="typeproprio" id="typeproprio" class="form-control form-control-lg" placeholder="Client Name" />
                </div>
                <div class="col-md-3">&nbsp;</div>
            </div--> 
                          <div class="row">
                            <div class="col-md-6 form-group mb-3">
                              <label for="" class="col-form-label">Type de propriete:</label>
                              <input type="text" class="form-control" name="typeproprio" id="typeproprio" placeholder="ex: chambre, appartement...." required>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                              <label for="" class="col-form-label">Ville de location:</label>
                              <input type="text" class="form-control" name="villelo" id="villelo" required>
                            </div>
                          </div>
                        
                        
                          <label for="">Nom du bailleur / proprietaire</label>
                          <input type="text" value ="<?php echo $_SESSION['name'] ;?> " name="nombailleur" id="nombailleur" required>
                
                          <div class="col-md-3">&nbsp;</div>
                          <label for="">Nom du locataire</label>
                          <input type="text"  name="nomlocataire" id="nomlocataire"  required>
                          <div class="col-md-3">&nbsp;</div>

                          <label for="">Email du bailleur</label>
                          <input type="email" value ="<?php echo $mail?>"  name="emailbailleur" id="emailbailleur" required>  

                          <label for="">Email du locataire</label>
                          <input type="email"  name="emaillocataire" id="emaillocataire" required>  

                        </fieldset>
                        <fieldset>  
                        
                          <legend><span class="number">2</span>DETAIL DU REGLEMENT</legend>
                
                          <div class="row">
                            <div class="col-md-6 form-group mb-3">
                              <label for="" class="col-form-label">Somme d'un mois:</label>
                              <input type="text" class="form-control" name="sommemois" placeholder="ex: 25000fcfa" required>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                              <label for="" class="col-form-label">Nombre de mois regler</label>
                              <input type="text" class="form-control" name="nbrmois" required>
                            </div>
                          </div>
                      
                          <!--label for="">Total</label>
                          <input type="text"  name="total" placeholder="ex: 105000fcfa" required-->

                           <label for="paiement">Mode de paiement</label>
                          <input type="text"  name="modepaiement" required>
                
                          <label>Periode de location:</label>
                          <div class="row">
                            <div class="col-md-5 form-group mb-3">
                              <input type="date" class="form-control" name="datedebut" id="name" required> 
                            </div>
                             <div class="col-md-2 form-group mb-3">
                             <h6 class="text-center mt-4">Au</h6>
                            </div>
                            <div class="col-md-5 form-group mb-3">
                              <input type="date" class="form-control" name="datefin" id="email" required >
                            </div>
                          </div>
                          <label for="">Date de paiement</label>
                          <input type="date"  name="datepaiement" required >
                
                          <label>Fait a:</label>
                          <div class="row">
                            <div class="col-md-5 form-group mb-3">
                              <input type="text" class="form-control" name="lieufait" id="name" required> 
                            </div>
                             <div class="col-md-2 form-group mb-3">
                             <h6 class="text-center mt-4">Le</h6>
                            </div>
                            <div class="col-md-5 form-group mb-3">
                              <input type="date" class="form-control" name="datefait" id="email" required value="<?php echo $date=date("Y-m-d")?>">
                            </div>
                          </div>
                          <input type="checkbox" name="verifier" id="condition" required>
                          <label class="light"> Je soussigne d'avoir reçu le paiement du loyer pour la periode specifier, sous reserve de tous mes droits</label><br>
                         </fieldset>
                       
                        <button type="submit" class="button"  name = "submit">Enregistrer </button>
                        
                       </form>
                        </div>
                
            </div>

        </div>
    </section>

    <script src="js/script.js"></script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
<!--script>

  let btn = document.queryselector('button');
  let mode = document.getElementById("condition").checked;

  function activation(){
    if (mode === true)
    {
    btn.disabled = false;
    }else{
      btn.disabled = true;
      alert("Veillez accepter les conditions d'enregistrement SVP!!");
    }
  }

  btn. addEventLlistener('click',activation()); 
</script-->
   
</body>
</html>
<script>

var auto_complete1 = new Autocomplete(document.getElementById('nomlocataire'), {
    data:<?php echo json_encode($data1); ?>,
    maximumItems:10,
    highlightTyped:true,
    highlightClass : 'fw-bold text-primary'
}); 
var auto_complete2 = new Autocomplete(document.getElementById('villelo'), {
    data:<?php echo json_encode($data2); ?>,
    maximumItems:10,
    highlightTyped:true,
    highlightClass : 'fw-bold text-primary'
}); 
var auto_complete3 = new Autocomplete(document.getElementById('typeproprio'), {
    data:<?php echo json_encode($data3); ?>,
    maximumItems:10,
    highlightTyped:true,
    highlightClass : 'fw-bold text-primary'
}); 
var auto_complete4 = new Autocomplete(document.getElementById('emaillocataire'), {
    data:<?php echo json_encode($data4); ?>,
    maximumItems:10,
    highlightTyped:true,
    highlightClass : 'fw-bold text-primary'
}); 



</script>