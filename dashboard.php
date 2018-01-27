<?php  session_start();
include('connexion.php');
$codeuses="SELECT * FROM codeuses WHERE id=".$_SESSION['variable'];
$res=mysqli_query($link,$codeuses);
$data=mysqli_fetch_array($res);

$cv="SELECT * FROM cv WHERE id_codeuses=".$_SESSION['variable'];
$res=mysqli_query($link,$cv);
$datacv=mysqli_fetch_array($res);

$cv="SELECT * FROM interets WHERE id_codeuses=".$_SESSION['variable'];
$res=mysqli_query($link,$cv);
$datainteret=mysqli_fetch_array($res);


$diplome="SELECT * FROM diplomes WHERE id_codeuses=".$_SESSION['variable'];
$resdiplome=mysqli_query($link,$diplome);

$exp="SELECT * FROM experiences WHERE id_codeuses=".$_SESSION['variable'];
$resexp=mysqli_query($link,$exp);

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/dashboard.css">
	<title>Dashboard</title>
</head>

<body>
<div class="container">
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

<div class="col-md-3">
<ul class="nav navbar-nav navbar-left">
<li class="active">
	<nav><a href="codeuses.php" class="btn-treehouse">Modifier Profil</a></nav>
	</li><br><br>

	<li>
	<nav><a href="cv.php">Créer CV</a></nav>
	</li><br><br>

	<li>
		<nav><a href="">Afficher votre CV</a></nav>
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

<div class="col-md-9">
<div class="col-md-12">
<div class="col-md-4">
	<p><?php echo $data['nom']." ".$data['prenoms'] ; ?><br>
	<?php echo $data['date_naissance']; ?><br>
	<?php echo $data['telephone']; ?><br>
	<?php echo $data['email']; ?><br>
	</p>
</div>
<div class="col-md-4"><?php echo $data['resume']; ?></div>
<div class="col-md-4">
	<img src="upload/<?php echo $data['photo']; ?>" <br>
	<p><?php echo $data['nom']." ".$data['prenoms']; ?></p>
	<a href="<?php echo $datacv['facebook']; ?>" title="Suivez-moi sur facebook !"><img src="image/facebook.png" height="40px" width="40px"/></a>
	<a href="<?php echo $datacv['twitter']; ?>" title="Suivez-moi sur twitter !"><img src="image/twitter.png" height="40px" width="40px"/></a>
	<a href="<?php echo $datacv['google']; ?>" title="Suivez-moi sur google+ !"><img src="image/google.jpg" height="40px" width="40px"/></a>
</div>
</div>
	</div>
</div>

<div class="row">
	<p><center>

	<h1> Mes Experiences</h1><br>
	<?php 
		while ($dataexp=mysqli_fetch_array($resexp)){
		echo $dataexp['organisation']." "; 
		echo $dataexp['poste_occupe']." "; 
		echo $dataexp['description']." "; 
		echo $dataexp['date_debut']." ";
		echo $dataexp['date_fin']." <br>"; 
							 
		} 
	?>


	<br>
		<h1> Mes Diplomes</h1><br>

		<?php 
		while ($datadiplome=mysqli_fetch_array($resdiplome)){
		echo $datadiplome['annee_obtention']." "; 
		echo $datadiplome['libelle']." "; 
		echo $datadiplome['ecole']." <br>"; 
							 
		} 
	?>

		
		<h1>Mes Centres d'interets</h1><br>
	</center></p>
</div>
		
</div>
</body>
</html>