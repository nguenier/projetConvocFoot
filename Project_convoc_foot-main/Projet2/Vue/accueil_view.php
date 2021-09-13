<?php $titre = 'Accueil'; ?>

<?php ob_start(); ?>
	
<?php $head = ob_get_clean(); ?>

<?php ob_start(); ?>
	<a id='ici' href="index.php">ACCUEIL</a>
	<a href="index.php?action=convocation">CONVOCATION</a>
	<?php 
	if(isset($_SESSION['username'])){
			echo"<a href='index.php?action=effectif'>EFFECTIF</a>";
			echo"<a href='index.php?action=absences'>ABSENCES</a>";
			echo"<a href='index.php?action=matchs'>MATCHS</a>";
			$user = $_SESSION['username'];
			echo "<a id='connect'>Bonjour $user</a>";
			echo  "<a id='deconnexion' href='index.php?deconnexion=true'>Déconnexion</a>";
		}else{
			echo"<a>EFFECTIF</a>";
			echo"<a>ABSENCES</a>";
			echo"<a>MATCHS</a>";
			echo "<a id='connexion' href='index.php?action=connexion'>S'identifier</a>";
		}
		?>
<?php $entete = ob_get_clean(); ?>

<?php ob_start(); ?>
<div class="conteneur">
	<div class="d2">
	</div>
</div>
<?php $contenu = ob_get_clean(); ?>

<?php require 'gabarit.php'; ?>
