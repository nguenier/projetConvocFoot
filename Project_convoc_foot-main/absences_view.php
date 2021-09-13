<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Absences</title>
<link rel="icon" type="image/png" href="img/logo.png">
<script src="https://code.jquery.com/jquery-3.3.1.js"
	integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
	crossorigin="anonymous"></script>
<style type="text/css">
	table,tr,th,td {
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
	#tableau {
		overflow:auto;
	}
	/*select {
		color: red;
		font-weight: bold;
	}*/
</style>
</head>
<body>
	<nav>
		<a id="lg" href="accueil_view.php">
		<img id="logo" alt="" src="img/logo.png" />
		</a>
		<a href="accueil_view.php">ACCUEIL</a>
		<a href="convocation_view.php">CONVOCATION</a>
		<a href="effectif_view.php">EFFECTIF</a>
		<a id='ici' href="absences_view.php">ABSENCES</a>
		<a href="matchs_view.php">MATCHS</a>
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
	<div id="tableau">
    	<?php
    	echo '<table><tr><th>Code : A(bsent), B(lessé),N(on-licencié), S(uspendu)</th>';
                $date_base='2021-08-01';
                while ($date_base <= '2022-07-31') {
                    if($date_base > date('Y-m-d'))
                        echo '<th style="background-color: lightgreen;">';
                    else 
                        echo '<th style="background-color: lightgrey;">';
                    echo date('m-d',strtotime($date_base)),"</th>";
                    $date_base = date('Y-m-d',strtotime('+7 day', strtotime($date_base)));
                }
                echo '</tr>';
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

		// On récupère les noms de la table effectif
		$reponse = $bdd->query('SELECT prenom_nom FROM effectif');

		// On affiche chaque entrée une à une
		$compteur=0;
		$reste=47;
		while ($donnees = $reponse->fetch())
		{
			$nom = $donnees['prenom_nom'];
			echo "<tr><td>$nom </td>";
			try
			{
				// On se connecte à MySQL
				$bdd2 = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'etudiant', 'etudiant');
			}
			catch(Exception $e)
			{
				// En cas d'erreur, on affiche un message et on arrête tout
				die('Erreur : '.$e->getMessage());
			}
			$date_base='2021-08-01';
			while ($date_base<='2022-07-31'){
				$reponse2 = $bdd2->query('SELECT motif FROM absences where prenom_nom="'.$nom.'" AND date="'.$date_base.'"');
				if($donnees2 = $reponse2->fetch()){
					$mot=$donnees2["motif"];
					echo '<input type="hidden" id="nompren'.$compteur.'" value="'.$nom.'" name=""/>
					<input type="hidden" id="dateb'.$compteur.'" value="'.$date_base.'" name=""/>
					<td><select id='.$compteur.' name="test" onchange="absent(this.value, this.id)">
					<option disabled selected>'.$mot.'</option>
					<option>...</option>
					<option>A</option>
					<option>N</option>
					<option>B</option>   
					<option>S</option> 
					</select></td>';
				}
			$reponse2->closeCursor();               
                    	$date_base=date('Y-m-d',strtotime('+7 day', strtotime($date_base)));
			$compteur++;
			}
			echo "</tr>";
			$compteur+=$reste;
		}

		$reponse->closeCursor(); // Termine le traitement de la requête
    ?>
	</div>
	<script defer src="absences.js"></script>
</body>
</html>
