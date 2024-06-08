<?php
session_start();
include("bd.php");

// Pour l'inscription
if(isset($_POST['sign-in_email']) && isset($_POST['sign-in_password']) && isset($_POST['sign-in_name']) && isset($_POST['sign-in_passwordconfirm'])){

	$email = Verif($_POST['sign-in_email']);
	$name = Verif($_POST['sign-in_name']);
	$password = Verif($_POST['sign-in_password']);
	$cpassword = Verif($_POST['sign-in_passwordconfirm']);
	if($password != $cpassword){
		// $error = "Mot de passe pas identique";
		echo "<script>alert('Les Mots de passe ne sont pas identique'); </script>";
	}else{
		$req = $bd->prepare("SELECT id_bailleur FROM bailleur WHERE email LIKE '$email'");
		$req ->execute();
		$req = $req->fetchAll();
		if(!empty($req)){
			// $error = "Utilisateur déjà présent dans la base de données !";
			echo "<script>alert('Email déjà existant, Veuillez la changer'); </script>";
		}else{
			$log = password_hash($password,1);
			$log = substr($log,17,5);
			$req = $bd->prepare("INSERT INTO `bailleur`(`login`, `password`, `nom`, `email`) VALUES ('$log','$password','$name','$email')");
			$req->execute();
			$_SESSION['logged'] = true;
			$_SESSION['bienvenue'] = true;
			$_SESSION['name'] = $name;
			header("location: dashboard.php");
		}
	}
}

//Pour la connexion
if(isset($_POST['logemail']) && isset($_POST['log']) && isset($_POST['logpass'])){
	$email = $_POST['logemail'];
	$login = $_POST['log'];
	$password = $_POST['logpass'];
	$log =$bd->prepare("SELECT nom,password,email,login FROM bailleur WHERE login LIKE '$login'");
	$log->execute();
	$log = $log ->fetchAll();
	if($login == $log[0]['login'] && $password == $log[0]['password'] && $email == $log[0]['email']){
		$name = $log[0]['nom'];
		$_SESSION['logged'] = true;
		$_SESSION['name'] = $name; 
		header("location: dashboard.php");
	}else{
		echo "<script>alert('une ou plusiers informations ne sont pas correctes '); </script>";
	}
}

?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Log In / Sign Up</title>
  <link rel='stylesheet' href='css/bootstrap.min.css'>
<link rel='stylesheet' href='icons/fontawesome-free-6.3.0-web/css/all.min.css'>
<link rel="stylesheet" href="css/login.css">
<link rel='stylesheet' href='https://unicons.iconscout.com/release/v2.1.9/css/unicons.css'>

</head>
<body>
<!-- partial:index.partial.html -->


	<div class="section">
		<div class="container">
			<div class="row full-height justify-content-center">
				<div class="col-12 text-center align-self-center py-5">
					<div class="section pb-5 pt-5 pt-sm-2 text-center">
						<h6 class="mb-0 pb-3"><span>Se Connecter </span><span>S'inscrire</span></h6>
			          	<input class="checkbox" type="checkbox" id="reg-log" name="reg-log"/>
			          	<label for="reg-log"></label>
						<div class="card-3d-wrap mx-auto">
							<div class="card-3d-wrapper">
								<div class="card-front">
									<div class="center-wrap">
										<div class="section text-center">
											<h4 class="mb-4 pb-3">Se Connecter</h4>
											<form action="login.php" method="post">
											<div class="form-group">
												<input type="email" name="logemail" class="form-style" placeholder="Entrez votre Email" pattern="^[A-Za-z0-9._%+-]+@[A-za-z0-9._]+\.[A-Za-z]{1,63}$" id="logemail" required value="<?php echo $_POST['logemail'] = isset($_POST['logemail']) ? $_POST['logemail'] : '';?>">
												<i class="input-icon fa-solid fa-envelope"></i>
											</div>	
											<div class="form-group mt-2">
												<input type="text" name="log" class="form-style" placeholder="Login" id="logpass" required value="<?php echo $_POST['log'] = isset($_POST['log']) ? $_POST['log'] : '';?>">
												<i class="input-icon fa-solid fa-right-to-bracket"></i>
												
											</div>
											<div class="form-group mt-2">
												<input type="password" name="logpass" class="form-style" placeholder="Saisissez votre mot de passe" id="logpass" required value="<?php echo $_POST['password'] = isset($_POST['password']) ? $_POST['password'] : '';?>">
												<i class="input-icon fa-solid fa-lock"></i>
											</div>
											<button class="btn mt-4" type="submit">SOUMETTRE</button>
                            				<!-- <p class="mb-0 mt-4 text-center"><a href="#0" class="link">Login oublié ?</a></p> -->
											</form>
										</div>
			      					</div>
			      				</div>
								<div class="card-back bg-dark">
									<div class="center-wrap">
										<div class="section text-center">
											<h4 class="mb-4 pb-3">S'inscrire</h4>
											<form action="login.php" method="post">
											<div class="form-group">
												<input type="text" name="sign-in_name"class="form-style" placeholder="Entrez votre nom" id="logname" required value="<?php echo $_POST['sign-in_name'] = isset($_POST['sign-in_name']) ? $_POST['sign-in_name']: '';?>">
												<i class="input-icon fa-solid fa-user"></i>
											</div>	
											<div class="form-group mt-2">
												<input type="email" name="sign-in_email" class="form-style" pattern="^[A-Za-z0-9._%+-]+@[A-za-z0-9._]+\.[A-Za-z]{1,63}$" placeholder="Entrer votre Email" id="logemail" required value="<?php echo $_POST['sign-in_email'] = isset($_POST['sign-in_email']) ? $_POST['sign-in_email']: '';?>">
												<i class="input-icon fa-solid fa-envelope"></i>
											</div>	
											<div class="form-group mt-2">
												<input type="password" name="sign-in_password" class="form-style" placeholder="Saisissez votre mot de passe" id="logpass" required value="<?php echo $_POST['sign-in_password'] = isset($_POST['sign-in_password']) ? $_POST['sign-in_password']: '';?>">
												<i class="input-icon fa-solid fa-lock"></i>
											</div>
											<div class="form-group mt-2">
												<input type="password" name="sign-in_passwordconfirm" class="form-style" placeholder="Confirmer votre mot de passe" id="logpass" required value="<?php echo $_POST['sign-in_passwordconfirm'] = isset($_POST['sign-in_passwordconfirm']) ? $_POST['sign-in_passwordconfirm']: '';?>">
												<i class="input-icon fa-solid fa-lock"></i>
											</div>
											<button class="btn mt-4" type="submit">SOUMETTRE</button>
											</form>
										</div>
			      					</div>
			      				</div>
			      			</div>
			      		</div>
			      	</div>
		      	</div>
	      	</div>
	    </div>
	</div>
<!-- partial -->
  <script  src="js/login.js"></script>

</body>
</html>
