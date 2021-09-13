<?php
	$q=$_GET["q"];
	$s=$_GET["s"];
	$t=$_GET["t"];

	$serveur = "localhost";
    	$dbname = "projet";
    	$user = "etudiant";
    	$pass = "etudiant";

	try
	{
		// On se connecte à MySQL
		$dbco = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
		$dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sth = $dbco->prepare('UPDATE absences SET motif="'.$q.'" WHERE prenom_nom="'.$s.'" AND date="'.$t.'"');
		$sth->execute();
		echo $q;
	}
	catch(Exception $e)
	{
		// En cas d'erreur, on affiche un message et on arrête tout
	        die('Erreur : '.$e->getMessage());
	}

?>
