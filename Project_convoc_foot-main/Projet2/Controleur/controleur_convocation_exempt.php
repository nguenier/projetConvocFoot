<?php

require '../Modele/Modele.php';

try{
	$exempt=recupTableExempt();
	$rep1="";
	while($donnees = $exempt->fetch())
	{
		$rep1.="<tr><td>";
		$rep1.=$donnees['prenom_nom'];
		$rep1.="</td></tr>";
	}
	echo $rep1;
}
catch (Exception $e) {
	header("Location:index.php?action=convocation&erreur=1");
}
?>
