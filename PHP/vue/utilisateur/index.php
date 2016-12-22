<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.5">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="sushis en ligne restauration rapide emporter livraison">
        <meta name="author" content="PIETRAC Nicolas - Mathis SLIMANI - PE Thiboud - Axel BERTRAND - Thomas BROUBROU">
        <link rel="icon" href="images/logo_onglet.png">

        <title>Sushinos - Sushis en ligne</title>

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.css" rel="stylesheet">

        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

        <!-- For "index", Mathis you have to create another css for the rest of the website -->
        <link href="css/style.css" rel="stylesheet">


        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>
        <div class="container-fluid">
            
            <?php include("include/header.php"); ?>
            
            <div class="row">
                <div class="col-lg-offset-3 col-lg-6 site-wrapper">
                    <h1><?php echo $_SESSION["utilisateur"]["nom"].' '.$_SESSION["utilisateur"]["prenom"]; ?></h1>
                    <dl class="dl-horizontal">
                        <dt><span class="glyphicon glyphicon-user"></span> Pseudo :</dt>
                        <dd><?php echo $_SESSION["utilisateur"]["pseudo"]; ?></dd>
                        <dt>@ Adresse mail :</dt>
                        <dd><?php echo $_SESSION["utilisateur"]["mail"]; ?></dd>
                        <dt><span class="glyphicon glyphicon glyphicon-phone"></span> Téléphone :</dt>
                        <dd><?php echo $_SESSION["utilisateur"]["telephone"]; ?></dd>
                        <dt><span class="glyphicon glyphicon-map-marker"></span> Adresse :</dt>
                        <dd>
                            <?php echo $_SESSION["utilisateur"]["numRue"].' '.
                                $_SESSION["utilisateur"]["rue"].'<br>'.
                                $_SESSION["utilisateur"]["codePostal"].' '.
                                $_SESSION["utilisateur"]["ville"];
                            ?>
                        </dd>
                    </dl>
                </div>
            </div>
            
            
            <?php include("include/footer.php"); ?>
            
        </div>

                

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>');</script>
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    </body>
</html>