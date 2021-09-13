<?php
    $serveur = "localhost";
	$dbname = "projet";
	$user = "etudiant";
	$pass = "etudiant";
	
	$datemodif=$_POST["datem"];
	$equipemodif=$_POST["nomEaM"];

	try{
		$dbco = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
		$dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
		$sth = $dbco->prepare('DELETE FROM matchs WHERE equipe="'.$equipemodif.'" AND date="'.$datemodif.'" ');
		$sth->execute();
        
		header("Location:matchs_view.php");
	}
	catch(PDOException $e){
        header("Location:matchs_view.php?erreur=4");	
    }
?>
