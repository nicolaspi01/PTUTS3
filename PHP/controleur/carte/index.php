<?php
    include_once('modele/carte/CarteModel.php');
    
    session_start();
    
    $bdd = new CarteModel();
    
    $resultat = $bdd->recupererCarte();
    $tabRows = $resultat->fetchAll(PDO::FETCH_ASSOC);

    include_once('vue/carte/index.php');