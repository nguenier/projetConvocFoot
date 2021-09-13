<?php $titre = 'Connexion'; ?>

<?php ob_start(); ?>

<?php $head = ob_get_clean(); ?>

<?php ob_start(); ?>
	<a href="index.php">ACCUEIL</a>
	<a href="index.php?action=convocation">CONVOCATION</a>
	<a>EFFECTIF</a>
	<a>ABSENCES</a>
	<a>MATCHS</a>
	<a id='connexion' href='index.php?action=connexion'>S'identifier</a>
<?php $entete = ob_get_clean(); ?>


<?php ob_start(); ?>
	<div id="popup">
	<form action="index.php" method="POST">
		<h1>Connexion</h1>
                
		<label><b>Nom d'utilisateur : </b></label><br/>
		<input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required/><br/><br/>

		<label><b>Mot de passe : </b></label><br/>
		<input type="password" placeholder="Entrer le mot de passe" name="password" required/> <br/><br/>

		<input type="submit" id="submit" value="Se connecter" />
		<a  href="index.php">
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

<?php $contenu = ob_get_clean(); ?>

<?php require 'gabarit.php'; ?>
