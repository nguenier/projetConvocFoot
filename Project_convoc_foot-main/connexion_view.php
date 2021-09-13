<html>
<head>
<meta charset="utf-8">
<title>Connexion</title>
<link rel="icon" type="image/jpg" href="img/logo.jpg">
<style>
	#popup{
		margin: 10% auto;
		width : 30%;
		background-color: rgb(243, 243, 243);
		padding: 1em;
		border-radius: 5px;
	}
	#annuler{
		margin-left: 50%;
	}
	h1{
		text-align:center;
	}
</style>
</head>
<body>
	<div id="popup">
	<form action="connexion.php" method="POST">
		<h1>Connexion</h1>
                
		<label><b>Nom d'utilisateur : </b></label><br/>
		<input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required/><br/><br/>

		<label><b>Mot de passe : </b></label><br/>
		<input type="password" placeholder="Entrer le mot de passe" name="password" required/> <br/><br/>

		<input type="submit" id="submit" value="Se connecter" />
		<a  href="accueil_view.php">
		<input type="button" id="annuler" value="Annuler" />
		</a>
		<?php
		if(isset($_GET['erreur'])){
			$err = $_GET['erreur'];
			if($err==1 || $err==2)
			echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
		}
		?>
	</form>
	</div>
</body>
</html>
