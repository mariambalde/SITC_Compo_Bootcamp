<?php session_start();
 include('connexion.php');
$msg="";
if (isset($_POST['btnValider'])){ 
	$sql="INSERT INTO diplomes(annee_obtention,libelle,ecole,id_codeuses) 
	VALUES ('".$_POST['date_obtention']."',
					  '".$_POST['diplome']."',
			 		  '".$_POST['etablissement']."',
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
<link rel="stylesheet" type="text/css" href="css/diplomes.css">

	<title>Diplomes</title>
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

<h1><marquee behavior="alternate">AJOUTER VOS DIPLOMES</marquee></h1>

<div class="col-md-6">
<ul class="nav navbar-nav navbar-left">
<li class="active">
	<nav><a href="modif_profil.php" class="btn-treehouse">Modifier Profil</a></nav>
	</li><br><br>

	<li>
	<nav><a href="cv.php">Créer CV</a></nav>
	</li><br><br>

	<li>
		<nav><a href="dashboard.php">Afficher votre CV</a></nav>
	</li><br><br>

	<li>
	<nav><a href="experiences">Ajouter Experiences</a></nav>
	</li><br><br>

	<li>
	<nav><a href="">Ajouter Diplomes</a></nav>
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
			<label>Etablissement</label>
			<input type="text" name="etablissement" class="form-control" placeholder="Etablissement"><br>
		</div>

		<div class="form-group">
			<label >Diplome</label>
			<input type="text" name="diplome" class="form-control" placeholder="Diplome"><br>
		</div>

		<div class="form-group">
			<label >Date d'obtention</label>
			<input type="text" name="date_obtention" class="form-control" placeholder="jj/mm/aaaa"><br>
		</div>

		<center><button name="btnValider" type="submit" class="btn btn-primary btn-lg btn-block submit">Valider</button></center><br><br>

</form>
</div>

<span><?php
		echo $msg;
	 ?>
	 	
	 </span>
	<div class="col-md-2"></div>

	<div class="row">
	<table class="table">
		<thead>
			<tr>
				<th>Numero</th>
				<th>Etablissement</th>
				<th>Diplome</th>
				<th>Date d'obtention</th>
				<th>Modifier</th>
				<th>Supprimer</th>
			</tr>
		</thead>	
		<tbody>

		<?php
			$n=1;
			$list=" SELECT * FROM diplomes";
			$res=mysqli_query($link,$list);
			while ($data=mysqli_fetch_array($res)) { 

		?>

		<tr>
			<td><?php echo $n; ?></td>
			<td><?php echo $data['etablissement']; ?></td>
			<td><? php echo $data['diplome']; ?></td>
			<td><?php echo $data['date_obtention']; ?></td>
		</tr>

		<?php  
			$n++;

			}
		?>
	</tbody>
	</table>
	</div>

</body>
</html>