<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Effectif</title>
<link rel="icon" type="image/jpg" href="img/logo.jpg">
<script src="https://code.jquery.com/jquery-3.3.1.js"
	integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
	crossorigin="anonymous"></script>
<style>
	#logo{
		width:80px;
	}
	nav{
		background-color:white;
		text-align:center;
	}
	a {
		font-size: 125%;
		font-family: Helvetica;
		color:black;
		margin-left: 5%;
		outline: none;
		text-decoration: none;
	}	
	a:focus {
		text-decoration: #DE9E00 underline 2px;
		color:#DE9E00;
	}
	a:hover {
		text-decoration: #DE9E00 underline 2px;
		color: #DE9E00;
	}
	#ici{
		font-weight: bold;
		text-decoration: #DE9E00 underline 2px;
		color: #DE9E00;
	}
	table,tr,th{
		border: solid 1px;
		border-collapse: collapse;
		text-align: left;
	}
	th{
		width:30%;
	}
	#letout #gauche {
    		float:left;
    		width:40%;
		overflow:auto;
	}
	#droite {
		margin-left:40%;
		width:25%;
		overflow:auto;
	}

	#lg{
		text-decoration:none;
	}
	#connect {
		text-decoration:none;
		font-size: 100%;
		color: #DE9E00;
	}
	#deconnexion{
		font-size: 100%;
	}
</style>
</head>
<body>
	<nav>
		<a id="lg" href="accueil_view.php">
		<img id="logo" alt="" src="img/logo.jpg" />
		</a>
		<a href="accueil_view.php"> ACCUEIL </a>
		<a href="convocation_view.php"> CONVOCATION </a>
		<a id='ici' href="effectif_view.php"> EFFECTIF </a>
		<a href="absences_view.php"> ABSENCES </a>
		<a href="matchs_view.php"> MATCHS </a>
		<?php
		session_start();
		$user = $_SESSION['username'];
		echo "<a id='connect'>Bonjour $user</a>";
		echo  "<a id='deconnexion' href='accueil_view.php?deconnexion=true'>Déconnexion</a>";
		if(isset($_GET['deconnexion'])){ 
			if($_GET['deconnexion']==true){  
				session_unset();
				header("location:accueil_view.php");
			}
		}	
		?>
	</nav>
	<br/>
	<div id="letout">
	<div id="gauche">    
	<table border="1">
	<tr><th>TYPE LICENCE</th><th>PRENOM, NOM</th></tr>		
	<?php
	try
	{
		// On se connecte à MySQL
		$bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'etudiant', 'etudiant');
	}
	catch(Exception $e)
	{
		// En cas d'erreur, on affiche un message et on arrête tout
	        die('Erreur : '.$e->getMessage());
	}

	// Si tout va bien, on peut continuer

	// On récupère tout le contenu de la table effectif
	$reponse = $bdd->query('SELECT * FROM effectif');

	// On affiche chaque entrée une à une
	while ($donnees = $reponse->fetch())
	{
		$tlic =$donnees['type_licence'];
        	$nom = $donnees['prenom_nom'];
		echo "<tr><td>$tlic</td><td>$nom </td></tr>";
	}

	$reponse->closeCursor(); // Termine le traitement de la requête

	?>
	</table>
	</div>
	<div id="droite">
	<form action="effectif.php" method="post">
	<fieldset>
	<legend><b>Nouveau joueur</b></legend>
	<label>Type licence : </label>
	<input type="text" name="tlic" value="" size="10" maxlength="10" required="required"/><br/><br/>
	<label>Prénom Nom : </label>
	<input type="text" name="nom" value="" size="20" maxlength="40" required="required"/><br/><br/>
	<input type="submit" value="Ajouter" name="ajouter" />
	</fieldset>
	</form>
	</div>
	</div>
</body>
</html>
