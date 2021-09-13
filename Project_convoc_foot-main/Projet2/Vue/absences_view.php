<?php $titre = 'Absences'; ?>

<?php ob_start(); ?>
	<script defer src="Vue/absences.js"></script>
<?php $head = ob_get_clean(); ?>

<?php ob_start(); ?>
	<a href="index.php">ACCUEIL</a>
	<a href="index.php?action=convocation">CONVOCATION</a>
	<?php 
	if(isset($_SESSION['username'])){
			echo"<a href='index.php?action=effectif'>EFFECTIF</a>";
			echo"<a id='ici' href='index.php?action=absences'>ABSENCES</a>";
			echo"<a href='index.php?action=matchs'>MATCHS</a>";
			$user = $_SESSION['username'];
			echo "<a id='connect'>Bonjour $user</a>";
			echo  "<a id='deconnexion' href='index.php?deconnexion=true'>Déconnexion</a>";
		}else{
			echo"<a>EFFECTIF</a>";
			echo"<a id='ici'>ABSENCES</a>";
			echo"<a>MATCHS</a>";
			echo "<a id='connexion' href='index.php?action=connexion'>S'identifier</a>";
		}
		?>
<?php $entete = ob_get_clean(); ?>

<?php ob_start(); ?>
	<div id="tableau">
	<table><tr><th>Code : A(bsent), B(lessé),N(on-licencié), S(uspendu)</th>
	<?php  
        $date_base='2021-08-01';  //valeurs a modif selon l'année
        $date_finale='2022-07-31'; //valeurs a modif selon l'année
        while ($date_base <= $date_finale) {
            if($date_base > date('Y-m-d')): ?>
                    <th style="background-color: lightgreen;">
            <?php else: ?> 
                <th style="background-color: lightgrey;">
            <?php endif; 
            echo date('m-d',strtotime($date_base))?></th>
            <?php $date_base = date('Y-m-d',strtotime('+7 day', strtotime($date_base)));
        }
	?>
	</tr>
	<?php $compteur=0; $test="";
            //RECUPERER LA PUTAIN DE BDD
            //$motifabs = recupValMatchs($date_base, $joueur['prenom_nom']);
		$test=$premJ['prenom_nom'];
		?> <tr><td><?= $test ?></td>
		<?php foreach($motifs as $motif): ?>	
		<td><?php if($test==$motif['prenom_nom']): echo
                '<input type="hidden" id="nompren'.$compteur.'" value="'.$motif['prenom_nom'].'" name=""/>
                <input type="hidden" id="dateb'.$compteur.'" value="'.$date_base.'" name=""/>
                <select id='.$compteur.' name="test" onchange="absent(this.value, this.id)">
                    <option disabled selected>'.$motif['motif'].'</option>
                    <option>...</option>
                    <option>A</option>
                    <option>N</option>
                    <option>B</option>   
                    <option>S</option> 
                </select></td>';
		else : 
		$test=$motif['prenom_nom'];?>
			</tr><tr>
			<td><?= $test ?></td>
			<td><?php echo
                '<input type="hidden" id="nompren'.$compteur.'" value="'.$motif['prenom_nom'].'" name=""/>
                <input type="hidden" id="dateb'.$compteur.'" value="'.$date_base.'" name=""/>
                <select id='.$compteur.' name="test" onchange="absent(this.value, this.id)">
                    <option disabled selected>'.$motif['motif'].'</option>
                    <option>...</option>
                    <option>A</option>
                    <option>N</option>
                    <option>B</option>   
                    <option>S</option> 
                </select></td>';
		endif;
		$compteur++;
            endforeach; ?>
		</tr>
<?php $contenu = ob_get_clean(); ?>

<?php require 'gabarit.php'; ?>
