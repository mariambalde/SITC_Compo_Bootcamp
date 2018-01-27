<?php session_start();
include('connexion.php');
$msg="";
if (isset($_POST['btnValider'])){ 
	$sql="INSERT INTO cv(facebook,twitter,google,id_codeuses) 
	VALUES ('".$_POST['facebook']."',
			 		  '".$_POST['twitter']."',
			 		  '".$_POST['google']."',
			 		  '".$_SESSION['variable']."')";
	$result=mysqli_query($link,$sql);
	if ($result) {
		$msg='Insertion réussie';

	}else{
		$msg=mysqli_error($link);
	}
 }
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">

	<title>Curriculum Vitae</title>
</head>

<body>
<div class="container">
<div class="row">
</div>	
<div class="row">
<nav class="navbar navbar-inverse navbar-fixed">
		<div class="container-header">
		
		<ul class="nav navbar-nav navbar-left">
				<li><a href="index.php"><h6>Sheisthecode Cv</h6></a></li>
			</ul>
		</div>
			<ul class="nav navbar-nav navbar-right">
			<li class="active">
				<a href="#">A propos</a>
			</li>
			<li>
				<a href="">User</a>
			</li>
			</ul>
</nav>                                                                                                                                                                                                                                                             
</div><br><br>
<div class="col-md-6">
<ul class="nav navbar-nav navbar-left">
<li class="active">
	<nav><a href="modif_profil.php" class="btn-treehouse">Modifier Profil</a></nav>
	</li><br><br>

	<li>
	<nav><a href="">Créer CV</a></nav>
	</li><br><br>

	<li>
		<nav><a href="dashboard.php">Afficher votre CV</a></nav>
	</li><br><br>

	<li>
	<nav><a href="experiences.php">Ajouter Experiences</a></nav>
	</li><br><br>

	<li>
	<nav><a href="diplomes.php">Ajouter Diplomes</a></nav>
	</li><br><br>

	<li>
	<nav><a href="interets.php">Ajouter Centre d'Intérêts</a></nav>
	</li><br><br>


	</ul>
</div>

<div class="col-md-6">
<?php echo $msg; ?>
<form method="POST" action="" role="form" enctype="multipart/form-data">
		<div class="form-group">
			<label>Facebook</label>
			<input type="text" name="facebook" class="form-control" placeholder="Lien Profil Facebook"><br>
		</div>

		<div class="form-group">
			<label >Twitter</label>
			<input type="text" name="twitter" class="form-control" placeholder="Lien Profil Twitter"><br>
		</div>

		<div class="form-group">
			<label >Google</label>
			<input type="text" name="google" class="form-control" placeholder="Lien Profil Google"><br>
		</div>

		<center><button name="btnValider" type="submit" class="btn btn-primary btn-lg btn-block submit">Valider</button></center><br><br>

</form></div>
</div>

</body>
</html>