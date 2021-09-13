<?php $titre = 'Convocation'; ?>

<?php ob_start(); ?>
	<script defer src="Vue/convocation.js"></script>
<?php $head = ob_get_clean(); ?>

<?php ob_start(); ?>
	<a href="index.php">ACCUEIL</a>
	<a id='ici' href="index.php?action=convocation">CONVOCATION</a>
	<?php 
	if(isset($_SESSION["username"])){
			echo"<a href='index.php?action=effectif'>EFFECTIF</a>";
			echo"<a href='index.php?action=absences'>ABSENCES</a>";
			echo"<a href='index.php?action=matchs'>MATCHS</a>";
			$user = $_SESSION['username'];
			echo "<a id='connect'>Bonjour $user</a>";
			echo  "<a id='deconnexion' href='index.php?deconnexion=true'>Déconnexion</a>";
		}else{
			echo"<a>EFFECTIF</a>";
			echo"<a>ABSENCES</a>";
			echo"<a>MATCHS</a>";
			echo "<a id='connexion' href='index.php?action=connexion'>S'identifier</a>";
		}
		?>
<?php $entete = ob_get_clean(); ?>

<?php ob_start(); ?>
	<div id=letout_2>
	<div id=gauche_3>
	<table>
		<tr>
			<th></th>
			<th class='conv' colspan=3>CONVOCATION</th>
		</tr>
		<tr>
			<th>DATE</th>
			<td><input type="date" id="datematch1" name="date1" value="d-m-Y" min="2021-08-01" max="2022-07-31" onchange="change(this.value,'SENIORS_A')"></td>
			<td><input type="date" id="datematch2" name="date2" value="d-m-Y" min="2021-08-01" max="2022-07-31" onchange="date(this.value,'SENIORS_B')"></td>
			<td><input type="date" id="datematch3" name="date3" value="d-m-Y" min="2021-08-01" max="2022-07-31" onchange="date(this.value,'SENIORS_C')"></td>
		</tr>
		<tr>
			<th>COMPETITION</th>
			<td id="comp1">...</td>
			<td id="comp2">...</td>
			<td id="comp3">...</td>
			
		</tr>
		<tr>
			<th>EQUIPE ADVERSE</th>
			<td id="equ1">...</td>
			<td id="equ2">...</td>
			<td id="equ3">...</td>
		</tr>
		<tr>
			<th>SITE</th>
			<td id="site1">...</td>
			<td id="site2">...</td>
			<td id="site3">...</td>
		</tr>
		<tr>
			<th>TERRAIN</th>
			<td id="terr1">...</td>
			<td id="terr2">...</td>
			<td id="terr3">...</td>
		</tr>
		<tr>
			<th>HEURE</th>
			<td id="heu1">...</td>
			<td id="heu2">...</td>
			<td id="heu3">...</td>
		</tr>
		<tr>
			<th>RDV</th>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
		</tr>
		<tr>
			<th>EQUIPE</th>
			<th>SENIORS_A</th>
			<th>SENIORS_B</th>
			<th>SENIORS_C</th>
		</tr>
		<?php 
        for ($comptequipe=1;$comptequipe<=14;$comptequipe++):?>
            <tr>
                <th class='number'><?=$comptequipe ?></th>
                <td><select class="opt" id="ja<?=$comptequipe?>" onchange="change2(this.value,this.id)"> </select></td>
                <td><select class="opt" id="jb<?=$comptequipe?>" onchange="change2(this.value,this.id)"> </select></td>
                <td><select class="opt" id="jc<?=$comptequipe?>" onchange="change2(this.value,this.id)"> </select></td>
            </tr>
        <?php endfor;?>
	</table>
	</div>
	<div id=droite_3>
	<table id="tab">
    	<tr>
            <td colspan="5" class="prepa">EN PREPARATION</td>
        </tr>
        <tr>
            <th> EXEMPTS </th>
            <th> ABSENTS </th>
            <th> BLESSES </th>
            <th> SUSPENDUS </th>
            <th> NON-LICENCIES/-HABILITES </th>
        </tr>
	<tr>
		<td class="test">
		<table id="table1">
		</table>
	</td>	
	<td>
		<table id="table2">
		</table>
	</td>	
	<td>
		<table id="table3">
		</table>
	</td>	
	<td>
		<table id="table4">
		</table>
	</td>
	<td>
		<table id="table5">
		</table>
	</td>
	</tr>
   	</table>
	</div>
	</div>
<?php $contenu = ob_get_clean(); ?>

<?php require 'gabarit.php'; ?>
