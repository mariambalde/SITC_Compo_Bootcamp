<?php session_start();
include('connexion.php');
$msg="";
if (isset($_POST['btnValider'])){ 
	$sql="INSERT INTO interets(centre_interet,description_interet,id_codeuses) 
	VALUES ('".$_POST['centre_interet']."',
			 		  '".$_POST['description_interet']."',
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
<link rel="stylesheet" type="text/css" href="css/interets.css">

	<title>Interets</title>
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

<h1><marquee behavior="alternate">AJOUTER VOS CENTRES D'INTERETS</marquee></h1>

<div class="col-md-4">
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
	<nav><a href="experiences.php">Ajouter Experiences</a></nav>
	</li><br><br>

	<li>
	<nav><a href="diplomes.php">Ajouter Diplomes</a></nav>
	</li><br><br>

	<li>
	<nav><a href="">Ajouter Centre d'Intérêts</a></nav>
	</li><br><br>
	</ul>
</div>

<div class="col-md-8">
<?php echo $msg; ?>
<form method="POST" action="" role="form" enctype="multipart/form-data">
		<div class="form-group">
			<label>Centre d'Intérêt</label>
			<input type="text" name="centre_interet" class="form-control" placeholder="Sport"><br>
		</div>

		<div class="form-group">
			<label >Description d'intérêt</label>
			<select name="description_interet">
			<option value="natation">Natation</option>
			<option value="tennis">Tennis</option>
			<option value="football">Football</option>
			<option value="natation">Natation</option>
			<option value="basketball">Basketball</option>
			</select>
			
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
				<th>Centre d'interet</th>
				<th>Description</th>
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
			<td><? php echo $data['description']; ?></td>
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