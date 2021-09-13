<?php

require '../Modele/Modele.php';

try{
	$q=$_GET["q"];

	$nonlic=recupNonlic($q);
	$rep="";
	while($donnees = $nonlic->fetch())
	{
		$rep.="<tr><td>";
		$rep.=$donnees['prenom_nom'];
		$rep .="</td></tr>";
	}
	echo $rep;
}
catch (Exception $e) {
	header("Location:index.php?action=convocation&erreur=1");
}
?>
