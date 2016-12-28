<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<meta name="description" content="sushis en ligne restauration rapide emporter livraison">
		<meta name="author" content="PIETRAC Nicolas - Mathis SLIMANI - PE Thiboud - Axel BERTRAND - Thomas BROUTIER">
		<link rel="icon" href="images/logo_onglet.png">';

		<title><?php echo $titre; ?></title>

		<?php  include("bootstrapCss.php"); ?>

	</head>

	<body>
	
		<?php require("../include/header.php"); ?>
		
		<div class="container-fluid">
		
			<?php echo $contenu ?>
			
		</div>
		
		<?php require("../include/footer.php"); ?>
		
	</body>
</html>