<?php
try{
	if (isset($_POST['tlic']) && !empty($_POST['tlic']) && isset($_POST['nom']) && !empty($_POST['nom']))
	{           
		$tlic= $_POST['tlic'];
		$nom = $_POST['nom'];
	
		setJoueur($tlic, $nom);

		$rien='...';
		$date_base='2021-08-01';
		while($date_base <= '2022-07-31'){
			setAbsence($nom,$date_base,$rien);
			$date_base = date('Y-m-d',strtotime('+7 day', strtotime($date_base)));
		}
	}
	effectif();
}
catch (Exception $e) {
	header("Location:index.php?action=effectif&erreur=1");
}

?>
