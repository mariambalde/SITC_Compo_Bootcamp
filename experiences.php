<?php session_start();
include('connexion.php');
$msg="";
if (isset($_POST['btnValider'])){ 
	$sql="INSERT INTO experiences(organisation,poste_occupe,description,date_debut,date_fin,id_codeuses) 
	VALUES ('".$_POST['organisation']."',
			 		  '".$_POST['poste_occupe']."',
			 		  '".$_POST['description']."',
			 		  '".$_POST['date_debut']."',
			 		  '".$_POST['date_fin']."',
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
<link rel="stylesheet" type="text/css" href="css/experiences.css">

	<title>Experiences</title>
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

<h1><marquee direction="down">MODIFICATION DE VOS EXPERIENCES</marquee></h1>

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
	<nav><a href="">Ajouter Experiences</a></nav>
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
			<label>Organisation</label>
			<input type="text" name="organisation" class="form-control" placeholder="Organisation ou Entreprise"><br>
		</div>

		<div class="form-group">
			<label >Poste Occupe</label>
			<input type="text" name="poste_occupe" class="form-control" placeholder="Poste Occupe"><br>
		</div>

		<div class="form-group">
			<label >Description</label>
			<input type="text" name="description" class="form-control" placeholder=""><br>
		</div>

		<div class="form-group">
			<label >Date debut</label>
			<input type="text" name="date_debut" class="form-control" placeholder="jj/mm/aaaa"><br>
		</div>

		<div class="form-group">
			<label >Date fin</label>
			<input type="text" name="date_fin" class="form-control" placeholder="jj/mm/aaaa"><br>
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
				<th>Organisation</th>
				<th>Poste</th>
				<th>Description</th>
				<th>Date debut</th>
				<th>Date fin</th>
				<th>id_codeuses</th>
				<th>Modifier</th>
				<th>Supprimer</th>
			</tr>
		</thead>	
		<tbody>

		<?php
			$n=1;
			$list=" SELECT * FROM experiences";
			$res=mysqli_query($link,$list);
			while ($data=mysqli_fetch_array($res)) { 

		?>

		<tr>
			<td><?php echo $n; ?></td>
			<td><?php echo $data['organisation']; ?></td>
			<td><?php echo $data['poste_occupe']; ?></td>
			<td><?php echo $data['description']; ?></td>
			<td><?php echo $data['date_debut']; ?></td>
			<td><?php echo $data['date_fin']; ?></td>
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