<?php include('connexion.php');

?>
<!DOCTYPE html>
<html lang="">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/awesome.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<title>Accueil</title>
</head>

<body>
<div class="container">

<div class="row">
<nav class="navbar navbar-inverse navbar-fixed">
		<div class="container-header">
		
		<ul class="nav navbar-nav navbar-left">
				<li><a href="#"><h6>Sheisthecode Cv</h6></a></li>
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
				<a href="admin.php">Se connecter</a>
			</li>
			</ul>
			
</nav>
</div>

<div class="row">
<h1><marquee direction="down">AKENDEWA / SheIsTheCode</marquee></h1>
   	<h1><p>BIENVENUE SUR VOTRE PORTAIL DE L'EMPLOI ET DE L'ECOUTE</p></h1>
<center><img src="image/couverture.jpg" height="" width=""></center>
</div><br><br>

<?php 

$codeuses="SELECT * FROM codeuses";
$res=mysqli_query($link,$codeuses);
while ($datacodeuses=mysqli_fetch_array($res)){
 ?>
 <div class="row">
<div class="col-md-12">
<div class="col-md-2">
<img src="upload/<?php echo $datacodeuses['photo'] ?>" class="img-circle" height="70px" width="70px"><p><?php echo $datacodeuses['nom']." ".$datacodeuses['prenoms'] ?></p></div>
<div class="col-md-7"><p><center><b>Developpeuse</b><br>
<?php echo $datacodeuses['resume'] ?></center></p></div>
<div class="col-md-3"><a href="affichageCV.php?id=<?php echo $datacodeuses['id'] ?>"><button name="btnConsultezlecv" type="submit" class="btn btn-primary btn-lg btn-blog">Consultez le cv</button></a></div>
</div>
</div>

<?php 
}
?>

</div>

</body>
</html>