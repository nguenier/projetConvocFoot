<?php

require '../Modele/Modele.php';

try{
	$q=$_GET["q"];
	$r=$_GET["r"];
	$exempt=recupExempt($q);
	reinitialiseexempt();
	reinitialiseequipe();
	while($donnees = $exempt->fetch())
	{
		ajouterexempt($donnees['prenom_nom']);
	}
	$reponse1=recupValMatchs1($q,$r);
	
	if($donnees = $reponse1->fetch()){
		$rep= Array("compet"=>$donnees['competition'],"equadv"=>$donnees['equipe_adverse'],"site"=>$donnees['site'],"terr"=>$donnees['terrain'],"heu"=>$donnees['heure']);
		echo json_encode($rep);
	}
	else {
		$rep= Array("compet"=>"...","equadv"=>"...","site"=>"...","terr"=>"...","heu"=>"...");
		echo json_encode($rep);
	}
}
catch (Exception $e) {
	header("Location:index.php?action=convocation&erreur=1");
}
?>
