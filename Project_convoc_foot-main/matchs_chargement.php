<?php

$serveur = "localhost";
$dbname = "projet";
$user = "etudiant";
$pass = "etudiant";

try{
	$dbco = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
	$dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$file =$_FILES["fichcsv"]["tmp_name"];
	if (file_exists($file) && $id_file = fopen($file, "r")) {
		while ($tab = fgetcsv($id_file, 200, ";")) {
			$categorie = $tab[0];
			$competition = $tab[1];
			$equipe = $tab[2];
			$clubadv = $tab[3];
			$localiteadv = $tab[4];
			$equipeadv = $tab[5];
			$datem = $tab[6];
			$heure = $tab[7];
			$deplacement = $tab[8];
			$terrain = $tab[9];
			$site =$tab[10];
	    
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
		fclose($id_file);
	}
}
catch(PDOException $e){
	header("Location:matchs_view.php?erreur=2");
}    

?>
