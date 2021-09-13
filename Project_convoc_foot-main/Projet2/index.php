<?php
session_start();
require 'Controleur/controleur.php';

try {
	if (isset($_GET['action'])) {
		if ($_GET['action'] == 'effectif') {
			require 'Controleur/controleur_effectif.php';
		}
		if ($_GET['action'] == 'matchs'){
			require 'Controleur/controleur_matchs.php';
		}
		else if ($_GET['action'] == 'absences') {
			require 'Controleur/controleur_absences.php';
		}
		else if ($_GET['action'] == 'convocation') {
			require 'Controleur/controleur_convocation.php';
		}
		else if ($_GET['action'] == 'connexion') {
			require 'Controleur/controleur_connexion.php';
		}
		else
			throw new Exception("Action non valide");
	}
	else if(isset($_GET['deconnexion'])){ 
		if($_GET['deconnexion']==true){  
			session_unset();
			accueil();
		}
	}
	else if(isset($_POST['username']) && isset($_POST['password']))
	{
		$username=$_POST['username'];
		$password=$_POST['password'];
		$user=connex($username,$password);
		if($user!=null){
			$_SESSION['username'] = $user;
			accueil();
		}
		else
		{
			header('Location: index.php?action=connexion&erreur=1'); // utilisateur ou mot de passe incorrect
		}
	}
	else {  // aucune action définie : affichage de l'accueil
		accueil();
	}
}
catch (Exception $e) {
	$e->getMessage();
}
