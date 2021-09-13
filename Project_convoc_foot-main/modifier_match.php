<?php
    $serveur = "localhost";
	$dbname = "projet";
	$user = "etudiant";
	$pass = "etudiant";
	
	$n6=$_POST["datem"];
	$n2=$_POST["nomEaM"];
	
	try{
		$dbco = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
		$dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$ligne = $dbco->query('SELECT * FROM matchs WHERE date="'.$n6.'" AND equipe="'.$n2.'"');
		if ($donnee = $ligne->fetch()){
        $categorie=$donnee["categorie"];
        $competition=$donnee["competition"];
        $equipe=$donnee["equipe"];
        $club_adverse=$donnee["club_adverse"];
        $localite_club_adverse=$donnee["localite_club_adverse"];
        $equipe_adverse=$donnee["equipe_adverse"];
        $date=$donnee["date"];
        $heure=$donnee["heure"];
        $deplacement=$donnee["deplacement"];
        $terrain=$donnee["terrain"];
        $site=$donnee["site"];
        }
            echo '
            <html>
                <head>
                    <title>Modification de match</title>
                </head>
                <body>
                <form action="valider_modif.php" method="post">
                    <fieldset>
                        <legend><b>Modifications de la rencontre</b></legend>
                        <label>Categorie :</label>
                        <select name="categorie" id="categorie">
                            <option value="Senior">Senior</option>
                        </select><br/>
                        
                        <input type="hidden" name="datedebase" value="'.$n6.'" />
                        <input type="hidden" name="equipedebase" value="'.$n2.'" />
                        
                        <label>Competition :</label>
                        <input type="text" name="competition" value="'.$competition.'" size="20" maxlength="30" required="required"/><br/>
                        
                        <label>Equipe :</label>
                        <select name="equipe" id="equipe">';
                        if($equipe=="SENIORS_A") echo '
                            <option value="SENIORS_A" selected>SENIORS_A</option>
                            <option value="SENIORS_B">SENIORS_B</option>
                            <option value="SENIORS_C">SENIORS_C</option>';
                        else if($equipe=="SENIORS_B") echo '
                            <option value="SENIORS_A">SENIORS_A</option>
                            <option value="SENIORS_B" selected>SENIORS_B</option>
                            <option value="SENIORS_C">SENIORS_C</option>';
                        else if($equipe=="SENIORS_C") echo '
                            <option value="SENIORS_A">SENIORS_A</option>
                            <option value="SENIORS_B">SENIORS_B</option>
                            <option value="SENIORS_C" selected>SENIORS_C</option>';
                            echo '
                        </select><br/>
                        
                        <label>Club adverse :</label>
                        <input type="text" name="clubadv" value="'.$club_adverse.'" size="20" maxlength="30"/><br/>
                        
                        <label>Localite club adverse :</label>
                        <input type="text" name="localiteadv" value="'.$localite_club_adverse.'" size="20" maxlength="30"/><br/>
                        
                        <label>Equipe adverse :</label>
                        <input type="text" name="equipeadv" value="'.$equipe_adverse.'" size="20" maxlength="30" required="required"/><br/>
                        
                        <label>Date :</label>
                        <input type="date" id="datematch" name="datem" value="'.$date.'" required><br/>
                        
                        <label>Heure :</label>
                        <input type="time" id="heure" name="heure" value="'.$heure.'" min="00:00" max="23:59" required><br/>
                        
                        <label>Deplacement :</label>
                        <input type="text" name="deplacement" value="'.$deplacement.'" size="10" maxlength="10"/><br/>
                        
                        <label>Terrain :</label>
                        <input type="text" name="terrain" value="'.$terrain.'" size="20" maxlength="30" required="required"/><br/>
                        
                        <label>Site :</label>
                        <input type="text" name="site" value="'.$site.'" size="20" maxlength="30" required="required"/><br/>
                        
                        <input type="submit" value="Valider" name="modif" />
                        <input type="button" onclick="document.location.href=\'matchs_view.php\';" value="Annuler"/>
                    </fieldset>
                </form>
                </body>
            </html>
            ';
       
	}
	catch(PDOException $e){
       header("Location:matchs_view.php?erreur=3");	
    }

?>
