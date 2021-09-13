<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Convocation</title>
<link rel="icon" type="image/jpg" href="img/logo.jpg">
<script src="https://code.jquery.com/jquery-3.3.1.js"
	integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
	crossorigin="anonymous"></script>
<style>
table,tr,th,td{
	border: solid 1px;
	border-collapse: collapse;
	text-align: left;
}
td {
    width: 25%;
}
.number{
	text-align: right;
}
.conv{
	text-align: center;
}
#tab {
        width:100%;
}
.prepa {
        text-align: center;
}
#logo{
	width:80px;
}
nav{
	background-color:white;
	text-align:center;
}
a {
	font-size: 125%;
	font-family: Helvetica;
	color:black;
	margin-left: 5%;
	outline: none;
	text-decoration: none;
}	
a:focus {
	text-decoration: #DE9E00 underline 2px;
	color:#DE9E00;
}
a:hover {
	text-decoration: #DE9E00 underline 2px;
	color: #DE9E00;
}
#ici{
	font-weight: bold;
	text-decoration: #DE9E00 underline 2px;
	color: #DE9E00;
}
#gauche {
    	float:left;
    	width:50%;
	overflow:scroll;
}
#droite{
	margin-left:50%;
	overflow:scroll;
}
#connexion{
	font-weight: bold;
	color: #DE9E00;
	text-decoration:none;
}
#lg{
	text-decoration:none;
}
#connect {
	text-decoration:none;
	font-size: 100%;
	color: #DE9E00;
}
#deconnexion{
	font-size: 100%;
}
</style>
</head>
<body>
	<nav>
		<a id="lg" href="accueil_view.php">
		<img id="logo" alt="" src="img/logo.jpg" />
		</a>
		<a href="accueil_view.php"> ACCUEIL </a>
		<a id='ici' href="convocation_view.php"> CONVOCATION </a>
		<?php
		session_start();
		if(isset($_SESSION["username"])){
			echo"<a href='effectif_view.php'>EFFECTIF</a>";
			echo"<a href='absences_view.php'>ABSENCES</a>";
			echo"<a href='matchs_view.php'>MATCHS</a>";
			$user = $_SESSION['username'];
			echo "<a id='connect'>Bonjour $user</a>";
			echo  "<a id='deconnexion' href='accueil_view.php?deconnexion=true'>Déconnexion</a>";
		}else{
			echo"<a>EFFECTIF</a>";
			echo"<a>ABSENCES</a>";
			echo"<a>MATCHS</a>";
			echo "<a id=\"connexion\" href=\"connexion_view.php\">S'identifier</a>";
		}
		
		if(isset($_GET['deconnexion'])){ 
			if($_GET['deconnexion']==true){  
				session_unset();
				header("location:accueil_view.php");
			}
		}
		?>
	</nav>
	<br/>
	<div id=letout>
	<div id=gauche>
	<table>
		<tr>
			<th></th>
			<th class='conv' colspan=3>CONVOCATION</th>
		</tr>
		<tr>
			<th>DATE</th>
			<td><input type="date" id="datematch1" name="date1" value="d-m-Y" min="2021-08-01" max="2022-07-31" onchange="date1(this.value)"></td>
			<td><input type="date" id="datematch2" name="date2" value="d-m-Y" min="2021-08-01" max="2022-07-31" onchange="date2(this.value)"></td>
			<td><input type="date" id="datematch3" name="date3" value="d-m-Y" min="2021-08-01" max="2022-07-31" onchange="date3(this.value)"></td>
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
		<tr>
			<th class='number'>1 </th>
			<td>...</td>
			<td>...</td>
			<td>...</td>
		</tr>
		<tr>
			<th class='number'>2 </th>
			<td>...</td>
			<td>...</td>
			<td>...</td>
		</tr>
		<tr>
			<th class='number'>3 </th>
			<td>...</td>
			<td>...</td>
			<td>...</td>
		</tr>
		<tr>
			<th class='number'>4 </th>
			<td>...</td>
			<td>...</td>
			<td>...</td>
		</tr>
		<tr>
			<th class='number'>5 </th>
			<td>...</td>
			<td>...</td>
			<td>...</td>
		</tr>
		<tr>
			<th class='number'>6 </th>
			<td>...</td>
			<td>...</td>
			<td>...</td>
		</tr>
		<tr>
			<th class='number'>7 </th>
			<td>...</td>
			<td>...</td>
			<td>...</td>
		</tr>
		<tr>
			<th class='number'>8 </th>
			<td>...</td>
			<td>...</td>
			<td>...</td>
		</tr>
		<tr>
			<th class='number'>9 </th>
			<td>...</td>
			<td>...</td>
			<td>...</td>
		</tr>
		<tr>
			<th class='number'>10 </th>
			<td>...</td>
			<td>...</td>
			<td>...</td>
		</tr>
		<tr>
			<th class='number'>11 </th>
			<td>...</td>
			<td>...</td>
			<td>...</td>
		</tr>
		<tr>
			<th class='number'>12 </th>
			<td>...</td>
			<td>...</td>
			<td>...</td>
		</tr>
		<tr>
			<th class='number'>13 </th>
			<td>...</td>
			<td>...</td>
			<td>...</td>
		</tr>
		<tr>
			<th class='number'>14 </th>
			<td>...</td>
			<td>...</td>
			<td>...</td>
		</tr>
	</table>
	</div>
	<div id=droite>
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
   	</table>
	</div>
	</div>
	<script defer src="convocation.js"></script>
</body>
</html>
