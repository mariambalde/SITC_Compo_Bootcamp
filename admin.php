<?php session_start();
include('connexion.php');
$msg=""; 
 if (isset($_POST['btnValider']) ){

	$sql="SELECT * FROM codeuses WHERE email='".mysqli_real_escape_string($link,$_POST['email'])."' AND mot_passe='".mysqli_real_escape_string($link,md5($_POST['mot_passe']))."' LIMIT 0,1";
	$req= mysqli_query($link,$sql);
	if (mysqli_num_rows($req)>0) {
	$data= mysqli_fetch_array($req);
	$_SESSION['variable']=$data['id'];
	header('location:dashboard.php');
	}else{
	echo "identifiants incorrects";
		}
	}
 ?>

<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Admin</title>

		<link rel="stylesheet" href="css/bootstrap.min.css" >
		<link rel="stylesheet" type="text/css" href="css/admin.css">
	</head>

<body>
<div class="container">
<nav class="navbar navbar-inverse navbar-fixed">
		<div class="container-header">
		
		<ul class="nav navbar-nav navbar-left">
				<li><a href="index.php"><h6>sheisthecode Cv</h6></a></li>
			</ul>
		</div>
			<ul class="nav navbar-nav navbar-right">
			<li class="active">
				<a href="#">A propos</a>
			</li>
			<li>
				<a href="codeuses.php">S'inscrire</a>
			</li>
			<li>
				<a href="#">Se connecter</a>
			</li>
			</ul>
</nav>
</div><br><br><br>

<h1><marquee behavior="alternate"> PAGE ADMINISTRATEUR</marquee></h1>

			<div class="row">
			<div class="col-md-2"></div>

			<div class="col-md-8">
			<div class="container-header">
					<form action="" method="POST" role="form">
						<div class="form-group">

							<label for="">Email</label>
							<input name="email" type="email" class="form-control" id="" placeholder="Email">
						</div>

						<div class="form-group">
							<label>Mot de pass</label>
							<input type="text" name="mot_passe" class="form-control" placeholder="Password"><br>
						</div>

						<center><button name="btnValider" type="submit" class="btn btn-primary btn-lg btn-block submit">Valider</button></center><br><br>

					</form>
				</div>
				</div>
			</div>		

	</body>
</html>