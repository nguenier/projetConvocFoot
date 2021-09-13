<?php
    $serveur = "localhost";
	$dbname = "projet";
	$user = "etudiant";
	$pass = "etudiant";
	
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
    
    $datepardefaut=$_POST["datedebase"];
	$nomequipedefaut=$_POST["equipedebase"];
	
	try{
		$dbco = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
		$dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sth = $dbco->prepare('
        UPDATE matchs
        SET 
            categorie="'.$modcategorie.'",
            competition="'.$modcompetition.'",
            equipe="'.$modequipe.'",
            club_adverse="'.$modclubadv.'",
            localite_club_adverse="'.$modlocaliteadv.'",
            equipe_adverse="'.$modequipeadv.'",
            date="'.$moddatem.'",
            heure="'.$modheure.'",
            deplacement="'.$moddeplacement.'",
            terrain="'.$modterrain.'",
            site="'.$modsite.'"
            WHERE equipe="'.$nomequipedefaut.'" AND date="'.$datepardefaut.'"
        ');
        $sth->execute();
        
        header("Location:matchs_view.php");
    }
	catch(PDOException $e){
        header("Location:matchs_view.php?erreur=3");
    }
?>
