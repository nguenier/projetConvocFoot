<?php
try{
	absences();
}
catch (Exception $e) {
	header("Location:index.php?action=absences&erreur=1");
}

?>
