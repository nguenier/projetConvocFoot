<?php
    $serveur = "localhost";
    $dbname = "projet";
    $user = "etudiant";
    $pass = "etudiant";
    
    $tlic = $_POST["tlic"];
    $nom = $_POST["nom"];
    
    try{
        $dbco = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        $sth = $dbco->prepare("
            INSERT INTO effectif(type_licence, prenom_nom)
            VALUES(:tlic, :nom)");
        $sth->bindParam(':tlic',$tlic);
        $sth->bindParam(':nom',$nom);
        $sth->execute();
        
        header("Location:effectif_view.php");
    }
    catch(PDOException $e){
        echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
    }
    $rien= "...";
	$date_base='2021-08-01';
	try{
        	$dbco = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
        	$dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		while($date_base <= '2022-07-31'){
			$sth = $dbco->prepare("
			    INSERT INTO absences(prenom_nom, date, motif)
			    VALUES(:nom, :date_base,:rien)");
			$sth->bindParam(':nom',$nom);
			$sth->bindParam(':date_base',$date_base);
			$sth->bindParam(':rien',$rien);
		
			$sth->execute();
			$date_base = date('Y-m-d',strtotime('+7 day', strtotime($date_base)));
		}
	}
	catch(PDOException $e){
		echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
	}	
?>
