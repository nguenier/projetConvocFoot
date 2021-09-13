<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Matchs</title>
<link rel="icon" type="image/jpg" href="img/logo.jpg">
<script src="https://code.jquery.com/jquery-3.3.1.js"
	integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
	crossorigin="anonymous"></script>
<style type="text/css">
	table,tr,th, td {
	        border: solid 1px;
	        border-collapse: collapse;
	}
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
	#total #gauche {
    		float:left;
    		width:70%;
		overflow:auto;
	}
	#droite {
		margin-left:75%;
		overflow:auto;
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
		<a href="effectif_view.php"> EFFECTIF </a>
		<a href="absences_view.php"> ABSENCES </a>
		<a id='ici' href="matchs_view.php"> MATCHS </a>
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
	<div id="total">
	<div id="gauche">
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
        <?php
		$host = $_SERVER['HTTP_HOST'];
		$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        ?>
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
	$reponse = $bdd->query('SELECT * FROM matchs');

	// On affiche chaque entrée une à une
	while ($donnees = $reponse->fetch())
	{
		$categorie = $donnees["categorie"];
		$competition = $donnees["competition"];
		$equipe = $donnees["equipe"];
		$clubadv = $donnees["club_adverse"];
		$localiteadv = $donnees["localite_club_adverse"];
		$equipeadv = $donnees["equipe_adverse"];
		$datem = $donnees["date"];
		$heure = $donnees["heure"];
		$deplacement = $donnees["deplacement"];
		$terrain = $donnees["terrain"];
		$site = $donnees["site"];
		echo "<tr>
		<td>$categorie</td>
		<td>$competition</td>
		<td>$equipe</td>
		<td>$clubadv</td>
		<td>$localiteadv</td>
		<td>$equipeadv</td>
		<td>$datem</td>
		<td>$heure</td>
		<td>$deplacement</td>
		<td>$terrain</td>
		<td>$site</td>
		</tr>";
	}

	$reponse->closeCursor(); // Termine le traitement de la requête

	?>
	</table>
	</div>
	<div id="droite">
	<form action="matchs.php" method="post">
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
            <input type="text" name="clubadv" value="" size="20" maxlength="30"/>
            <br/>
            <label>Localite club adverse : </label>
            <input type="text" name="localiteadv" value="" size="20" maxlength="30"/>
            <br/>
            <label>Equipe adverse : </label>
            <input type="text" name="equipeadv" value="" size="20" maxlength="30" required="required"/>
            <br/>
            <label>Date : </label>
            <input type="date" id="datematch" name="datem" value="d-m-Y" required>
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
                if($err==1)
                echo "<p style='color:red'>Il existe déjà un match ce jour là pour cette équipe</p>";
            }
            ?>
        </fieldset>
    </form>
	<form action="matchs_chargement.php"  method="post" enctype="multipart/form-data">
        <fieldset>
        <legend><b>Ajoute d'une liste de dates</b></legend>
        <label>Choisissez un fichier a charger : </label>
        <input type="file" name="fichcsv" accept=".csv"></input>
        <br/>
        <input type="submit" value="Charger" name="charger" />
        <?php
        if(isset($_GET['erreur'])){
            $err = $_GET['erreur'];
            if($err==2){
                echo "<p style='color:red'>Un ou plusieurs matchs ont déjà été programmé</p>";
                echo "<p style='color:red'>Les matchs non programmés ont été ajouté</p>";
            }
        }
        ?>
        </fieldset>
	</form>
	<form action="modifier_match.php" method="post">
        <fieldset>
        <legend><b>Modifier une rencontre</b></legend>
        <label>Date de la rencontre a modifier : </label>
        <input type="date" id="datematch" name="datem" value="d-m-Y" required>
        <br/>
        <label>Nom de l'équipe qui joue :</label>
        <input type="text" name="nomEaM" size="20" maxlength="30" required="required"/>
        <br/>
        <input type="submit" value="Modifier" name="Modifier" />
        <?php
        if(isset($_GET['erreur'])){
            $err = $_GET['erreur'];
            if($err==3){
                echo "<p style='color:red'>Le match ne peut pas etre modifier car il y a deja un match de prevu pour cette equipe a la nouvelle date</p>";
            }
        }
        ?>
        </fieldset>
	</form>
	</form>
	<form action="supprimer_match.php" method="post">
        <fieldset>
        <legend><b>Supprimer une rencontre</b></legend>
        <label>Date de la rencontre a supprimer : </label>
        <input type="date" id="datematch" name="datem" value="Y-m-d" required>
        <br/>
        <label>Nom de l'équipe qui joue :</label>
        <input type="text" name="nomEaM" size="20" maxlength="30" required="required"/>
        <br/>
        <input type="submit" value="Supprimer" name="Supprimer" />
        <?php
        if(isset($_GET['erreur'])){
            $err = $_GET['erreur'];
            if($err==4){
                echo "<p style='color:red'>Les informations ne sont pas valides</p>";
            }
        }
        ?>
        </fieldset>
	</form>
	</div>
	</div>	
</body>
</html>
