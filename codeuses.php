<?php include('connexion.php');
$msg="";
if (isset($_POST['btnValider'])){
	if (move_uploaded_file($_FILES['photo']['tmp_name'], 'upload/'.$_FILES['photo']['name'])){ 
	$sql="INSERT INTO codeuses(nom,prenoms,date_naissance,resume,email,telephone,mot_passe,photo) 
	VALUES ('".$_POST['nom']."',
			 		  '".$_POST['prenoms']."',
			 		  '".$_POST['date_naissance']."',
			 		  '".$_POST['resume']."',
			 		  '".$_POST['email']."',
			 		  '".$_POST['telephone']."',
			 		  '".md5($_POST['mot_passe'])."',
			 		  '".$_FILES['photo']['name']."')";
	$result=mysqli_query($link,$sql);
	if ($result) {
		$msg='Insertion réussie';

	}else{
		$msg=mysqli_error($link);
	}
 }
}
?>
<!DOCTYPE html>
<html lang="">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Balde Mariam">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">	
	<link rel="stylesheet" type="text/css" href="css/codeuses.css">
	<title>Codeuses</title>
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
				<a href="#">S'inscrire</a>
			</li>
			<li>
				<a href="admin.php">Se connecter</a>
			</li>
			</ul>
</nav>
</div><br><br>

<h1><marquee behavior="alternate">FORMULAIRE D'ENREGISTREMENT</marquee></h1>

<div class="row">
<div class="container-header">
<?php echo $msg; ?>
		<form method="POST" action="" role="form" enctype="multipart/form-data">
		<div class="form-group">
			<label>Nom</label>
			<input type="text" name="nom" class="form-control" placeholder="Nom" ><br>
		</div>

		<div class="form-group">
			<label >Prenoms</label>
			<input type="text" name="prenoms" class="form-control" placeholder="Prenoms" ><br>
		</div>

		<div class="form-group">
			<label >Date de naissance</label>
			<input type="text" name="date_naissance" class="form-control" placeholder="jj/mm/aaaa" ><br>
		</div>

		<div class="form-group">
			<label >Resume</label>
			<input type="text" name="resume" class="form-control" placeholder=""><br>
		</div>

		<div class="form-group">
			<label>Email</label>
			<input type="email" name="email" class="form-control" placeholder="Email"><br>
		</div>

		<div class="form-group">
			<label>Telephone</label>
			<input type="text" name="telephone" class="form-control" placeholder="Telephone"><br>
		</div>

		<div class="form-group">
			<label>Mot de Passe</label>
			<input type="text" name="mot_passe" class="form-control" placeholder="Password"><br>
		</div>

		<div class="form-group">
			<label>Photo</label>
			<input type="file" name="photo" class="form-control" placeholder="image"><br>
		</div>

		<center><button name="btnValider" type="submit" class="btn btn-primary btn-danger btn-block submit">Valider</button></center><br><br>
		
	</form></div>
	</div>
</div>
</body>
</html>