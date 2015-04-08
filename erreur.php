<!DOCTYPE html>
<html>
	<head>
		<title>M&B assoc - Erreur</title>
		<!-- jQuery -->
		<script src="js/jquery-2.1.3.min.js"></script>
		<meta name="language" content="fr-FR" >
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="page d'erreur du site m&b assoc">
		<meta name="author" content="gregoire joncour">
		<link rel="icon" href="design/favicon.png">
		<meta charset="UTF-8">
		
		<!-- Latest compiled and minified CSS -->
		<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">-->
		<link rel="stylesheet" href="bootstrap-3.3.1/dist/css/bootstrap.min.css">
		<!-- Optional theme -->
		<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">-->
		<link rel="stylesheet" href="bootstrap-3.3.1/dist/css/bootstrap-theme.min.css">
		<!-- Latest compiled and minified JavaScript -->
		<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>-->
		<script src="bootstrap-3.3.1/dist/js/bootstrap.min.js"></script>
		<!--pour le fond cover-->
		<script type="text/javascript" src="js/jquery.backstretch.min.js"></script>
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		<script><!--pour les win phone et bootstrap-->
			if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
		  var msViewportStyle = document.createElement('style')
		  msViewportStyle.appendChild(
			document.createTextNode(
			  '@-ms-viewport{width:auto!important}'
			)
		  )
		  document.querySelector('head').appendChild(msViewportStyle)
		}
		</script>
		<link rel="stylesheet" href="design/style1.css" >
	</head>
	<body>
		<div id="dede"></div>
		<!--Barre de navigation-->
		<?php
			session_start();
			include_once('php/connect_bdd.php');
			include_once('php/change_menu.php');
		?>
		<!--contenu principal-->
		<section class="container-fluid" id="maincontent">
			<div id="error_page" class="alert alert-danger" role="alert">
				<h4>
				<b>Oups !</b>
				<?php
				if(!isset($_GET['erreur']))
				{
					header('location:/');
				}
				switch($_GET['erreur'])
				{
				   case '400':
				   echo 'Échec de l\'analyse HTTP.';
				   break;
				   case '401':
				   echo 'Le pseudo ou le mot de passe n\'est pas correct !';
				   break;
				   case '402':
				   echo 'Le client doit reformuler sa demande avec les bonnes données de paiement.';
				   break;
				   case '403':
				   echo 'Requête interdite !';
				   break;
				   case '404':
				   echo 'La page n\'existe pas ou plus !';
				   break;
				   case '405':
				   echo 'Méthode non autorisée.';
				   break;
				   case '500':
				   echo 'Erreur interne au serveur ou serveur saturé.';
				   break;
				   case '501':
				   echo 'Le serveur ne supporte pas le service demandé.';
				   break;
				   case '502':
				   echo 'Mauvaise passerelle.';
				   break;
				   case '503':
				   echo ' Service indisponible.';
				   break;
				   case '504':
				   echo 'Trop de temps à la réponse.';
				   break;
				   case '505':
				   echo 'Version HTTP non supportée.';
				   break;
				   default:
				   echo 'Erreur !';
				}
				?>
				</h4>
				<!--<br/><img src="http://Blog_shadow.fr/design/images/oops.gif"/>-->
				<p>La page que vous recherché n'est pas disponible</p>
				<p><a type="button" class="btn btn-danger" href="index">Accueil</a></p>
			</div>
		</section>
		<footer>
			&copy;M&B Association 2015 | <a href="#" title="contact"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Contact</a>
		</footer>
		<script type="text/javascript" src="js/background.js"></script>
	</body>
</html>