<?php $titre = 'Matchs'; ?>

<?php ob_start(); ?>
	
<?php $head = ob_get_clean(); ?>

<?php ob_start(); ?>
	<a href="index.php">ACCUEIL</a>
	<a href="index.php?action=convocation">CONVOCATION</a>
	<?php 
	if(isset($_SESSION['username'])){
			echo"<a href='index.php?action=effectif'>EFFECTIF</a>";
			echo"<a href='index.php?action=absences'>ABSENCES</a>";
			echo"<a id='ici' href='index.php?action=matchs'>MATCHS</a>";
			$user = $_SESSION['username'];
			echo "<a id='connect'>Bonjour $user</a>";
			echo  "<a id='deconnexion' href='index.php?deconnexion=true'>Déconnexion</a>";
		}else{
			echo"<a>EFFECTIF</a>";
			echo"<a>ABSENCES</a>";
			echo"<a id='ici'>MATCHS</a>";
			echo "<a id='connexion' href='index.php?action=connexion'>S'identifier</a>";
		}
		?>
<?php $entete = ob_get_clean(); ?>

<?php ob_start(); ?>
	<form action="index.php?action=matchs&amp;id=5" method="post">
                    <fieldset>
                        <legend><b>Modifications de la rencontre</b></legend>
                        <?php foreach($matchs as $match): $compt=1;?>
                        <label>Categorie :</label>
                        <select name="categorie" id="categorie">
                            <option value="Senior">Senior</option>
                        </select><br/>
			<input type="hidden" name="datedebase" value="<?= $match['date'] ?>" />
                        <input type="hidden" name="equipedebase" value="<?= $match['equipe'] ?>" />                        
			<label>Competition :</label>
                        <input type="text" name="competition" value="<?= $match['competition'] ?>" size="20" maxlength="30" required="required"/><br/>
                        
                        <label>Equipe :</label>
                        <select name="equipe" id="equipe">';
                        <?php if($match['equipe']=="SENIORS_A") { ?>
                            <option value="SENIORS_A" selected>SENIORS_A</option>
                            <option value="SENIORS_B">SENIORS_B</option>
                            <option value="SENIORS_C">SENIORS_C</option>
                        <?php } else if($match['equipe']=="SENIORS_B") { ?>
                            <option value="SENIORS_A">SENIORS_A</option>
                            <option value="SENIORS_B" selected>SENIORS_B</option>
                            <option value="SENIORS_C">SENIORS_C</option>
                         <?php } else if($match['equipe']=="SENIORS_C") { ?>
                            <option value="SENIORS_A">SENIORS_A</option>
                            <option value="SENIORS_B">SENIORS_B</option>
                            <option value="SENIORS_C" selected>SENIORS_C</option>
                        <?php } ?>
                        </select><br/>
                        
                        <label>Club adverse :</label>
                        <input type="text" name="clubadv" value="<?= $match['club_adverse'] ?>" size="20" maxlength="30"/><br/>
                        
                        <label>Localite club adverse :</label>
                        <input type="text" name="localiteadv" value="<?= $match['localite_club_adverse'] ?>" size="20" maxlength="30"/><br/>
                        
                        <label>Equipe adverse :</label>
                        <input type="text" name="equipeadv" value="<?= $match['equipe_adverse'] ?>" size="20" maxlength="30" required="required"/><br/>
                        
                        <label>Date :</label>
                        <input type="date" id="datematch" name="datem" value="<?= $match['date'] ?>" min="2021-08-01" max="2022-07-31" required><br/>
                        
                        <label>Heure :</label>
                        <input type="time" id="heure" name="heure" value="<?= $match['heure'] ?>" min="00:00" max="23:59" required><br/>
                        
                        <label>Deplacement :</label>
                        <input type="text" name="deplacement" value="<?= $match['deplacement'] ?>" size="10" maxlength="10"/><br/>
                        
                        <label>Terrain :</label>
                        <input type="text" name="terrain" value="<?= $match['terrain'] ?>" size="20" maxlength="30" required="required"/><br/>
                        
                        <label>Site :</label>
                        <input type="text" name="site" value="<?= $match['site'] ?>" size="20" maxlength="30" required="required"/><br/>
                        
                        <input type="submit" value="Valider" name="modif" />
			<?php endforeach;
			if(empty($compt)){
				header("Location:index.php?action=matchs&amp;id=3&amp;erreur=2");
			}?>
                        <input type="button" onclick="document.location.href='index.php?action=matchs'" value="Annuler"/>
                    </fieldset>
                </form>

<?php $contenu = ob_get_clean(); ?>

<?php require 'gabarit.php'; ?>
