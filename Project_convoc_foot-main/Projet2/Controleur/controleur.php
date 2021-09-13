<?php

require_once './Modele/Modele.php';

function accueil() {
	require 'Vue/accueil_view.php';
}

function effectif(){
	$joueurs=getJoueur();
	require 'Vue/effectif_view.php';
}

function convocation() {	
	require'Vue/convocation_view.php';
}

function connexion() {	
	require'Vue/connexion_view.php';
}

function absences() {
	//$joueursAbs=getJAbsent();
	$premJ=getJprem();	
	$motifs=getMAbsent();
	require'Vue/absences_view.php';
}

function matchs() {
	$matchs=getMatchs();
	require 'Vue/matchs_view.php';
}

function modifMatchs($date,$nom) {
	$matchs=recupValMatchs($date,$nom);
	require 'Vue/matchs_modif_view.php';
}
