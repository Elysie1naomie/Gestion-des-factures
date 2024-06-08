<!DOCTYPE html>
<html lang="en">

<head>
    <title>Formulaire A4 </title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="#">
    <meta name="keywords" content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="#">
    <!-- Favicon icon -->
    <link rel="icon" href="..\files\assets\images\favicon.ico" type="image/x-icon">
    <!-- Google font--><link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="..\files\bower_components\bootstrap\css\bootstrap.min.css">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="..\files\assets\icon\themify-icons\themify-icons.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="..\files\assets\icon\icofont\css\icofont.css">
    <!-- feather Awesome -->
    <link rel="stylesheet" type="text/css" href="..\files\assets\icon\feather\css\feather.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="..\files\assets\css\style.css">

    <link rel="stylesheet" href="fontawesome-free-6.1.1-web/css/all.min.css">

    <link rel="stylesheet" href="../css/button.css">

    <link rel="stylesheet" type="text/css" href="..\files\assets\css\jquery.mCustomScrollbar.css">
</head>

<body>
<div  class="pcoded">
    <div id="pcoded" style="padding: 10px;">
        <div id="id1">
            <form action="">
                <p style="text-align: center; font-size: 1.5rem; font-weight: bolder;">MISE EN FORME</p>
                <input type="color" name="" id="col" onchange="colo()">
                <label for="col" style="font-weight: bolder;">Changer la couleur de fond</label>
            </form>
            <form action="">
                <input type="color" name="" id="colr" onchange="colText()">
                <label for="col" style="font-weight: bolder;">Changer la couleur du text</label>
            </form>
            <button style="width: 3cm; margin-top: 12px; height: 2rem; background-color: #0E4BF1; border: none; border-radius: 5px; color: blanchedalmond;  box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;"><i class="icofont icofont-save"></i> Enregistrer</button>
            <a href="../model.html"><button style="width: 3cm; margin-top: 12px; height: 2rem; background-color: #0E4BF1; border: none; border-radius: 5px; color: blanchedalmond;  box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;"><i class="fa fa-times"></i> Annuler</button></a>
        </div>
    </div>
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">
        <div class="pcoded-main-container">
            <div class="pcoded-wrapper">          
                <div class="pcoded-content">
                    <div class="pcoded-inner-content">
                        <!-- Main-body start -->
                        <div class="main-body">
                            <div class="page-wrapper">
                                <!-- Page-header start -->
                                    <div class="page-body">
                                        <div class="row">
                                            <div class="col-sm-12">                                      
                                                <div class="card"  style=" width: 50vw ; margin-left: 25%; " >
                                                    <div id="id4" class="card-header">
                                                        <div id="id22"">
                                                            <h2  class="text-center" style="font-weight: bolder;">QUITTANCE DE LOYER</h2>
                                                        </div>
                                                    </div>
                                                    <div class="card-block" >
                                                        <form id="main" method="post" action="/" novalidate="" >
                                                            <div class="card-header">
                                                                <h5 class="text-right" style="font-size: 1rem; font-weight: bolder;">Date paiement -------------------------------------------------------------------------------</h5>
                                                            </div>
                                                            <div id="id2" >
                                                                <div id="id33" style="height: 1cm; align-items: center;">
                                                                    <h5 class="" style="font-size: 1.3rem; font-weight: bolder;">ADRESSE DE LA LOCATION :</h5>
                                                                </div>
                                                            </div>
                                                            <!-- to del -->                                                       
                                                            <div class="" style="padding: 5%;">                   
                                                                <div class="form-group row" >
                                                                    <p  style="font-size: 1.1rem;">
                                                                        Type d'immobilier -----------------------------------Ville --------------------------------------------
                                                                    </p>
                                                                    <p style="font-size: 1.2rem;">
                                                                        Je soussigné(e) ---------------------------------------------- propriétaire/bailleur du logement désigné ci-dessus, déclare avoir recu de Monsieur/Madame-------------------------------------------
                                                                        
                                                                            la somme ------------------------------------------- (en toutes lettres), -------------------------- (en chiffres), --------------------------------- au titre du paiement du loyer et des charges pour la période de location du ----------------- au ----------------- ,et lui en donne quittance, sous reserve de tous mes droits.
                                                                    </p> 
                                                                </div>
                                                            </div>                                                         
                                                            <div id="id3">
                                                                <div id="id44" style="height: 1cm; align-items: center;">
                                                                    <h5 class="" style="font-weight: bolder" >DETAILS DE PAIEMENT :</h5>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row" style="padding: 5%; font-size: 1.2rem;">
                                                                <p>
                                                                   <span style="font-size: 1.2rem;">Loyer/mois: ---------------------------------------------------------- FCFA </span> <br>
                                                                   <span style="font-size: 1.2rem;"> Nombres de mois : -------------------------------------------------</span> <br>
                                                                   <span style="font-size: 1.2rem;"> Total: ---------------------------------------------------------- FCFA </span><br>
                                                                   <span style="font-size: 1.2rem;">Mode de paiement : ----------------------------------------------</span> <br>                                                
                                                                   <span style="font-size: 1.2rem;"> Date paiement : -----------------------------------------------</span><br><br>
                                                                   <span style="font-size: 1.2rem;">Fait à : ------------------------------------- le ----------------------------</span> 
                                                                </p>
                                                            </div>   
                                                        </form>              
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <!-- Page body end -->
                            </div>
                            <!-- Main-body end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="..\files\bower_components\jquery\js\jquery.min.js"></script>
    <script src="..\files\assets\js\pcoded.min.js"></script>
    <script src="..\files\assets\js\vartical-layout.min.js"></script>
    <script src="..\files\assets\js\jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="..\files\assets\js\script.js"></script>
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
</div>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>    <!-- color change -->
<script>
    function colo(){
        let col=document.getElementById("col").value
        document.getElementById("pcoded").style.backgroundColor=col;
        document.getElementById("id1").style.backgroundColor=col;
        document.getElementById("id2").style.backgroundColor=col;
        document.getElementById("id3").style.backgroundColor=col;
        document.getElementById("id4").style.backgroundColor=col;
        document.getElementById("id0").style.backgroundColor=col;
        //document.getElementById("pcoded").style.backgroundColor=col;
    }
    function colText(){
        let colr=document.getElementById("colr").value
        // document.getElementById("id11").style.color=colr;
        document.getElementById("id22").style.color=colr;
        document.getElementById("id33").style.color=colr;
        document.getElementById("id44").style.color=colr;
        document.getElementById("id55").style.color=colr;
        document.getElementById("id66").style.color=colr;
    }
</script>  
</body>

</html>
