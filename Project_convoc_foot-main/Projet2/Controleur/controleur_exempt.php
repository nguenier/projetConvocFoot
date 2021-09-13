<?php

require '../Modele/Modele.php';

function deplaceexempt($nom){	// fonction qui enlève un nom de équipe pour l'ajouter à exempt  
	supprimerequipe($nom);
	ajouterexempt($nom);

}

function deplaceequipe($id,$nom){	// fonction qui enlève un nom d'exempt pour l'ajouter à équipe
	supprimerexempt($nom);
	ajouterequipe($id,$nom);

}

function switcheqex($id,$nom1,$nom2){   //fonction pour intervertir un nom dans équipe et dans exempt
	supprimerequipe($nom1);
	ajouterexempt($nom1);
	deplaceequipe($id,$nom2);
}

try{
	if((isset($_GET["q"])) and (isset($_GET["r"]))){
		$q=$_GET["q"];
		$r=$_GET["r"];
	}else {
		$q="";
		$r="";
	}
	$option=recupTableExempt();
	$equipe=recupTableEquipe($r);
	$rep="<option></option>";
	
	while($donnees = $option->fetch())
	{
		if($donnees['prenom_nom']==$q){
			$rep.="<option selected>";
			$rep.=$donnees['prenom_nom'];
			$rep .="</option>";
			if($donnees2 = $equipe->fetch()){
				switcheqex($r,$donnees2['prenom_nom'],$q);
			}
			else{
				deplaceequipe($r,$q);
			}
		}
		else{
			if($donnees2 = $equipe->fetch()){
				deplaceexempt($donnees2['prenom_nom']);				
			}
			$rep.="<option>";
			$rep.=$donnees['prenom_nom'];
			$rep .="</option>";
		}
	}
	echo $rep;
}
catch (Exception $e) {
	header("Location:index.php?action=convocation&erreur=2");
}
?>
