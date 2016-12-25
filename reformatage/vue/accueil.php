<?php
	$title = "Accueil - Sushinos";
	
	ob_start();
	
	echo '<div class="row">
                <div class="col-lg-offset-3 col-lg-6 site-wrapper">
                    <div class="col-lg-12">
                        <div class="row">
                            <h1 class="col-lg-offset-2 col-lg-8">Bienvenue chez Sushinos !</h1>
                        </div>
                        <div class="row">
                            <p class="lead">Tous nos produits sont 100% naturels, compos�s avec les meilleurs ingr�dients. Nous vous offrons une large gamme de produits, menus, desserts.</p>
                        </div>
                        <div class="row">
                            <div class="col-lg-offset-4 col-lg-4">
                                <a href="carte.php" class="btn btn-lg btn-default">D�couvrir</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
	
	$contenu = ob_get_contents();
	ob_end_clean();
?>