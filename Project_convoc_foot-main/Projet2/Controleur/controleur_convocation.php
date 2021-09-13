<?php

try{
	convocation();
}
catch (Exception $e) {
	header("Location:index.php?action=convocation&erreur=1");
}

?>
