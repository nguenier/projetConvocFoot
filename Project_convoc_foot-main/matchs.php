<?php
	$serveur = "localhost";
	$dbname = "projet";
	$user = "etudiant";
	$pass = "etudiant";
    
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
    
	try{
		$dbco = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
		$dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
		$sth = $dbco->prepare("
		INSERT INTO matchs(categorie, competition, equipe, club_adverse, localite_club_adverse, equipe_adverse, date, heure, deplacement, terrain, site)		
		VALUES(:categorie, :competition, :equipe, :clubadv, :localiteadv, :equipeadv, :datem, :heure, :deplacement, :terrain, :site)");
		$sth->bindParam(':categorie',$categorie);
		$sth->bindParam(':competition',$competition);
		$sth->bindParam(':equipe',$equipe);
		$sth->bindParam(':clubadv',$clubadv);
		$sth->bindParam(':localiteadv',$localiteadv);
		$sth->bindParam(':equipeadv',$equipeadv);
		$sth->bindParam(':datem',$datem);
		$sth->bindParam(':heure',$heure);
		$sth->bindParam(':deplacement',$deplacement);
		$sth->bindParam(':terrain',$terrain);
		$sth->bindParam(':site',$site);
		$sth->execute();
        
		header("Location:matchs_view.php");
	}
	catch(PDOException $e){
		header("Location:matchs_view.php?erreur=1");
	}
?>
