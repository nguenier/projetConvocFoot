<?php
	$q=$_GET["q"];
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

	$sql3="SELECT * FROM matchs WHERE equipe='SENIORS_C' and date='".$q."'";
	   
	$reponse3 = $bdd->query($sql3);
	
	if($donnees = $reponse3->fetch())
	{
		$rep= Array("compet"=>$donnees['competition'],"equadv"=>$donnees['equipe_adverse'],"site"=>$donnees['site'],"terr"=>$donnees['terrain'],"heu"=>$donnees['heure']);
		echo json_encode($rep);
	}
	else {
		$rep= Array("compet"=>"...","equadv"=>"...","site"=>"...","terr"=>"...","heu"=>"...");
		echo json_encode($rep);
	}
	$reponse3->closeCursor(); 
?>
