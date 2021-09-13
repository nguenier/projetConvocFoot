<html>
<head>
<meta charset="UTF-8">
<title>Accueil</title>
<link rel="icon" type="image/jpg" href="img/logo.jpg">
<script src="https://code.jquery.com/jquery-3.3.1.js"
	integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
	crossorigin="anonymous"></script>
<style>
	#logo{
		width:80px;
	}
	img{
		width:500px;
		height:auto;
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

	.conteneur{
    max-width: 95%;
    margin: 50px auto;
}
.d2{
    width: 100%;
    padding-top: 40%;
    background-color: #EDEDED;
    background-size: cover;
    animation: 10s linear 1s infinite running slidein;
}

	@keyframes slidein{
		0%{background-image: url("img/img1.jpg");}
		33.33%{background-image: url("img/img2.jpg");}
		66.67%{background-image: url("img/img3.jpg");}
		100%{background-image: url("img/img1.jpg");}
}

</style>
</head>
<body>
	<nav>
		<a id="lg" href="accueil_view.php">
		<img id="logo" alt="" src="img/logo.jpg" />
		</a>
		<a id='ici' href="accueil_view.php">ACCUEIL</a>
		<a href="convocation_view.php">CONVOCATION</a>
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
	<div class="conteneur">
		<div class="d2">
		</div>
	</div>
</body>
</html>
