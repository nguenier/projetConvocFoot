<?php
if(isset($_GET['id'])){
	if($_GET['id']==1){
		try{
			if (isset($_POST['competition']) && !empty($_POST['competition']) && isset($_POST['clubadv']) && !empty($_POST['clubadv']) && isset($_POST['datem']) && !empty($_POST['datem']) && isset($_POST['heure']) && !empty($_POST['heure']) && isset($_POST['terrain']) && !empty($_POST['terrain']) && isset($_POST['site']) && !empty($_POST['site']))
			{           
			$categorie = $_POST["categorie"];
			$competition = $_POST["competition"];
			$equipe = $_POST["equipe"];
			$clubadv = $_POST["clubadv"];
			$localiteadv = $_POST["localiteadv"];
			$equipeadv = $_POST["equipeadv"];
			$datem = $_POST["datem"];
			$heure = $_POST["heure"];
			$deplacement = $_POST["deplacement"];
			$terrain = $_POST["terrain"];
			$site = $_POST["site"];
			
			setMatchs($categorie,$competition,$equipe,$clubadv,$localiteadv,$equipeadv,$datem,$heure,$deplacement,$terrain,$site);
			}
			matchs();
		}
		catch (Exception $e) {
			header("Location:index.php?action=matchs&amp;id=1&amp;erreur=1");
		}
	}
	if($_GET['id']==2){
		try{
			if(isset($_FILES['fichcsv']))
				chargeMatchs();
			matchs();
		}
		catch (Exception $e) {	
			echo 'Exception reçue : ',  $e->getMessage(), "\n";
		}
	}
	if($_GET['id']==3){
		try{
			$date=$_POST["datem"];
			$nom=$_POST["equipe"];
			modifMatchs($date,$nom);
		}
		catch (Exception $e) {
			header("Location:index.php?action=matchs&amp;id=3&amp;erreur=3");
		}
	}
	if($_GET['id']==4){
		try{
			$datemodif=$_POST["datem"];
			$equipemodif=$_POST["equipe"];
			supMatchs($datemodif,$equipemodif);
			matchs();
		}
		catch (Exception $e) {
			echo 'Exception reçue : ',  $e->getMessage(), "\n";
		}
	}
	if($_GET['id']==5){
		try{
			$modcategorie = $_POST["categorie"];
			$modcompetition = $_POST["competition"];
			$modequipe = $_POST["equipe"];
			$modclubadv = $_POST["clubadv"];
			$modlocaliteadv = $_POST["localiteadv"];
			$modequipeadv = $_POST["equipeadv"];
			$moddatem = $_POST["datem"];
			$modheure = $_POST["heure"];
			$moddeplacement = $_POST["deplacement"];
			$modterrain = $_POST["terrain"];
			$modsite = $_POST["site"];
			$date=$_POST["datedebase"];
			$nom=$_POST["equipedebase"];
			validMatchs($modcategorie,$modcompetition,$modequipe,$modclubadv, $modlocaliteadv, $modequipeadv, $moddatem, $modheure, $moddeplacement, $modterrain, $modsite,$date,$nom);
			matchs();
		}
		catch (Exception $e) {
			header("Location:index.php?action=matchs&amp;id=3&amp;erreur=3");
		}
	}
}
else matchs();

?>
