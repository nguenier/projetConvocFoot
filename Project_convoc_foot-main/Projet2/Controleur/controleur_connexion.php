<?php

try{
	connexion();
}
catch (Exception $e) {
	header("Location:index.php?action=connexion&erreur=1");
}

?>
