<?php $titre = 'Effectif'; ?>

<?php ob_start(); ?>
	
<?php $head = ob_get_clean(); ?>

<?php ob_start(); ?>
	<a href="index.php">ACCUEIL</a>
	<a href="index.php?action=convocation">CONVOCATION</a>
	<?php 
	if(isset($_SESSION['username'])){
			echo"<a id='ici' href='index.php?action=effectif'>EFFECTIF</a>";
			echo"<a href='index.php?action=absences'>ABSENCES</a>";
			echo"<a href='index.php?action=matchs'>MATCHS</a>";
			$user = $_SESSION['username'];
			echo "<a id='connect'>Bonjour $user</a>";
			echo  "<a id='deconnexion' href='index.php?deconnexion=true'>Déconnexion</a>";
		}else{
			echo"<a id='ici'>EFFECTIF</a>";
			echo"<a>ABSENCES</a>";
			echo"<a>MATCHS</a>";
			echo "<a id='connexion' href='index.php?action=connexion'>S'identifier</a>";
		}
		?>
<?php $entete = ob_get_clean(); ?>

<?php ob_start(); ?>
<div id="letout">
	<div id="gauche">    
	<table border="1">
	<tr><th>TYPE LICENCE</th><th>PRENOM, NOM</th></tr>		
	<?php foreach($joueurs as $joueur): ?>
		<tr>
		<td><?= $joueur['type_licence'] ?></td>
		<td><?= $joueur['prenom_nom'] ?></td>
		</tr>
	<?php endforeach;?>
	</table>
	</div>
	<?php if((isset($_SESSION['username'])) AND ($_SESSION['username']=='secretaire')) : ?>
		<div id="droite">
		<form action="index.php?action=effectif" method="post">
		<fieldset>
		<legend><b>Nouveau joueur</b></legend>
		<label>Type licence : </label>
		<input type="text" name="tlic" value="" size="10" maxlength="10" required="required"/><br/><br/>
		<label>Prénom Nom : </label>
		<input type="text" name="nom" value="" size="20" maxlength="40" required="required"/><br/><br/>
		<input type="submit" value="Ajouter" name="ajouter" />
		<?php
		if(isset($_GET['erreur'])){
		    $err = $_GET['erreur'];
		    if($err==1){
		        echo "<p style='color:red'>Il existe déjà un joueur à ce nom</p>";
		    }
		}
		?>
		</fieldset>
		</form>
		</div>
	<?php endif; ?>
</div>
<?php $contenu = ob_get_clean(); ?>

<?php require 'gabarit.php'; ?>
