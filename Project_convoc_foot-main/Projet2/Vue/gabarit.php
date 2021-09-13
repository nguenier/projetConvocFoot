<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="Contenu/style.css" />
        <title><?= $titre ?></title>
	<link rel="icon" type="image/png" href="img/logo.png">
	<script src="https://code.jquery.com/jquery-3.3.1.js"
	integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
	crossorigin="anonymous"></script>
	<?= $head ?>
    </head>
    <body>
        <div id="global">
	<nav>
		<a id="lg" href="index.php">
		<img id="logo" alt="" src="img/logo.png" />
		</a>
		<?= $entete ?>
	</nav>
	<br/>
            <div id="contenu">
                <?= $contenu ?>
            </div> <!-- #contenu -->
        </div> <!-- #global -->
    </body>
</html>
