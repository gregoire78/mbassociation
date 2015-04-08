<?php
	$page=$_SERVER['REQUEST_URI'];
	if($page=="/membre" || $page=="/membre.php")
	{
		$class[0] = 'class="active" id="active_lien_menu"';
		$class[1] = 'active';
		$class[2]= '<span class="sr-only">(current)</span>';
		$class[7]= ' <span class="sr-only">(current)</span>';
	}
	else if($page=="/index" || $page=="/index.php" || $page=="/" || $page=="/_")
	{
		$class[3] = 'class="active" id="active_lien_menu"';
		$class[4]= ' <span class="sr-only">(current)</span>';
	}
	else if($page=="/logout" || $page=="/logout.php")
	{
		$class[5] = 'class="active" id="active_lien_menu"';
		$class[1] = 'active';
		$class[6]= ' <span class="sr-only">(current)</span>';
		$class[2]= '<span class="sr-only">(current)</span>';
	}
	$pseudo_user=$_SESSION['pseudo_user'];
?>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" id="menucontent">
	<div class="container-fluid">
		<div class="navbar-header">
			<!--pour les mobiles-->
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<!--************-->
			<a class="navbar-brand" href="/">
				<img alt="Brand" src="design/logomarque24.png" height="24">
			</a>
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<p class="navbar-text"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo $pseudo_user; ?></p>
			<ul class="nav navbar-nav navbar-right">
				<li <?php if(!empty($class[3])) echo $class[3]; ?>><a href="index" title="Accueil"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Accueil<?php if(!empty($class[4])) echo $class[4]; ?></a></li>
				<li class="dropdown <?php if(!empty($class[1])) echo $class[1]; ?>">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Espace membre <?php if(!empty($class[2])) echo $class[2]; ?><span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li <?php if(!empty($class[0])) echo $class[0]; ?>><a href="membre"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Profil<?php if(!empty($class[7])) echo $class[7]; ?></a></li>
						<li <?php if(!empty($class[5])) echo $class[5]; ?>><a href="logout"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> Se déconnecter<?php if(!empty($class[6])) echo $class[6]; ?></a></li>
					</ul>
				</li>
				<li><a href="actualite.php" title="Actualités" id="coucou"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> Actualités</a></li>
				<li><a href="asso" title="Qui somes-nous ?">Qui somes-nous ?</a></li>
				<li><a href="contact" title="Contact"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Contact</a></li>
				<li><a href="don" title="Faites-vos dons !">Faites-vos dons !</a></li>
			</ul>
	  </div>
  </div>
</nav>