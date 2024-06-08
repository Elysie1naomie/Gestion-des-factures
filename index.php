<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/accueil.css">
    <link rel="stylesheet" href="icons/fontawesome-free-6.1.1-web/css/all.min.css">
    <title>Yachin/Acceuil</title>
</head>
<body>
    <section class="home">
        <div class="nav">
                <div class="logo-image">
                    <img src="images/logo1.png" alt="">
                </div>
            <h1 class="title">Yachin</h1>
            <!-- <ul>
                <li><a href="login.php">Se connecter</a></li>
                <li><a href="#">S'inscrire</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="#">FAQ</a></li>
            </ul> -->
        </div>
        <div class="container">
            <div class="content">
                <h2><span>Facturation</span> rapide<br><span>des</span>  loyers <br> </h2>
                <p>Decouvrez une nouvelle façon de faire vos factures ! </p>
                <a href="login.php" class="btn"> Demarrer <i class="fa fa-arrow-circle-right"></i></a>
            </div>
            <div class="img-box">
                <img src="image/home/home.png" alt="" data-speed="3" class="bg-girl">
            </div>
        </div>
        <img src="image/home/cloud1.png" alt="" data-speed="6" class="bg-clouds">
        <img src="image/home/cloud2.png" alt="" data-speed="-1" class="bg-clouds">
        <img src="image/home/cloud3.png" alt="" data-speed="-3" class="bg-clouds">
        <img src="image/home/cloud4.png" alt="" data-speed="-3" class="bg-clouds">
        <img src="image/home/cloud5.png" alt="" data-speed="-2" class="bg-clouds">
        <img src="image/home/cloud6.png" alt="" data-speed="2" class="bg-clouds">
        <img src="image/home/cloud7.png" alt="" data-speed="-2" class="bg-clouds">
        <img src="image/home/leaf1.png" alt="" data-speed="4" class="bg-clouds">
        <img src="image/home/leaf2.png" alt="" data-speed="-2" class="bg-clouds">
    </section>
    <!-- <script>
        document.addEventListener("mousemove", cloudsMove);
        function cloudsMove(e){
            this.querySelectorAll('.bg-clouds, .bg-girl').forEach(layer =>{
                const speed=layer.getAttribute('data-speed')
                const x=(window.innerWidth - e.pageX * speed) / 100
                const y=(window.innerWidth - e.pageY * speed) / 100
                layer.style.transform=`translateX(${x}px) translateY(${y}px)`
            })
        }
    </script> -->
</body>
</html>