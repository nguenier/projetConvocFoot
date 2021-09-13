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

<div id="total">
	<div id="gauche_2">
	<table>
        <tr>
            <th> CATEGORIE </th>
            <th> COMPETITION </th>
            <th> EQUIPE </th>
            <th> CLUB ADVERSE </th>
            <th> LOCALITE CLUB ADVERSE </th>
            <th> EQUIPE ADVERSE </th>
            <th> DATE </th>
            <th> HEURE </th>
            <th> DEPLACEMENT </th>
            <th> TERRAIN </th>
            <th> SITE </th>
        </tr>
	<?php foreach($matchs as $match): ?>
		<tr>
		<td><?= $match['categorie'] ?></td>
		<td><?= $match['competition'] ?></td>
		<td><?= $match['equipe'] ?></td>
		<td><?= $match['club_adverse'] ?></td>
		<td><?= $match['localite_club_adverse'] ?></td>
		<td><?= $match['equipe_adverse'] ?></td>
		<td><?= $match['date'] ?></td>
		<td><?= $match['heure'] ?></td>
		<td><?= $match['deplacement'] ?></td>
		<td><?= $match['terrain'] ?></td>
		<td><?= $match['site'] ?></td>
		</tr>
	<?php endforeach;?>
	</table>
	</div>
	<?php if((isset($_SESSION['username'])) AND ($_SESSION['username']=='secretaire')) : ?>
	<div id="droite_2">
	<form action="index.php?action=matchs&amp;id=1" method="post">
	<fieldset>
	<legend><b>Match</b></legend>
	<label>Categorie :</label>
	<select name="categorie" id="categorie">
                <option value="Senior">Senior</option>
            </select>
            <br/>
            <label>Compétition : </label>
            <input type="text" name="competition" value="" size="20" maxlength="30" required="required"/>
            <br/>
            <label>Equipe : </label>
            <select name="equipe" id="equipe">
                <option value="SENIORS_A">SENIORS_A</option>
                <option value="SENIORS_B">SENIORS_B</option>
                <option value="SENIORS_C">SENIORS_C</option>
            </select>
            <br/>
            <label>Club adverse : </label>
            <input type="text" name="clubadv" value="" size="20" maxlength="30" required="required"/>
            <br/>
            <label>Localite club adverse : </label>
            <input type="text" name="localiteadv" value="" size="20" maxlength="30"/>
            <br/>
            <label>Equipe adverse : </label>
            <input type="text" name="equipeadv" value="" size="20" maxlength="30"/>
            <br/>
            <label>Date : </label>
            <input type="date" id="datematch" name="datem" value="d-m-Y" min="2021-08-01" max="2022-07-31" required>
            <br/>
            <label>Heure : </label>
            <input type="time" id="heure" name="heure" min="00:00" max="23:59" required>
            <br/>
            <label>Deplacement : </label>
            <input type="text" name="deplacement" value="" size="10" maxlength="10"/>
            <br/>
            <label>Terrain : </label>
            <input type="text" name="terrain" value="" size="20" maxlength="30" required="required"/>
            <br/>
            <label>Site : </label>
            <input type="text" name="site" value="" size="20" maxlength="30" required="required"/>
            <br/>
            <input type="submit" value="Ajouter" name="ajouter" />
            <?php
            if(isset($_GET['erreur'])){
                $err = $_GET['erreur'];
                if($err==1){
                	echo "<p style='color:red'>Il existe déjà un match ce jour là pour cette équipe</p>";
		}
            }
            ?>
        </fieldset>
    </form>
<form action="index.php?action=matchs&amp;id=2"  method="post" enctype="multipart/form-data">
        <fieldset>
        <legend><b>Ajoute d'une liste de dates</b></legend>
        <label>Choisissez un fichier à charger : </label>
        <input type="file" name="fichcsv" accept=".csv"></input>
        <br/>
        <input type="submit" value="Charger" name="charger" />
        </fieldset>
	</form>
	<form action="index.php?action=matchs&amp;id=3" method="post">
        <fieldset>
        <legend><b>Modifier une rencontre</b></legend>
        <label>Date de la rencontre à modifier : </label>
        <input type="date" id="datematch" name="datem" value="d-m-Y" min="2021-08-01" max="2022-07-31" required>
        <br/>
        <label>Nom de l'équipe qui joue :</label>
        <select name="equipe" id="equipe">
        	<option value="SENIORS_A">SENIORS_A</option>
        	<option value="SENIORS_B">SENIORS_B</option>
        	<option value="SENIORS_C">SENIORS_C</option>
        </select>
        <br/>
        <input type="submit" value="Modifier" name="Modifier" />
        <?php
        if(isset($_GET['amp;erreur'])){
            $err = $_GET['amp;erreur'];
            if($err==3){
                echo "<p style='color:red'>Le match ne peut pas être modifié car il y a déjà un match de prévu pour cette équipe</p>";
            }
		else  if($err==2){
			echo "<p style='color:red'>Il n'existe pas de match pour cette équipe ce jour là</p>";
            }
        }
        ?>
        </fieldset>
	</form>
	<form action="index.php?action=matchs&amp;id=4" method="post">
        <fieldset>
        <legend><b>Supprimer une rencontre</b></legend>
        <label>Date de la rencontre à supprimer : </label>
        <input type="date" id="datematch" name="datem" value="Y-m-d" min="2021-08-01" max="2022-07-31" required>
        <br/>
        <label>Nom de l'équipe qui joue :</label>
        <select name="equipe" id="equipe">
        	<option value="SENIORS_A">SENIORS_A</option>
        	<option value="SENIORS_B">SENIORS_B</option>
        	<option value="SENIORS_C">SENIORS_C</option>
        </select>
        <br/>
        <input type="submit" value="Supprimer" name="Supprimer" />
        <?php
        if(isset($_GET['amp;erreur'])){
            $err = $_GET['amp;erreur'];
            if($err==4){
                echo "<p style='color:red'>Les informations ne sont pas valides</p>";
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
